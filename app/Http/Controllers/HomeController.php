<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Recepie = Recepie::all();

        return view('home', ['Recepie' => $Recepie]);
    }
    public function userView()
    {
        $logedUser = auth::user();
        return view('auth.userAcountView' , ['LogedUserInfo' => $logedUser]);
    }
}
