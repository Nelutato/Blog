<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Recepie;
use App\Models\Coment;
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
    public function dashboardComents()
    {
        $coments = Coment::with('user','recepie')->get();
        return view('auth.admin.adminDashboard.dashboardComents',[
            'coments' => $coments,
        ]);
    }

    public function dashboardDelete($who, $id)
    {
        if($who == 'user')
            {User::where('id','=',$id)->delete();}
        elseif($who == 'Recepie')
            { Recepie::where('id','=',$id)->delete(); }
        elseif($who == 'Coment')
            { Coment::where('id','=',$id)->delete(); }

        return redirect()->back();
    }

    public function search($where, Request $req)
    {
        $what = $req->input('id');
        // dd($what ,$where);
        if($where == 'user')
        {
            return view( 'auth.admin.adminDashboard.dashboardUsers', [
                'users'=> User::where('id','=',$what)->first()->get(),
            ]);
        }
        elseif($where == 'Recepie')
        {
            return view( 'auth.admin.adminDashboard.dashboardRecepies', [
                'recepies'=> Recepie::where('id','=',$what)->first()->get(),
            ]);
        }
        elseif($where == 'Coment')
        {
            return view( 'auth.admin.adminDashboard.dashboardComent', [
                'users'=> Coment::where('id','=',$what)->first()->get(),
            ]);
        }
         
    }

}
