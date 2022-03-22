<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\recepieEdited;
use Illuminate\Support\Carbon;

class RecepiesController extends Controller
{
    public function createPost(Request $req)
    {
        $req-> validate([
            'title'=> 'required',
            'body'=> 'required',
            'image'=> 'required',
            'ingredients'=> 'required'
        ]);
        if($req->session()->get('logedAdmin')){
            $logedUser = $req->session()->get('logedAdmin');
        }elseif($req->session()->get('loggedUser'))
        {
            $logedUser = $req->session()->get('loggedUser') + 90;
        }
        $timeYMD = carbon::now()->toDateString();
        $timeHMS = carbon::now()->toTimeString();
        $imageName= $logedUser. "_". $timeYMD. "_".$timeHMS. ".png";
        $req-> image -> move(public_path('images'),$imageName);

        Recepie::create([
            'admin_id' => $logedUser,
            'title' => $req-> input('title'),
            'body' => $req-> input('body'),
            'image' => $imageName,
            'ingredients' => $req-> input('ingredients')
        ]);
       
        return redirect('admin/panel');
    }

    function createform()
    {
        return view('createPostForm');
    }

    function opinion(Request $req, $subpage, $slug)
    {
        if($subpage == 'AddEditedOpinion')
            { $recepies =  recepieEdited::where('recepieBelongs','=',$slug )->first(); }
        elseif($subpage== 'AddOpinion')
            { $recepies = Recepie::where('id','=',$slug )->first(); }
        else
            { return back(); }
        $newTaste = ($recepies->taste + $req->input('taste'))/2;
        $newSpeed = ($recepies->speed + $req->input('speed'))/2;
        $newPrice = ($recepies->price + $req->input('price'))/2;

        $recepies->update([
            'taste'=> $newTaste,
            'speed'=> $newSpeed,
            'price'=> $newPrice
        ]);   
        return back();
    }
    
    
}
