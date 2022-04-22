<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $Recepie = Recepie::all();
        return view('home', ['Recepie' => $Recepie]);
    }

    public function userView()
    {
        $logedUser = auth::user();
        return view('auth.userAcountView', ['LogedUserInfo' => $logedUser]);
    }
}
