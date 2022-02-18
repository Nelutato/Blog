<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use App\Http\Controllers\ShowRecepie;


class ComentControll extends Controller
{
    function addComment(Request $req, $slug)
    {
        $user = session()->get('loggedUser');

        $req -> validate([
            'comment' => "required"
        ]);
        if( null== $user)
        {   
            $user = "0";
        }
        Coment::create([
            'user_id' => $user,
            'recepie_id' => $slug,
            'comment' => $req -> input('comment')
        ]);
        return back();
    }
}
