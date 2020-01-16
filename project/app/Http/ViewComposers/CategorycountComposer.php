<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use DB;

use App\General_model;

class CategorycountComposer
{
    public $categoriescount = [];
    
    public function __construct()
    {
        $query = "SELECT ct.`category_title`,ct.`category_id`,(SELECT COUNT(`job_id`) FROM `job_details` WHERE `category_id` = ct.`category_id`) AS totall FROM `job_category` AS ct ORDER BY ct.`category_title` ASC";
        $this->categoriescount = General_model::rawQuery($query);
    }

    
    public function compose(View $view)
    {
        $view->with('categoryCount',$this->categoriescount);
    }
}