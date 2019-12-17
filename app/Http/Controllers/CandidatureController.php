<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\EmploymentCategory;
use App\JobOffer;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
//        $this->middleware('isowner', ['only' => [
//            'destroy'
//        ]]);


    }


    public function store(Request $request)
    {
        $user = \Auth::user();
        $jobOffer = JobOffer::find($request->jobOfferId);


        if($jobOffer !== null && $jobOffer->getOriginal('status') === JobOffer::ACTIVE){
            $candidature = new Candidature();
            $candidature->job_offers_id = $jobOffer->id;
            $candidature->user_id = $user->id;


            $candidature->save();
        }else{
            abort(404);

        }
//        $categories = $request->input('categories');
//        $newJobOffer->employmentCategories()->sync($categories); // array of role ids
        return redirect()->back()->with('success','Candidatura realizada correctamente');
    }

    public function destroy($id)
    {

        $candidature = Candidature::find($id);
        if ($candidature !== null) {
           $candidature->delete();
        }else{
            abort(404);
        }
        return redirect()->back()->with('success','Candidatura cancelada correctamente');
    }
}
