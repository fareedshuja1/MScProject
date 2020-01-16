<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use DB;

use App\General_model;

class CategoryComposer
{
    public $categories = [];
    
    public function __construct()
    {
        $query = "SELECT `category_id`,`category_title` FROM `job_category` ORDER BY `category_title` ASC";
        $this->categories = General_model::rawQuery($query);
    }

    
    public function compose(View $view)
    {
        $view->with('categoryTitle',$this->categories);
    }
}