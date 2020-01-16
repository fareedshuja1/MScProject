<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
         view()->composer(
            ['layouts.search_form', 'jobs.jobdetails','layouts.searchform_panel'],
            'App\Http\ViewComposers\CategoryComposer'
        );
    }


    public function register()
    {
        //
    }
}
