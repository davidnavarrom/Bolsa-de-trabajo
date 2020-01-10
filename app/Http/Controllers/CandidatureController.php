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
        return redirect()->back()->with('success','Candidatura presentada correctamente');
    }

    public function destroy($id)
    {

        $user = \Auth::user();
        $candidature = Candidature::where('id' , '=' ,$id)->first();
        $candidature->delete();
        return redirect()->back()->with('success','Candidatura cancelada correctamente');
    }


    public function changestatus(Request $request,Candidature $candidature,User $user, $status )
    {
        if($request->ajax()) {
            $candidature->status = $status;
            $candidature->save();
        }else {
            $candidature->status = $status;
            $candidature->save();
            return redirect()->back()->with('success', 'Estado modificado correctamente');
        }
    }

}
