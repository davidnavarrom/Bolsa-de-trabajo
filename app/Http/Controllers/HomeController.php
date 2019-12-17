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
}
