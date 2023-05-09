<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('email_edu', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(edu\.co|com|org|net)$/', $value);
        });
    }
}
