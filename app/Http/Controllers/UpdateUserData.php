<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UpdateUserData extends Controller
{
    function update(Request $req, $id)
    {   
        if($req->input('username')!= NULL)
        {
            $req->validate(
                [ 
                    'username' => 'required|min:8|max:20|unique:users,name'
                ]);
                
                $user = User::find($id);
                $user ->name = $req->input('username');
                $user->save();
                
                return back()->with('change','udało się zmienić Nazwę użytkownika');

        }elseif($req->input('email')!= NULL)
        {
            $req->validate(
                [ 
                    'email' => 'required|min:4|max:25|unique:users,email|email:rfc,dns'
                ]);

                $user = User::find($id);
                $user ->email = $req->input('email');
                $user->save();

                return back()->with('change','udało się zmienić adres email');
        }
    }
}
