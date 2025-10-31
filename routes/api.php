<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::apiResource('/categories', CategoryController::class);
    /** Tours*/
    Route::apiResource('/products', ProductController::class);
    Route::delete('/products/deleteImage/{id}', [ProductController::class, 'deleteImage']);
    Route::put('/addImageToTour/{id}', [ProductController::class, 'addImages']);
    Route::get('getProductForTranslation/{tourId}', [ProductController::class, 'getTourForTranslation']);
    Route::put('/createProductTranslation/{tourId}', [ProductController::class, 'createTourTranslation']);
    /*Reviews */
    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'getReviews']);
    Route::get('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'getReview']);
    Route::post('/review', [\App\Http\Controllers\ReviewController::class, 'create']);
    Route::put('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'updateReview']);
    Route::delete('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'deleteReview']);
    /* Faq*/
    Route::apiResource('/faqs', \App\Http\Controllers\Api\FaqController::class);
    Route::get('/faqs', [\App\Http\Controllers\Api\FaqController::class, 'index']);
    /* Cities*/
    Route::apiResource('/city', \App\Http\Controllers\Api\CityApiController::class);
    /*Blogs*/
    Route::apiResource('/blog', \App\Http\Controllers\Api\BlogApiController::class);
    Route::put('/createBlogTranslation/{blog}', [\App\Http\Controllers\Api\BlogApiController::class, 'createTranslation']);
    Route::get('/getBlogForTranslation/{blog}', [\App\Http\Controllers\Api\BlogApiController::class, 'getBlogForTranslation']);
    /*Page Texts*/
    Route::apiResource('/pageText', \App\Http\Controllers\Api\PageTextsController::class);
    Route::put('/createPageTextTranslation/{pageText}', [\App\Http\Controllers\Api\PageTextsController::class, 'createPageTextTranslation']);
    Route::get('/getPageTextForTranslation/{pageText}', [\App\Http\Controllers\Api\PageTextsController::class, 'getPageTextForTranslation']);
    /* YouTube Embed Links */
    Route::apiResource('/video', \App\Http\Controllers\Api\YoutubeVideoController::class);
    /* Booking List */
    Route::apiResource('/booking', \App\Http\Controllers\Api\BookingController::class);

    /* ContactLeads */
    Route::apiResource('/contact', \App\Http\Controllers\Api\ContactController::class);
    /* ContactLeads */
});

Route::post('/login', [AuthController::class, 'login']);
