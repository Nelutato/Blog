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

    public function makeAdmin($id)
    {
        User::where('id', $id)->update(['is_admin' => 1]);
        return redirect()->back();
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
        
        if($where == 'User')
        {
            $users[0] = User::where('id',$what)->firstOrFail();
            return view( 'auth.admin.adminDashboard.dashboardUsers', [
                'users'=> $users
            ]);
        }
        elseif($where == 'Recepie')
        {
            $Recepie[0] = Recepie::where('id',$what)->firstOrFail();
            return view( 'auth.admin.adminDashboard.dashboardRecepies', [
                'recepies'=> $Recepie ,
            ]);
        }
        elseif($where == 'Coment')
        {
            $coments[0] = Coment::where('id',$what)->firstOrFail();
            return view( 'auth.admin.adminDashboard.dashboardComent', [
                'coments'=> $coments,
            ]);
        }
    }

}
