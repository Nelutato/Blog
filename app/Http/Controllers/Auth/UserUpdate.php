<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class UserUpdate extends Controller
{
    public function updateName(Request $req)
    {     
        $req->validate([ 
            'name' => 'required|min:4|max:25|unique:users'
        ]);

        $user = Auth::user();
        $user->name = $req->input('name');
        $user->save();

        return back()->with('change','udało się zmienić Nazwę użytkownika');
    }

    public function updateEmail(Request $req)
    {                    
        $req->validate(
        [ 
            'email' => 'required|min:4|max:25|unique:users,email|email:rfc,dns'
        ]);

        $user = Auth::user();
        $user ->email = $req->input('email');
        $user->save();
        return back()->with('change','udało się zmienić adres email');
    }
}
