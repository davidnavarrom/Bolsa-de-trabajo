<?php

namespace App\Http\Controllers;

use App\EmploymentCategory;
use App\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;

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
    public function searchCategory($category)
    {
        $categorySelected = EmploymentCategory::where('slug', $category)->first();
        if ($categorySelected) {
        $jobOffers = JobOffer::whereHas('employmentCategories', function ($query) use ($categorySelected) {
            $query->where('categories_job.employment_categories_id', '=', $categorySelected->id);
        })->latest()->paginate(5);
        return view('welcome', compact('jobOffers', 'categorySelected'));
        }else{
            abort(404);
        }
    }

    public function search(Request $request){

        $query = JobOffer::query();

        if ($request->has('name')) {
            $query->where('name', $request->name)->orWhere('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('categories')) {
            $categories = EmploymentCategory::where('id', $request->categories)->first();
            if(!is_null($categories)) {
                $query->whereHas('employmentCategories', function ($query) use ($categories) {
                    $query->where('categories_job.employment_categories_id', '=', $categories->id);
                });
            }
        }

        if ($request->has('type_working')) {
            $typeworking = JobOffer::getPossibleTypeWorking();


            if(array_key_exists($request->type_working,$typeworking)){

                $query->where('type_working', $request->type_working);
            }
        }

        $minprice = 0;
        $maxprice = 0;

        if($request->has('minprice')){
            if(!is_null($request->minprice)){
                $minprice = $request->minprice;

            }
        }
        if($request->has('maxprice')){
            if(!is_null($request->maxprice)){
                $maxprice = $request->maxprice;
            }
        }

        if($minprice != 0 || $maxprice != 0) {
            $query->whereBetween('salary', [$minprice, $maxprice]);
        }

        $jobOffers = $query->latest()->paginate(5);
//        dd($request);
//        $categories = EmploymentCategory::all();
//        $typeworking = JobOffer::getPossibleTypeWorking();
        return view('welcome',compact('jobOffers'));
    }

}
