<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use App\Http\Controllers\ShowRecepie;


class ComentControll extends Controller
{
    function addComment(Request $req)
    {
        $req -> validate([
            'comment' => "required"
        ]);

        Coment::create([
            'user_id' => session()->get('loggedUser'),
            'comment' => $req -> input('comment')
        ]);
        return back();
    }
    function ShowComent($slug)
    {
        $coments = Coment::all();
        // dd($coments);
        session()-> put('coments',$coments);
        return redirect()-> action([ShowRecepie::class, 'showFullRecepie'],['slug' => $slug]);
    }
}
