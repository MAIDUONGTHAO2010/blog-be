<?php

namespace App\Providers;

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
        if (app()->environment('local')) {
            \DB::listen(function ($query) {
                \Log::info($query->sql, [
                    'bindings' => $query->bindings,
                    'time' => $query->time,
                ]);
            });
        }
    }
}
