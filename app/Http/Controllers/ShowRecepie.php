<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\Admin;
use App\Models\User;
use App\Models\Coment;
class ShowRecepie extends Controller
{
    function Show()
    {
        $Recepie = Recepie::all();
        return view('recepies', ['Recepie' => $Recepie]);
    }

    function  showFullRecepie($slug)
    {
        $Recepie = Recepie::where('id', '=', $slug)->first();
        $adminName = Admin::where('id', '=',$Recepie['admin_id'])-> first();
        $adminName= $adminName['username'];
        
        if( null !== session()-> get('loggedUser') )
        {
            $logedUser = session()->get('loggedUser');
            $userinfo = User::where('id', '=',$logedUser)->first();
            $userName = $userinfo['name'];
        }elseif (null !== session()-> get('logedAdmin')) {
             $userName = $adminName;
        }else
        {
            $userName = "Niezalogowany";
        }
    // coments
        $coments = Coment::all()->where('recepie_id', '=', $Recepie['id']); 
        if($coments == null)
            { $coments = 'empty'; }

        return view('recepieWiew', ['Recepie' => $Recepie , 
        'creatorName' =>$adminName,
        'userName' => $userName,
        'coments' =>$coments
        ]);
    }

}
