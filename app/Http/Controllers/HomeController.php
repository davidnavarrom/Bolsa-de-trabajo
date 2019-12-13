<?php

namespace App\Http\Controllers;

use App\EmploymentCategory;
use App\JobOffer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$job_offers=JobOffer::with('employmentCategories')->get();

        $job_offers=JobOffer::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('welcome',compact('job_offers'));
    }
}
