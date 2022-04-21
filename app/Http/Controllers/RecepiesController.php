<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\recepieEdited;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Coment;
class RecepiesController extends Controller
{
    function getAllRecepies()
    {
            $Recepie = Recepie::all();
            $i=1;
            
            foreach($Recepie as $recepie)
            {            
                $recepieEdited = recepieEdited::where('recepieBelongs', '=', $recepie['id'])->get();

                if( isset($recepieEdited) )
                {
                    $recepieOpinion= ($recepie['taste']+ $recepie['speed']+ $recepie['price'])/3;
                    // dla każdego edytowanego przepisu 
                    foreach($recepieEdited as $recepieEdited){
                        $recepieEditedOpinion = ($recepieEdited['taste']+ $recepieEdited['speed']+ $recepieEdited['price'])/3;

                        // Jeżeli edytowana ma lepszą opinię zamień oryginalny przepis na edytowany
                        if( $recepieEditedOpinion > $recepieOpinion )
                        {
                            $newData = recepieEdited::where('recepieBelongs', '=', $i)->first();
                            $Recepie[$i-1]['body'] = $newData['Body'];
                            $Recepie[$i-1]['ingredients'] = $newData['ingredients'];
                            $Recepie[$i-1]['admin_id']= $newData['recepieUser'];
                            $Recepie[$i-1]['taste']= $newData['taste'];
                            $Recepie[$i-1]['speed']= $newData['speed'];
                            $Recepie[$i-1]['price']= $newData['price'];
                            $Recepie[$i-1]['edited']= "yes";
                            if($newData['photo'] !== "none"){
                                $Recepie[$i-1]['image'] = $newData['photo'];
                            }
                        }
                    }
                }
                $i++;
            }

            return  $Recepie;
    }



}

