<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\JobOffer;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('candownloadcv', ['only' => [
            'downloadCv'
        ]]);

        $this->middleware('isowner', ['only' => [
            'edit','update'
        ]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user = \Auth::user();

       // $candidatures = Candidature::where('user_id',\Auth::user()->id)->with('jobOffer')->latest()->paginate(5);

        $candidatures = Candidature::where('user_id',\Auth::user()->id)->with('jobOffer')->latest()->paginate(5);


        return view('user.index',compact('user','candidatures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'required|numeric|min:9',
            'cv' => 'max:30000|mimes:pdf,doc,docx'
        ]);

        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
        }

        if($request->file('cv')){
            $path = $request->file('cv')->store('cvs');
            $arrayFilename = explode("/", $path);
            $filename = $arrayFilename[1];
            $user->cvpath = $filename;

        }
        $user->save();
        return redirect()->route('profile')
            ->with('success','Datos de usuario actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadCv($file){

        return Storage::download('/cvs/'.$file);
    }
}
