<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Jobs\TranslateJob;
use App\Models\Tour;
use App\Models\TourImage;
use App\Services\Translator;
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

    public function __construct(protected Translator $translator)
    {
    }

    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);
        $locale = request('locale');
        $products = Tour::where('title->' . $locale, '!=', '')->orderBy($SortField, $SortDirection);

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

        $TourValidatedData['tour_cover'] = $this->storeImage($TourValidatedData['tour_cover'], 'tourCover'); //store public path
        $CreatedTour = Tour::create($TourValidatedData);
        $this->translateTour($CreatedTour, ['fr', 'es', 'pt', 'zh'], $TourValidatedData);
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
        return $tour->locale();
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

        $this->handleDeletedImages($data);
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
        $this->handleNewProductImages($tour, $data['tour_images'] ?? []);


        $data['visit_count'] = $tour->visit_count; //keep old visit count
        $this->translateTour($tour, ['fr', 'es', 'pt', 'zh'], $data);
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

    private function translateTour($tour, mixed $locale, array $TourValidatedData)
    {
        TranslateJob::dispatch([
            'title' => $TourValidatedData['title'],
            'description' => $TourValidatedData['description'],
            'itenary_title' => $TourValidatedData['itenary_title'],
            'itenary_section' => $TourValidatedData['itenary_section'],
            'included' => $TourValidatedData['included'],
            'excluded' => $TourValidatedData['excluded'],
            'duration' => $TourValidatedData['duration'],
            'locations' => $TourValidatedData['locations'],
            'places' => $TourValidatedData['places'],
        ], $locale, $tour, 'tour');
    }

    private function updateTourMain(Tour $tour, mixed $tourValidatedData)
    {
        $tour->category_id = $tourValidatedData['category_id'];
        $tour->preference = $tourValidatedData['preference'];
        $tour->group = $tourValidatedData['group'];
        $tour->tour_cover = $tourValidatedData['tour_cover'];
        $tour->price_per_person = $tourValidatedData['price_per_person'];
        $tour->price_two_five = $tourValidatedData['price_two_five'];
        $tour->price_six_twenty = $tourValidatedData['price_six_twenty'];
        $tour->save();
    }

    protected function handleDeletedImages(array $validated): void
    {
        if (empty($validated['deleted_images_ids'])) return;

        TourImage::whereIn('id', $validated['deleted_images_ids'])->each(function ($image) {
            Storage::delete($this->getRelativePath($image->path));
            $image->delete();
        });
    }

    protected function handleNewProductImages(Tour $tour, array $images): void
    {
        foreach ($images as $image) {
//            try {
            $stored = $this->storeImage($image, 'tour');
            TourImage::create([
                'tours_id' => $tour->id,
                'path' => $stored,
            ]);
//            } catch (\Exception $e) {
//                // You can log the error or throw if critical
//                throw new \RuntimeException('Error processing product image.');
//            }
        }
    }


}
