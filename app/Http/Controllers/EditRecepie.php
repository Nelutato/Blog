<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recepieEdited;

class EditRecepie extends Controller
{
    function show($slug)
    {
        return view('recepieEditing',['id' =>$slug]);
    }

    function create(Request $req, $slug)
    {
        if( null !== $req->session()->get('logedAdmin') )
        {
        $logedUser = $req->session()->get('logedAdmin');
        }elseif( null !== $req->session()->get('loggedUser') )
        {
        $logedUser = $req->session()->get('loggedUser');
        }else
        {
            return back();
        }

        $req-> validate([
            'title' => 'required',
            'ingredients'=> 'required',
            'body' => 'required'
        ]);
        $taste="0";
        $speed="0";
        $price="0";
        $photo="none";
        $end= recepieEdited::create([
            'recepieBelongs'=> $slug,
            'recepieUser'=> $logedUser,
            'ingredients'=> $req-> input('ingredients'),
            'Body'=> $req-> input('body'),
            'taste'=> $taste,
            'speed'=> $speed,
            'price'=> $price,
            'photo'=> $photo,
            // 'taste'=> $req-> input('taste'),
            // 'speed'=> $req-> input('speed'),
            // 'price'=> $req-> input('price'),
            // 'photo'=> $req-> input('photo'),
        ]);

        return $end;
    }
}
