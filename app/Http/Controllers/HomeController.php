<?php

namespace App\Http\Controllers;

use App\EmploymentCategory;
use App\JobOffer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobOffers=JobOffer::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('welcome',compact('jobOffers'));
    }


    /**
     *    MYSQL QUERY:
     *   SELECT job_offers.name FROM job_offers
     *   join categories_job on job_offers.id = categories_job.job_offers_id
     *   join employment_categories on categories_job.employment_categories_id = employment_categories.id
     *   and categories_job.employment_categories_id = $IDCATEGORY
     *
     *   MYSQL WITH ALIAS:
     *   SELECT jo.name FROM job_offers jo
     *   join categories_job cj on jo.id = cj.job_offers_id
     *   join employment_categories ec on cj.employment_categories_id = ec.id
     *   and cj.employment_categories_id = 2
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($category){

        $categorySelected = EmploymentCategory::where('slug',$category)->first();


        $jobOffers = JobOffer::whereHas('employmentCategories', function($query) use($categorySelected){
            $query->where('categories_job.employment_categories_id','=', $categorySelected->id);
        })->latest()->paginate(5);



//        $jobOffers = JobOffer::with('employmentCategories')
//            ->join('categories_job','job_offers.id','=','categories_job.job_offers_id')
//            ->join('employment_categories','categories_job.employment_categories_id','=','employment_categories.id')
//            ->where('categories_job.employment_categories_id','=',$category->id)->paginate(5);
//
//
//        dd($jobOffers);

        return view('welcome',compact('jobOffers','categorySelected'));
    }



}
