<?php

namespace App\Http\Controllers;

use App\Employment_Category;
use App\EmploymentCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class EmploymentCategoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');


    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $categories = EmploymentCategory::latest()->paginate(5);
        return view('category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $slug = $request->input('slug');
        $slug = str_slug($slug, '-');
        $request->merge([ 'slug' => $slug]);
        $this->validate($request,[ 'name'=>'required', 'slug'=>'required|unique:employment_categories,slug', 'description' =>'required']);
        EmploymentCategory::create($request->all());
        return redirect()->route('categories.index')->with('success','Categoria creada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employment_Category  $employment_Category
     * @return Response
     */
    public function edit($id)
    {
        $category=EmploymentCategory::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employment_Category $employment_Category
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $slug = $request->input('slug');
        $slug = str_slug($slug, '-');
        $request->merge([ 'slug' => $slug]);
        $this->validate($request,[ 'name'=>'required', 'slug'=>'required|unique:employment_categories,slug,'.$id, 'description' =>'required']);
        EmploymentCategory::find($id)->update($request->all());
        return redirect()->route('categories.index')->with('success','Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employment_Category  $employment_Category
     * @return Response
     */
    public function destroy($id)
    {
        EmploymentCategory::find($id)->delete();
        return redirect()->route('categories.index')->with('success','Categoria eliminada');
    }





}
