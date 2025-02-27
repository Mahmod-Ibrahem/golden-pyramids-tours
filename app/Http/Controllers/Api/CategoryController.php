<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequeust;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
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
        return new CategoryResource($createdCategory);
    }
    public function createCategoryTranslation(string $categoryId)
    {
        $category=Category::Find($categoryId);
        $categoryTranslationData=\request()->validate([
            'name' => 'required',
            'description' => 'required',
            'header' => 'required',
            'bg_header' => 'required',
            'title_meta' => 'required',
            'description_meta' => 'required',
            'locale' => 'required'
        ]);
        if (!$category)
        {
            return response()->json('Blog Not Found Or Locale Not Given', 404);
        }
        else {
            $this->setCategoryTranslation($category,$categoryTranslationData['locale'],$categoryTranslationData);//update translatable attribute of Category
            $category->save();
            return response()->json('Category Translation Created Successfully', 200);
        }
    }

    private function setCategoryTranslation(Category $category,$locale,$categoryValidatedData) : void
    {
        $category->setTranslation('slug', $locale, Str::slug($categoryValidatedData['name']));
        $category->setTranslation('slug', $locale,$categoryValidatedData['name']);
        $category->setTranslation('name', $locale,$categoryValidatedData['name']);
        $category->setTranslation('description', $locale,$categoryValidatedData['description']);
        $category->setTranslation('header', $locale,$categoryValidatedData['header']);
        $category->setTranslation('bg_header', $locale,$categoryValidatedData['bg_header']);
        $category->setTranslation('title_meta', $locale,$categoryValidatedData['title_meta']);
        $category->setTranslation('description_meta', $locale,$categoryValidatedData['description_meta']);
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
        return !is_null($category) ?  response()->json([
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
        $this->setCategoryTranslation($category,$data['locale'], $data);
        $this->updateCategoryMain($category, $data);
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
        $category->image=$data['image'];
        $category->type=$data['type'];
        $category->save();
    }



}
