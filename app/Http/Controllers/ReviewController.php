<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ReviewListResource;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getReviews()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);

        // Eager load 'category' relationship
        $reviews = Review::with(['tour.tourTranslations' => function ($query) {
            $query->where('locale', 'en');
        }])
            ->orderBy($SortField, $SortDirection);

        if ($search) {
            $reviews->where('title', 'LIKE', "%$search%")
                ->orWhere('content', 'LIKE', "%$search%")
                ->orWhereHas('tour', function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%$search%");
                }); //Wherehas used to search tour title
        }


        return ReviewListResource::collection($reviews->paginate($perPage));
    }

        public
        function getReview($id)
        {
            $review = Review::find($id);

            if ($review) {
                return new ReviewResource($review);
            } else {
                return response()->json(['message' => 'Review not found'], 404);
            }
        }


        public
        function updateReview(StoreReviewRequest $request)
        {
            $data = request()->all();
            $review = Review::find($data['id']);
            $review->update($data);
            return new ReviewResource($review);
        }

        /**
         * Show the form for creating a new resource.
         */
        public
        function create(StoreReviewRequest $request)
        {
            $data = $request->validated();
            $review = Review::create($data);
            return new ReviewResource($review);
        }

        public
        function deleteReview($id)
        {

            $review = Review::find($id);
            if ($review == null) {
                return response()->json(['message' => 'Review not found'], 404);
            }
            $review->delete();
            return response()->noContent();
        }


        /**
         * Store a newly created resource in storage.
         */

    }
