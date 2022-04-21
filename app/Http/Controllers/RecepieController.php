<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Models\Coment;
use App\Models\User;
use Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\RecepiesResources;
use Illuminate\Http\Request;

class RecepieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Recepies = Recepie::all();
        return view( 'recepies' ,compact('Recepies') ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPostForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req-> validate([
            'title'=> 'required',
            'body'=> 'required',
            'image'=> 'required',
            'ingredients'=> 'required'
        ]);

        $logedUser= Auth::user()->name;
        $timeYMD = carbon::now()->toDateString();
        $timeHMS = carbon::now()->toTimeString();
        $imageName= $logedUser. "_". $timeYMD. "_".$timeHMS. ".png";
        $pathToFile = public_path('images')."/".$imageName;
        $req-> image -> move($pathToFile);
        

        Recepie::create([
            'admin_id' => $logedUser,
            'title' => $req-> input('title'),
            'body' => $req-> input('body'),
            'image' => $imageName,
            'ingredients' => $req-> input('ingredients')
        ]);
       
        return redirect()->route('Recepie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function show($recepie)
    {
        $recepie = Recepie::where('id', '=', $recepie)->first();
        $creatorName = User::where('id', '=',$recepie['user_id'])-> first(['name']);
        $coments = Coment::whereBelongsTo($recepie)->with('user')->get();

        return view('recepieWiew', [
            'Recepie' => $recepie , 
            'creatorName' =>$creatorName['name'],
            'userName' => Auth::user()->name,
            'coments' =>$coments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepie $recepie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recepie $recepie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepie  $recepie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepie $recepie)
    {
        //
    }
}
