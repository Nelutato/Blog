<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $Recepie = Recepie::whereColumn('id', 'primary')->take(3)->get();
        return view('home', ['Recepie' => $Recepie]);
    }

    public function userView()
    {
        if(Auth::user()->is_admin ==0 )
        {
            $logedUser = auth::user();
            $userRecepies = Recepie::where('user_id', '=', $logedUser['id'])->take(3)->get();
            return view('auth.userAcountView', ['LogedUserInfo' => $logedUser, 'ownRecepies'=>$userRecepies]);
        }else {
            return redirect()->route('admin.index');
        }
    }
}
