<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Recepie;

class AdminController extends Controller
{
    function register(Request $req)
    {
        $req-> validate([
            'email'=> ['required', 'unique:admins', 'email'],
            'username'=> ['required', 'unique:admins', 'min:8'],
            'password'=> ['required', 'min:6']
        ]);

        $admin = Admin::create([
            'email' => $req-> input('email'),
            'username' => $req-> input('username'),
            'password' => Hash::make($req-> input('password')),
        ]);
        $req-> session()-> put('logedAdmin', $admin->id);

        return redirect('/admin/panel');
    }

    function logIn(Request $req)
    {
        $adminData= Admin::where('username', '=', $req->username)->first();
        $req->validate([
            'username'=>['required', 'min:8'],
            'password'=> ['required','min:6']
        ]);

        if(!$adminData)
        {
            return back()->with('fail' , 'incorrect username');
        }
        elseif(hash::check($req->password, $adminData-> password))
        {
            $req-> session()-> put('logedAdmin',$adminData->id);
            return redirect('/admin/panel');
        }
        else
            { return back()->with('fail', 'incorrect password'); }
    }

    //          basics
    function index()
    {
        $adminData= ['LogedAdminInfo'=> Admin::where('id', '=', session('logedAdmin'))-> first()];
        $recepies = ['ownRecepies'=> Recepie::where('admin_id', '=', session('logedAdmin') )
        -> latest()-> get()];

        return view('adminDashboard')->with($adminData)
                                     ->with($recepies);
        // return $recepies;
    }

    function logOut()
    {
        if(session()-> has('logedAdmin'))
        {
            session()-> pull('logedAdmin');
            return redirect('/admin/loginform');
        }
    }
}
