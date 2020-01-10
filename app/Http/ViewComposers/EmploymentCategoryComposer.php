<?php


namespace App\Http\ViewComposers;


use App\EmploymentCategory;
use App\JobOffer;
use Illuminate\Support\Facades\View;

class EmploymentCategoryComposer
{

    public function compose($view)
    {
        $categories = EmploymentCategory::all();
        $typeworking = JobOffer::getPossibleTypeWorking();
        $view->with('categories', $categories)->with('typeworking',$typeworking);
    }
}
