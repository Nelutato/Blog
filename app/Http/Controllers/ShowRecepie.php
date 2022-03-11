<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\Admin;
use App\Models\User;
use App\Models\Coment;
use App\Http\Controllers\ComentControll;
use App\Models\recepieEdited;

class ShowRecepie extends Controller
{
    function getAllRecepies()
    {
        // if($slug=="Recepies")
        // {
            $Recepie = Recepie::all();
            
            $i=1;
            
            foreach($Recepie as $recepie){
                $recepieEdited = recepieEdited::all()->where('recepieBelongs', '=', $i);
                $recepieOpinion[$i] = ($recepie['taste']+ $recepie['speed']+ $recepie['price'])/3;
                
                if($recepieEdited){
                    $j=1;
                    foreach($recepieEdited as $recepieEdited){
                        $recepieEditedOpinion[$j] = ($recepieEdited['taste']+ $recepieEdited['speed']+ $recepieEdited['price'])/3;

                        if(isset($recepieEditedOpinion[$j]) && $recepieEditedOpinion[$j] > $recepieOpinion[$i])
                        {
                            $newData = recepieEdited::where('recepieBelongs', '=', $i)->first();
                            $Recepie[$i-1]['body'] = $newData['Body'];
                            $Recepie[$i-1]['ingredients'] = $newData['ingredients'];
                            $Recepie[$i-1]['admin_id']= $newData['recepieUser'];
                            $Recepie[$i-1]['taste']= $newData['taste'];
                            $Recepie[$i-1]['speed']= $newData['speed'];
                            $Recepie[$i-1]['price']= $newData['price'];
                            if($newData['photo'] !== "none"){
                                $Recepie[$i-1]['image'] = $newData['photo'];
                            }
                        }
                    }
                    $j++;
                }
                $i++;
            }

            return  $Recepie;
        // }
    }
    function Show($slug)
    {
        if($slug == "Recepies"){
            return view('recepies' ,['Recepie' => $this ->getAllRecepies($slug)]); 
        }
        elseif($slug== "welcome" || $slug== "")
        {
                $Recepie = Recepie::all();
                return view('home', ['Recepie' => $Recepie]);
        }else
        {
            return  $this ->getAllRecepies($slug);
        }
    }

    function  showFullRecepie($slug )
    {
        $Recepie = Recepie::where('id', '=', $slug)->first();
        if($Recepie['admin_id']<90){
            $creatorName = Admin::where('id', '=',$Recepie['admin_id'])-> first();
        }
        if($Recepie['admin_id']>90){
            $creatorName = User::where('id', '=',$Recepie['admin_id'])-> first();
        }
        $adminName = $creatorName['username'];

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
