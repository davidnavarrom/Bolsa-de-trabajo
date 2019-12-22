<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\EmploymentCategory;
use App\JobOffer;
use App\User;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin', ['only' => ['changestatus']]);
        $this->middleware('role:candidato', ['only' => ['destroy','store']]);

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
        return redirect()->back()->with('success','Candidatura realizada correctamente');
    }

    public function destroy($id)
    {
        $user = \Auth::user();
        Candidature::findOrFail($id)->where('user_id',$user->id);
        return redirect()->back()->with('success','Candidatura cancelada correctamente');
    }


    public function changestatus(Candidature $candidature,User $user, $status )
    {
        $candidature->status = $status;
        $candidature->save();
        return redirect()->back()->with('success','Estado modificado correctamente');
    }

}
