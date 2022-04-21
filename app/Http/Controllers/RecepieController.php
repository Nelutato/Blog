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

    public function index()
    {
        $Recepies = Recepie::all();
        return view( 'recepies' ,compact('Recepies') ) ;
    }


    public function create()
    {
        return view('createPostForm');
    }


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

    // public function edit(Recepie $recepie)
    // {
    //     return "not Ready";
    // }


    // public function update(Request $request, Recepie $recepie)
    // {
    //     return "not Ready";
    // }

}
