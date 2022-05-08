<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Recepie;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $recepies = Recepie::all();
        return view('auth.admin.dashboard',[
            'users' => $users,
            'recepies' => $recepies,
        ]);
    }
    public function deleteUser($id)
    {
        User::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
