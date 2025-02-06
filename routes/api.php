<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/getNonTranslatedCategories', [CategoryController::class, 'getNonTranslatedCategories']);
    Route::post('/translateNewCategory', [CategoryController::class, 'translateNewCategory']);
    Route::put('/updateTranslationOfCategory/{id}', [CategoryController::class, 'receiveAndUpdateCategoryTranslation']);
    Route::apiResource('/products', ProductController::class);
    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'getReviews']);
    Route::get('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'getReview']);
    Route::post('/review', [\App\Http\Controllers\ReviewController::class, 'create']);
    Route::put('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'updateReview']);
    Route::delete('/review/{id}', [\App\Http\Controllers\ReviewController::class, 'deleteReview']);
    Route::delete('/products/deleteImage/{id}', [ProductController::class, 'deleteImage']);
    Route::put('/addImageToTour/{id}', [ProductController::class, 'addImages']);
    Route::get('/getNonTranslatedTours', [ProductController::class, 'getNonTranslatedTours']);
    Route::post('/translateNewTour', [ProductController::class, 'translateNewTour']);
    Route::put('/updateTranslationOfTour/{id}', [ProductController::class, 'receiveAndUpdateTourTranslation']);
    /* Faq*/
    Route::apiResource('/faqs', \App\Http\Controllers\Api\FaqController::class);
    Route::put('/createFaqTranslation/{faqId}', [\App\Http\Controllers\Api\FaqController::class,'createFaqTranslation']);
    Route::get('/getFaqForTranslation/{faqId}', [\App\Http\Controllers\Api\FaqController::class,'getFaqForTranslation']);
    /* Cities*/
    Route::apiResource('/city', \App\Http\Controllers\Api\CityApiController::class);
    Route::put('/createCityTranslation/{city}',[\App\Http\Controllers\Api\CityApiController::class,'createCityTranslation']);
    Route::get('/getCityForTranslation/{city}',[\App\Http\Controllers\Api\CityApiController::class,'getCityForTranslation']);
    /*Blogs*/
    Route::apiResource('/blog', \App\Http\Controllers\Api\BlogApiController::class);
    Route::put('/createBlogTranslation/{blog}',[\App\Http\Controllers\Api\BlogApiController::class,'createTranslation']);
    Route::get('/getBlogForTranslation/{blog}',[\App\Http\Controllers\Api\BlogApiController::class,'getBlogForTranslation']);
});

Route::post('/login', [AuthController::class, 'login']);
