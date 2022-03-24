<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function logIn(Request $req)
    {
        $req-> validate([
            'username'=> ['required', 'min:8'],
            'password'=> ['required', 'min:6']
        ]);

        $userData = User::where('name', "=", $req->username)->first();
        if(!$userData)
        {
            return back()->with('fail','username is incorrect');
        }else{
            if(Hash::check($req-> password, $userData-> password))
            {
                $req-> session()-> put('loggedUser',$userData->id);
                return redirect('user/view');
                // return view('user.view');
            }else
            {
                return back()->with('fail', 'password is incorrect');
            }
        }
        
        return $req->input();
    }

    function register(Request $req)
    {
        $req-> validate([
            'email'=> ['required', 'unique:users', 'email'],
            'username'=> ['required', 'min:8'],
            'password'=> ['required', 'min:6']
        ]);

        $user = new User();
        $user-> email = $req->input('email');
        $user-> name = $req->input('username');
        $user-> password = Hash::make($req->input('password'));
        $user->save();

        $req-> session()-> put('loggedUser',$user->id);
        return view('user.view');
    }

    function userView()
    {
        $userData= ['LogedUserInfo'=> User::where('id', '=', session('loggedUser'))->first()];
        return view('userAcountView', $userData);
    }
    
    function Logout()
    {
        if(session()-> has('loggedUser'))   
        {
            session()-> pull('loggedUser');   
            return redirect('user/');
        }
    }
}
