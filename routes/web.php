<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TailorMadeController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TourController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');
/* DayTours Controller*/
Route::get('/day-tours', [TourController::class, 'index'])
    ->name('DayTours.index');
Route::get('/day-tours/{Category:slug}', [TourController::class, 'view'])->name('DayTours.view');
Route::get('/day-tours/{Category:slug}/{Tour:slug}', [TourController::class, 'Tour'])->name('DayTours.Tour');
/* TourPackages Controller*/

Route::get('/tour-packages', [TourController::class, 'index'])->name('TourPackages.index');
Route::get('/tour-packages/{Category:slug}', [TourController::class, 'view'])->name('TourPackages.view');
Route::get('/tour-packages/{Category:slug}/{Tour:title}', [TourController::class, 'Tour'])->name('TourPackages.Tour');


Route::get('/BestDestination/{location}', [\App\Http\Controllers\BestDController::class, 'index'])->name('BestDestination.index');
/* Tailor Made Tours */

Route::get('/TailorMade', [TailorMadeController::class, 'index'])->name('TailorMade.index');
Route::post('/TailorMade/submit', [TailorMadeController::class, 'submitting'])->name('TailorMade.post');

/* About */
Route::get('/about', function () {
    return view('about');
})->name('about');

/* TransferService */

Route::get("/TransferService", [TransferController::class, 'index'])->name('Transfer.index');
Route::post("/TransferService/submit", [TransferController::class, 'submitting'])->name('Transfer.post');
/* Contact Form */
Route::get('/Contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('Contact.index');
Route::post('/Contact/submit', [\App\Http\Controllers\ContactController::class, 'submitting'])->name('Contact.post');
/*Booking Controller*/
Route::post('/checkout/{tour}', [\App\Http\Controllers\BookingController::class, 'index'])->name('booking.checkout'); //tour should be as paramater passed to controller

Route::post('/checkout/{tour}/confirm', [\App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');

/*Blog*/
Route::get('/Blog', [BlogController::class, 'index'])->name('Blog.index');
Route::get('/Blog/{city:slug}', [BlogController::class, 'show'])->name('Blog.show');
Route::get('/Blog/{city:slug}/{blog:slug}', [BlogController::class, 'Attraction'])->name('Blog.attraction');
/*Language*/
Route::get('change-locale/{locale}', [\App\Http\Controllers\LanguageController::class, 'changeLocale'])->name('changeLocale');

Route::get('/test-translate', function (\App\Services\Translator $t) {
    return $t->translate('Hello world', ['fr', 'ar']);
});
