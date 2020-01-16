<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategorycountServiceProvider extends ServiceProvider
{

    public function boot()
    {
         view()->composer(
            ['layouts.category_panel','jobs.jobdetails'],
            'App\Http\ViewComposers\CategorycountComposer'
        );
    }


    public function register()
    {
        //
    }
}
