<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TourTranslationRequest;
use App\Http\Resources\nonTranslatedTourListResource;
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
        $locale = request('locale', 'en');

        $products = Tour::whereHas('tourTranslations', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })
            ->with(['category.categoryTranslations', 'tourTranslations' => function ($query) use ($locale) {
                $query->where('locale', $locale); // Limit loaded translations to the given locale
            }])
            ->orderBy($SortField, $SortDirection);

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
        $data = $request->validated();
        //Check if the tour exists
        if ($this->isTourExist($data['title'])) {
            return $this->showError('Tour with this title Already Exists', 409); //409 Conflict
        }
        //store Tour Cover Image
        $data['tour_cover'] = $this->storeImage($data['tour_cover'], 'tourCover'); //store public path
        //Store Tour to get its id and assign to it images model
        $CreatedTour = $this->createTour($data);
        $this->createTourTranslation($data, $CreatedTour->id);
        //handling Tour Images
        $tourImages = $data['tour_images'];

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locale = request('locale', 'en');
        $tour = $this->findTour($id);
        $tour->load(['tourTranslations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }]);
        return new ProductResource($tour);
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
        $tour->update($data);
        $tourTranslationId = TourTranslation::where('tours_id', $tour->id)
            ->where('locale', 'en')
            ->first()->id; //get tour translation id
        $this->updateTourTranslationById($data, $tourTranslationId);
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
    public function getNonTranslatedTours()
    {
        $tour = Tour::whereDoesntHave('tourTranslations', function ($query) {
            $query->where('locale', '!=', 'en');
        })
            ->with('tourTranslations')
            ->get();

        return nonTranslatedTourListResource::collection($tour);
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

    public function translateNewTour(TourTranslationRequest $request)
    {
        $validatedTourTranslationData = $request->validated();
        $this->createTourTranslation($validatedTourTranslationData, $validatedTourTranslationData['id']);
        return response()->json(['message' => 'Tour translation created successfully'], 200);
    }

    public function receiveAndUpdateTourTranslation(TourTranslationRequest $request, $id)
    {
        $validatedTourTranslationData = $request->validated();
        $validatedTourTranslationData['locations'] = $this->convertLocationToJson($validatedTourTranslationData['locations']);
        $this->updateTourTranslationById($validatedTourTranslationData, $id);
        return response()->json(['message' => 'Tour translation updated successfully'], 200);
    }

    private function createTour($data)
    {
        return Tour::create([
            'category_id' => $data['category_id'],
            'group' => $data['group'],
            'preference' => $data['preference'],
            'tour_cover' => $data['tour_cover'],
            'price_per_person' => $data['price_per_person'],
            'price_two_five' => $data['price_two_five'],
            'price_six_twenty' => $data['price_six_twenty']
        ]);
    }

    private function createTourTranslation(mixed $data, mixed $id)
    {
        return TourTranslation::create([
            'tours_id' => $id,
            'title' => $data['title'],
            'description' => $data['description'],
            'itenary_title' => $data['itenary_title'],
            'itenary_section' => $data['itenary_section'],
            'included' => $data['included'],
            'excluded' => $data['excluded'],
            'duration' => $data['duration'],
            'places' => $data['places'],
            'locations' => $data['locations'],
            'locale' => $data['locale'] ?? 'en',
        ]);
    }

    private function updateTourTranslationById(mixed $data, mixed $id)
    {
        TourTranslation::where('id', $id)->
        update([
            'title' => $data['title'],
            'description' => $data['description'],
            'itenary_title' => $data['itenary_title'],
            'itenary_section' => $data['itenary_section'],
            'included' => $data['included'],
            'excluded' => $data['excluded'],
            'duration' => $data['duration'],
            'places' => $data['places'],
            'locations' => $data['locations'],
            'locale' => $data['locale'] ?? 'en',
        ]);
    }


    private function findTour($id)
    {
        return Tour::find($id);
    }

    private function convertLocationToJson($location)
    {
        return json_encode(array_map('trim', explode('/', $location)));
    }


}
