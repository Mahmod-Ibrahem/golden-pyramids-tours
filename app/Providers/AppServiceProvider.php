<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Blog;
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
