<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\YoutubeVideoRequest;
use App\Http\Resources\YoutTubeVideoResource;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class YoutubeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return YoutTubeVideoResource::collection(YoutubeVideo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YoutubeVideoRequest $request)
    {
        $data = $request->validated();
        $video = YoutubeVideo::create($data);
        return response()->json(['message' => 'Video created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = YoutubeVideo::find($id);
        return $video ? new YoutTubeVideoResource($video) : response()->json('Video Not Found', 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YoutubeVideoRequest $request, string $id)
    {
        $data = $request->validated();
        $video = YoutubeVideo::find($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        $video->update($data);
        return response()->json(['message' => 'Video updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = YoutubeVideo::find($id);
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        $video->delete();
        return response()->noContent();
    }
}
