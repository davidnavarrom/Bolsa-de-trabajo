<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\EmploymentCategory;
use App\JobOffer;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class JobOfferController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('role:admin', ['except' => ['show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobOffers = JobOffer::with('candidatures')->latest()->paginate(5);

        return view('joboffers.index',compact('jobOffers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EmploymentCategory::all();
        $typeworking = JobOffer::getPossibleTypeWorking();
        return view('joboffers.create',compact('categories','typeworking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'description' =>'required', 'type_working' =>'required|in:'.JobOffer::COMPLETE.','.JobOffer::PART, 'salary' => 'required|numeric']);
        $newJobOffer = JobOffer::create($request->all());
        $categories = $request->input('categories');
        $newJobOffer->employmentCategories()->sync($categories); // array of role ids
        return redirect()->route('joboffers.index')->with('success','Oferta de empleo creada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobOffer=JobOffer::with('employmentCategories')->find($id);
        $categories = EmploymentCategory::all();
        $typeworking = JobOffer::getPossibleTypeWorking();
        return view('joboffers.edit',compact('jobOffer','categories','typeworking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required', 'description' =>'required', 'type_working' =>'required|in:'.JobOffer::COMPLETE.','. JobOffer::PART, 'salary' => 'required|numeric']);
        $jobOffer = JobOffer::find($id);
        $jobOffer->update($request->all());
        $categories = $request->input('categories');
        $jobOffer->employmentCategories()->sync($categories); // array of role ids
        return redirect()->route('joboffers.index')->with('success','Oferta de de empleo actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employment_Category  $employment_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobOffer = JobOffer::find($id);
        if ($jobOffer !== null) {
            $jobOffer->status = JobOffer::DISABLED;
            $jobOffer->save();
        }else{
            abort(404);
        }
        return redirect()->route('joboffers.index')->with('success','Oferta de trabajo desactivada');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employment_Category  $employment_Category
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $jobOffer = JobOffer::find($id);
        if ($jobOffer !== null) {
            $jobOffer->status = JobOffer::ACTIVE;
            $jobOffer->save();
        }else{
            abort(404);
        }
        return redirect()->route('joboffers.index')->with('success','Oferta de trabajo activada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
            $jobOffer = JobOffer::with('candidatures')->findOrFail($id);
            $candidature = null;
            if($user) {
                $matchThese = ['user_id' => $user->id, 'job_offers_id' => $jobOffer->id];
                $candidature = Candidature::where($matchThese)->first();;
            }
            return view('joboffers.show',compact('jobOffer','candidature'));
    }

    public function manage($id){
        $job_offer = JobOffer::where('id',$id)->firstOrFail();
        $candidates = Candidature::has('user')->with('user')->where('job_offers_id',$id)->latest()->paginate(10);
        return view('joboffers.manage',compact('candidates','job_offer'));
    }

    public function search(Request $request){
        $name = $request->name;
        $jobOffers = JobOffer::with('candidatures')->where('name', $name)
            ->orWhere('name', 'like', '%' . $name . '%')->latest()->paginate(5);
        return view('joboffers.index',compact('jobOffers'))->with('searched','Buscando resultados por: ' . $name);
    }

}
