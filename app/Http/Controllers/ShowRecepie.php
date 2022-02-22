<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\Admin;
use App\Models\User;
use App\Models\Coment;
use App\Http\Controllers\ComentControll;
class ShowRecepie extends Controller
{
    function Show()
    {
        $Recepie = Recepie::all();
        return view('recepies', ['Recepie' => $Recepie]);
    }

    function  showFullRecepie($slug )
    {
        $Recepie = Recepie::where('id', '=', $slug)->first();
        $adminName = Admin::where('id', '=',$Recepie['admin_id'])-> first();
        $adminName = $adminName['username'];

        if( null !== session()-> get('loggedUser') )
        {
            $logedUser = session()->get('loggedUser');
            $logedUser = User::where('id', '=',$logedUser)->first();
            $logedUserName = $logedUser['name'];
        }elseif (null !== session()-> get('logedAdmin')) {
             $logedUserName = $adminName;
        }else
            { $logedUserName = "Niezalogowany"; }
        
        $coments = $this->showComent($Recepie);
        return view('recepieWiew', [
            'Recepie' => $Recepie , 
            'creatorName' =>$adminName,
            'userName' => $logedUserName,
            'coments' =>$coments['coments'],
            'coment_user' => $coments['coment_user']
        ]);
    }
    
    function showComent($Recepie)
    {
        $coments = 'empty'; 
        $coment_user[0] = 'empty';

        $coments = Coment::all()->where('recepie_id', '=', $Recepie['id']); 
        $i=0;
        foreach ($coments as $coment)
        {
            $coment_user[$i]= User::where('id', '=', $coment['user_id'] )->first();
            $i++;
        }
        $comentsArr = array(
            'coments' => $coments,
            'coment_user' => $coment_user
        );
        
        return $comentsArr;
    }
}
