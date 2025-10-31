<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\PageText;
use App\Models\Review;
use App\Models\Tour;
use App\Models\YoutubeVideo;
use App\Observers\CategoryObserver;
use App\Observers\FaqObserver;
use App\Observers\PageTextObserver;
use App\Observers\ReviewObserver;
use App\Observers\TourObserver;
use App\Observers\YoutubeVideoObserver;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        // Register model observers for cache invalidation
        Category::observe(CategoryObserver::class);
        Tour::observe(TourObserver::class);
        YoutubeVideo::observe(YoutubeVideoObserver::class);
        Review::observe(ReviewObserver::class);
        Faq::observe(FaqObserver::class);
        PageText::observe(PageTextObserver::class);

//        $models=[
//            'city'=>City::class,
//        ];
//        foreach ($models as $key => $model) {
//            Route::bind($key, function ($value) use ($model) {
//                return $model::where("slug->" . app()->getLocale(), $value)->firstOrFail();
//            });
//            //🔹 Whenever a route contains {city}, execute the function inside.
//            //🔹 The $value represents whatever is passed in the {city} placeholder in the URL.
//        }

    }
}
