<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
class SubRecepieController extends Controller
{
    function subRecepieCreate(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'ingredients' => 'required',
            'body' => 'required',
        ]);
        Recepie::create([
            'title' => $request->input('title'),
            'image' => $request->input('image'),
            'ingredients' => $request->input('ingredients'),
            'body' => $request->input('body'),
            'primary' => $slug,
        ]);
        return view('RecepieList', ['id' => $slug]);
    }
}
