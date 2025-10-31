<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequeust;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
use App\Jobs\TranslateJob;
use App\Models\Category;
use App\Traits\ImagesUtility;
use App\Traits\TourUtility;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use TourUtility, ImagesUtility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = \request('locale');
        $categories = Category::where('name->' . $locale, '!=', '')->get();
        return CategoryListResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequeust $request)
    {
        //Validate Category
        $validatedCategoryData = $request->validated();
        $storedImage = $this->storeImage($validatedCategoryData['image'], 'category');
        $validatedCategoryData['image'] = $storedImage;
        $validatedCategoryData['description'] = str_replace('target="_blank"', '', $validatedCategoryData['description']);
        $createdCategory = Category::create($validatedCategoryData);
        $this->translateCategory($createdCategory, ['es', 'zh', 'pt', 'fr'], $validatedCategoryData);
        return new CategoryResource($createdCategory);
    }




    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return is_null($category) ? response()->json('Category Not Found', 404) : new CategoryResource($category);
    }

    public function getCategoryForTranslation(Category $category)
    {
        return !is_null($category) ? response()->json([
            'id' => $category->id,
            'availableLocales' => array_diff(['en', 'fr', 'sp', 'zh', 'pt'], $category->locales()),
            'locale' => ''
        ]) : response()->json('Category Not Found', 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequeust $request, Category $category)
    {
        $data = $request->all();
        if ($data['image'] ?? false) {
            if ($category->image ?? false) {
                $relativePath = $this->getRelativePath($category->image);
                Storage::delete($relativePath);
            }
            $data['image'] = $this->storeImage($data['image'], 'category');
        } else {
            $data['image'] = $category['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $data['description'] = str_replace('target="_blank"', '', $data['description']);
        $this->updateCategoryMain($category, $data);
        $this->translateCategory($category, ['es', 'zh', 'pt', 'fr', 'en'], $data);
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }

    private function updateCategoryMain(Category $category, array $data)
    {
        $category->image = $data['image'];
        $category->type = $data['type'];
        $category->save();
    }
    private function translateCategory(Category $category, $locale, $categoryValidatedData): void
    {

        TranslateJob::dispatch([
            'slug' => Str::slug($categoryValidatedData['name']),
            'name' => $categoryValidatedData['name'],
            'description' => $categoryValidatedData['description'],
            'header' => $categoryValidatedData['header'],
            'bg_header' => $categoryValidatedData['bg_header'],
            'title_meta' => $categoryValidatedData['title_meta'],
            'description_meta' => $categoryValidatedData['description_meta'],
        ], $locale, $category, 'category');
    }

}
