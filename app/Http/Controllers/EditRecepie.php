<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditRecepie extends Controller
{
    function show($slug)
    {
        return view('recepieEditing');
    }
}
