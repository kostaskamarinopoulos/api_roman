<?php

namespace App\Providers;

use App\EloquentIntegerConversion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\IntegerConversionInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IntegerConversionInterface::class, EloquentIntegerConversion::class);
    }
}
