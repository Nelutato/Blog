<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Recepie;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dashboardUsers()
    {
        $users = User::all();
        return view('auth.admin.adminDashboard.dashboardUsers',[
            'users' => $users
        ]);
    }
    public function dashboardRecepies()
    {
        $recepies = Recepie::with('user')->get();
        return view('auth.admin.adminDashboard.dashboardRecepies',[
            'recepies' => $recepies,
        ]);
    }
    public function deleteUser($id)
    {
        User::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
