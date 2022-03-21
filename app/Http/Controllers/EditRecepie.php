<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recepieEdited;
use App\Models\Recepie;
use App\Models\User;
use Illuminate\Support\Carbon;

class EditRecepie extends Controller
{
    function EditForm($slug)
    {
        return view('recepieEditing',['id' =>$slug]);
    }

    function showEditedControll($subpage, $slug)
    {
        $recepies = recepieEdited::where('recepieBelongs' ,'=', $slug)->get();
        $recepie = Recepie::where('id', '=' , $slug)->first();
        // dd($recepies);
        if(isset($recepies[0]['recepieUser'])){
        $user = User::where('id', '=' , $recepies[0]['recepieUser'])->first();
        }else
        {
            $user = "none";
        }

        if($subpage == "ShowFullEdited")
            { return $this->ShowEditedRecepie($recepies, $recepie, $user, $slug);}
        elseif($subpage == "list")
            {
                 return $this->listEditedRecepies($recepies, $recepie , $user);
            }
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
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if( $req->hasFile('image') )
        {
            $timeYMD = carbon::now()->toDateString();
            $timeHMS = carbon::now()->toTimeString();
            $imageName= "Edit_".$logedUser. "_". $timeYMD. "_".$timeHMS. ".png";
            $req-> image -> move(public_path('images'),$imageName);
        }
        
        recepieEdited::create([
            'recepieBelongs'=> $slug,
            'recepieUser'=> $logedUser,
            'ingredients'=> $req-> input('ingredients'),
            'Body'=> $req-> input('body'),
            'taste'=> 0,
            'speed'=> 0,
            'price'=> 0,
            'photo'=> $imageName
        ]);

        return redirect('user/view') ;
    }
}
