<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recepieEdited;
use App\Models\Recepie;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Coment;

class EditRecepie extends Controller
{
    function showEditedControll($subpage, $slug)
    {
        if($subpage == "ShowFullEdited")
        {
            return $this->ShowEditedRecepie($slug);
        }elseif($subpage == "list")
        {
            return $this->listEditedRecepies($slug);
        }else
        { 
            return back(); 
        }
    }

    function listEditedRecepies($slug)
    {
        $recepies = recepieEdited::where('recepieBelongs' ,'=', $slug)->get();
        $recepie = Recepie::where('id', '=' , $slug)->first();
        $user = array();
        
        foreach($recepies as $key)
        {
            $user[] = User::where('id', '=' , $key['recepieUser'])->first(['name']);
        }

        return view('recepieEditedWiew')->with([
            'Recepies'=> $recepies,
            'RecepieMain'=> $recepie,
            'owner'=> $user
        ]);
    }

    function ShowEditedRecepie( $slug)
    {
        $recepies = recepieEdited::where('id' ,'=', $slug)->first();
        $recepie = Recepie::where('id', '=' , $recepies['recepieBelongs'])->first(['title','id']);
        $editedRecepie = recepieEdited::where('id', '=', $slug)->first();
        $user = User::where('id', '=' , $recepies['recepieUser'])->first(['name']);
        $coments = $this->showComent($recepie);

        if( null !== session()-> get('loggedUser') )
        {
            $logedUser = User::where('id', '=',session()->get('loggedUser'))->first();
            $logedUserName = $logedUser['name'];
        }else
        {
            $logedUserName = "Niezalogowany"; 
        }

        return view('recepieEditedFullWiew')->with([
            'Recepies'=> $recepies,
            'RecepieMain'=> $recepie,
            'owner'=> $user,
            'editedRecepie'=> $editedRecepie,
            'coments' =>$coments['coments'],
            'coment_user' => $coments['coment_user'],
            'userName' =>$logedUserName
        ]);
        
    }

    function showComent($Recepie)
    {
        $coments = 'empty'; 
        $coment_user[0] = 'empty';
        $coments = Coment::where('recepie_id', '=', $Recepie)->get(); 
        // $i=0;
        
        foreach ($coments as $coment)
        {
            $coment_user[]= User::where('id', '=', $coment['user_id'] )->first();
            // $i++;
        }

        $comentsArr = array(
            'coments' => $coments,
            'coment_user' => $coment_user
        );
        
        return $comentsArr;
    }

    function EditForm($slug)
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
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if( $req->hasFile('image') )
        {
            $timeYMD = carbon::now()->toDateString();
            $timeHMS = carbon::now()->toTimeString();
            $imageName= "Edit_".$logedUser. "_". $timeYMD. "_".$timeHMS. ".png";
            $pathToFile = public_path('images')."/".$imageName;
            $req-> image -> move($pathToFile);
        }else
        {
            $imageName="empty";
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
