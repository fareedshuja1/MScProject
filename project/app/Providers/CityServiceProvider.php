<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CityServiceProvider extends ServiceProvider
{

    public function boot()
    {
         view()->composer(
            ['layouts.search_form', 'jobs.jobdetails','layouts.searchform_panel'],
            'App\Http\ViewComposers\CityComposer'
        );
    }


    public function register()
    {
        //
    }
}
