<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;

class ShowRecepie extends Controller
{
    function Show()
    {
        $Recepie = Recepie::all();
        return view('recepies', ['Recepie' => $Recepie]);
    }
    function  showFullRecepie($slug)
    {
        $Recepie = Recepie::where('id', '=', $slug)->first();
        return view('recepieWiew', ['Recepie' => $Recepie]);
    }
}
