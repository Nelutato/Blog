<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {        
        return view('login');
    }


    public function store(Request $req )
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
        return redirect()->route( 'users.show',['user'=>$user['id']] );
    }

    public function show(User $user)
    {
        $userData= ['LogedUserInfo'=> User::where('id', '=', $user['id'])->first()];
        return view('userAcountView', $userData);
    }

    public function update(Request $req, User $user)
    {
        if($user['id'] == session('loggedUser')){
            if($req->input('username')!= NULL)
            {
                $req->validate(
                    [ 
                        'username' => 'required|min:8|max:20|unique:users,name'
                    ]);
                    
                    $user = User::find($user['id']);
                    $user ->name = $req->input('username');
                    $user->save();
                    
                    return back()->with('change','udało się zmienić Nazwę użytkownika');

            }elseif($req->input('email')!= NULL)
            {
                $req->validate(
                    [ 
                        'email' => 'required|min:4|max:25|unique:users,email|email:rfc,dns'
                    ]);

                    $user = User::find($user['id']);
                    $user ->email = $req->input('email');
                    $user->save();

                    return back()->with('change','udało się zmienić adres email');
            }
        }else
        {
            return back(302)->with('change','nieoczekiwany błąd nie udało się wprowadzić zmiany');
        }
    }

    public function destroy(User $user)
    {
        if(session('loggedUser') == $user['id'])
        {
            $user = User::where('id','=',$user['id']);
            session()-> pull('loggedUser');   
            $user->delete();
        
            return redirect()->route('users.index');
        }else
        {
            dd($user);
        }
    }

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
                $userID= $userData->id;
                $req-> session()-> put('loggedUser',$userID);
                return redirect()->route('users.show',['user'=>$userID ]);
            }else
            {
                return back()->with('fail', 'password is incorrect');
            }
        }
        
        return $req->input();
    }

    function LogOut()
    {
        if(session()-> has('loggedUser'))   
        {
            session()-> pull('loggedUser');   
            return redirect()->route('users.index');
        }
        return redirect()->route('users.index');
    }
}
