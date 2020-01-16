<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use DB;

use App\General_model;

class CityComposer
{
    public $cities = [];
    
    public function __construct()
    {
        $query = "SELECT `city_id`,`city_name` FROM `city` ORDER BY `city_name` ASC";
        $this->cities = General_model::rawQuery($query);
    }

    
    public function compose(View $view)
    {
        $view->with('cityName',$this->cities);
    }
}