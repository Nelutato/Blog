<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('auth.admin.dashboard',[
            'users'=>$users,
        ]);
    }
    public function deleteUser($id)
    {
        User::where('id','=',$id)->delere();
        return redirect()->back();
    }
}
