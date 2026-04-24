<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        View::share('categories', Category::orderBy('order')->get());
        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    'me@ramsheed.com',
                ]);
        });
        if (app()->environment('production')) {
            URL::forceScheme('https');
        } 
    }
}
