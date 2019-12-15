<?php

namespace App\Http\Controllers;

use App\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jobOffers = JobOffer::latest()->paginate(5);
        return view('joboffers.index',compact('jobOffers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('joboffers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $slug = $request->input('slug');
//        $slug = str_slug($slug, '-');
//        $request->merge([ 'slug' => $slug]);
//        $this->validate($request,[ 'name'=>'required', 'slug'=>'required|unique:employment_categories,slug', 'description' =>'required']);
//        JobOffer::create($request->all());
//        return redirect()->route('categories.index')->with('success','Categoria creada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employment_Category  $employment_Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobOffer=JobOffer::find($id);
        return view('joboffers.edit',compact('$jobOffer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employment_Category  $employment_Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $slug = $request->input('slug');
//        $slug = str_slug($slug, '-');
//        $request->merge([ 'slug' => $slug]);
//
//
//
//        $this->validate($request,[ 'name'=>'required', 'slug'=>'required|unique:employment_categories,slug,'.$id, 'description' =>'required']);
//        EmploymentCategory::find($id)->update($request->all());
//        return redirect()->route('categories.index')->with('success','Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employment_Category  $employment_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobOffer::find($id)->delete();
        return redirect()->route('joboffers.index')->with('success','Oferta de trabajo eliminada');
    }

}
