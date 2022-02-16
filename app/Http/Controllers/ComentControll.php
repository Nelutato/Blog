<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use App\Http\Controllers\ShowRecepie;


class ComentControll extends Controller
{
    function addComment(Request $req, $slug)
    {
        $req -> validate([
            'comment' => "required"
        ]);

        Coment::create([
            'user_id' => session()->get('loggedUser'),
            'recepie_id' => $slug,
            'comment' => $req -> input('comment')
        ]);
        return back();
    }
}
