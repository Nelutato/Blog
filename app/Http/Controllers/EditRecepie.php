<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recepieEdited;
use App\Models\Recepie;
use App\Models\User;

class EditRecepie extends Controller
{
    function EditForm($slug)
    {
        return view('recepieEditing',['id' =>$slug]);
    }

    function showEditedControll($subpage, $slug)
    {
        $recepies = recepieEdited::all()->where('recepieBelongs' ,'=', $slug);
        $recepie = Recepie::where('id', '=' , $slug)->first();
        $user = User::where('id', '=' , $recepies[0]['recepieUser'])->first();

        if($subpage == "ShowFullEdited")
            { return $this->ShowEditedRecepie($recepies, $recepie, $user, $slug);}
        elseif($subpage == "list")
            { return $this->listEditedRecepies($recepies, $recepie , $user);}
        else
            { return back(); }
    }

    function listEditedRecepies($recepies , $recepie, $user){
        return view('recepieEditedWiew')->with([
            'Recepies'=> $recepies,
            'RecepieMain'=> $recepie,
            'owner'=> $user
        ]);
    }

    function ShowEditedRecepie($recepies, $recepie, $user, $slug)
    {
        $editedRecepie = recepieEdited::where('id', '=', $slug)->first();
        return view('recepieEditedFullWiew')->with([
            'Recepies'=> $recepies,
            'RecepieMain'=> $recepie,
            'owner'=> $user,
            'editedRecepie'=> $editedRecepie
        ]);
    }
    function opinion(Request $req ,$slug)
    {
        $recepies = recepieEdited::where('recepieBelongs' ,'=', $slug)->first();
        $newTaste = $recepies->taste + $req->taste;
        $newSpeed = $recepies->speed + $req->speed;
        $newPrice = $recepies->price + $req->price;

        $recepies->update([
            'taste'=> $newTaste,
            'speed'=> $newSpeed,
            'price'=> $newPrice
        ]);

        return back();
    }

    function create(Request $req, $slug)
    {
        $taste="0";
        $speed="0";
        $price="0";
        $photo="none";

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
