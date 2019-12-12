<?php


namespace App\Http\ViewComposers;


use App\EmploymentCategory;
use Illuminate\Support\Facades\View;

class EmploymentCategoryComposer
{

    public function compose($view)
    {
        $categories = EmploymentCategory::all();
        $view->with('categories', $categories);
    }
}
