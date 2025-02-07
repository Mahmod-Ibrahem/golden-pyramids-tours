<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TourTranslationRequest;
use App\Http\Resources\nonTranslatedTourResource;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourTranslation;
use App\Traits\ImagesUtility;
use App\Traits\TourUtility;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use TourUtility, ImagesUtility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);
        $locale = request('locale');
        $products = Tour::where('title->'.$locale, '!=', '')->orderBy($SortField, $SortDirection);

        if ($search) {
            $products->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });
        }
        return ProductListResource::collection($products->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $TourValidatedData = $request->validated();
        //Check if the tour exists
        if ($this->isTourExist($TourValidatedData['title'])) {
            return $this->showError('Tour with this title Already Exists', 409); //409 Conflict
        }
        //store Tour Cover Image
        $TourValidatedData['tour_cover'] = $this->storeImage($TourValidatedData['tour_cover'], 'tourCover'); //store public path
        //Store Tour to get its id and assign to it images model
        $CreatedTour = Tour::create($TourValidatedData);
        //handling Tour Images
        $tourImages = $TourValidatedData['tour_images'];

        foreach ($tourImages as $image) {
            try {
                $image = $this->storeImage($image, 'tour'); //returns public url
                TourImage::create([
                    'tours_id' => $CreatedTour->id,
                    'path' => $image,
                ]);
            } catch (Exception $e) {
                return $this->showError('Error processing image', 500);
            }
        }
        return $this->showError('Tour created successfully', 201);
    }

    public function createTourTranslation(string $tourId)
    {
        $tour = $this->findTour($tourId);
        $tourData=request()->all();
        $this->setTourTranslation($tour,$tourData['locale'],$tourData);
        return response()->json(['message' => 'Tour created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = $this->findTour($id);
        return is_null($tour) ? $this->showError('Tour not found', 404) : new ProductResource($tour);
    }

    public function getTourForTranslation(string $tourId)
    {
        $tour = $this->findTour($tourId);
        return is_null($tour) ? $this->showError('Tour not found', 404) : response()->json([
            'id' => $tour->id,
            'availableLocales' => array_diff(['en', 'fr', 'sp', 'zh', 'pt'], $tour->locales()),
            'locale' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        //
        $data = $request->all();
        $tour = $this->findTour($id);
        //Check if new image exist , if delete it and store new
        if ($data['tour_cover'] ?? false) {
            if ($tour->tour_cover ?? false) {
                $relativePath = $this->getRelativePath($tour->tour_cover);
                Storage::delete($relativePath);
            }
            $newStoredImage = $this->storeImage($data['tour_cover'], 'tourCover'); //path data
            $data['tour_cover'] = $newStoredImage;
        } else {
            $data['tour_cover'] = $tour->tour_cover;
        }
        //handle location to be  a json before uddating
        $data['visit_count'] = $tour->visit_count; //keep old visit count
        $this->setTourTranslation($tour, $data['locale'], $data);
        $this->updateTourMain($tour, $data);
        return response()->json(['message' => 'Tour updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $product)
    {
        $product->delete();

        return response()->noContent();
    }


    private function isTourExist($title)
    {
        $tour = TourTranslation::where('title', $title)->first();
        if ($tour) {
            return true;
        }
        return false;
    }

    private function showError($message, $status)
    {
        return response()->json(['message' => $message], $status);
    }

    public function addImages(Request $request, string $id)
    {
        $data = $request->all();
        $tour = $this->findTour($id);
        $tourImages = $data['tour_images'];

        foreach ($tourImages as $image) {
            try {
                $storedImage = $this->storeImage($image, 'tour'); //returns public url
                TourImage::create([
                    'tours_id' => $tour->id,
                    'path' => $storedImage,
                ]);
            } catch (Exception $e) {
                return response()->json(['message' => 'Error processing image: ' . $e->getMessage()], 500);
            }
        }
        return response()->json(['message' => 'Images Added successfully'], 200);
    }

    public function deleteImage(string $id)
    {
        $tourImage = TourImage::find($id);
        $relativePath = $this->getRelativePath($tourImage->image_url);
        Storage::delete($relativePath);
        $tourImage->delete();
        return response()->json(['message' => 'Image deleted successfully'], 200);
    }

    private function findTour($id)
    {
        return Tour::find($id);
    }

//    private function convertLocationToJson($location)
//    {
//        return json_encode(array_map('trim', explode('/', $location)));
//    }
    private function setTourTranslation($tour, mixed $locale, array $tourData)
    {
        $tour->setTranslation('title', $locale, $tourData['title']);
        $tour->setTranslation('description', $locale, $tourData['description']);
        $tour->setTranslation('itenary_title', $locale, $tourData['itenary_title']);
        $tour->setTranslation('itenary_section', $locale, $tourData['itenary_section']);
        $tour->setTranslation('included', $locale, $tourData['included']);
        $tour->setTranslation('excluded', $locale, $tourData['excluded']);
        $tour->setTranslation('duration', $locale, $tourData['duration']);
        $tour->setTranslation('locations', $locale, json_encode(array_map('trim', explode('/', $tourData['locations']))));
        $tour->setTranslation('places', $locale, $tourData['places']);
        $tour->setTranslation('slug', $locale, Str::slug($tourData['title']));
        $tour->save();
    }

    private function updateTourMain(Tour $tour, mixed $tourValidatedData)
    {
        $tour->category_id=$tourValidatedData['category_id'];
        $tour->preference=$tourValidatedData['preference'];
        $tour->group=$tourValidatedData['group'];
        $tour->tour_cover=$tourValidatedData['tour_cover'];
        $tour->price_per_person=$tourValidatedData['price_per_person'];
        $tour->price_two_five=$tourValidatedData['price_two_five'];
        $tour->price_six_twenty=$tourValidatedData['price_six_twenty'];
        $tour->save();
    }


}
