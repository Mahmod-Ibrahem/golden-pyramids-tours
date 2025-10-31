<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogListResource;
use App\Http\Resources\BlogResource;
use App\Jobs\TranslateJob;
use App\Models\Blog;
use App\Traits\ImagesUtility;
use App\Traits\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogApiController extends Controller
{
    use ImagesUtility, Utility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = request('locale');
        $blogs = Blog::whereNotNull('title->' . $locale)->get();    //'title->en
        return BlogListResource::collection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validatedRequestData = $request->validated();
        $storedBlogImage = $this->storeImage($validatedRequestData['image'], 'blog');
        $validatedRequestData['image'] = $storedBlogImage;
        $validatedRequestData['blog'] = str_replace('target="_blank"', '', $validatedRequestData['blog']);
        $createdBlog = Blog::create($validatedRequestData);
        $this->translateBlog($createdBlog, ['fr', 'es', 'pt', 'zh'], $validatedRequestData);
        return new BlogResource($createdBlog);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $blogId)
    {
        return Blog::Find($blogId) ? new BlogResource(Blog::Find($blogId)) : response(['message' => 'Blog Not Found'], 404);
    }

    public function update(BlogRequest $request, string $blog)
    {
        $blog = Blog::find($blog);
        $locale = request('locale');
        $blogValidatedData = $request->validated();
        if ($blogValidatedData['image'] ?? false) {
            if ($blog->image ?? false) {
                $relativePath = $this->getRelativePath($blog->image);
                Storage::delete($relativePath);
            }
            $blogValidatedData['image'] = $this->storeImage($blogValidatedData['image'], 'blog');
        } else {
            $blogValidatedData['image'] = $blog['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $blogValidatedData['blog'] = $this->removeAnchorTareget($blogValidatedData['blog']);
        $this->translateBlog($blog, ['en', 'fr', 'es', 'pt', 'zh'], $blogValidatedData);//update translatable attribute of blog
        $this->updateBlogMain($blog, $blogValidatedData); // update non Translatable attribute
        $blog->save();
        return new BlogResource($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $blog)
    {
        $blog = Blog::find($blog);
        if ($blog) {
            $blog->delete();
            return response()->noContent();
        }
        return response(['message' => 'Blog Not Found'], 404);
    }

    private function translateBlog(Blog $blog, $locales, $blogValidatedData): void
    {
        TranslateJob::dispatch([
            'title' => $blogValidatedData['title'],
            'blog' => $blogValidatedData['blog'],
        ], $locales, $blog);
    }

    private function updateBlogMain($blog, mixed $blogValidatedData)
    {
        $blog->image = $blogValidatedData['image'];
        $blog->city_id = $blogValidatedData['city_id'];
    }
}
