<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\recepieEdited;
use App\Models\Recepie;

class recepieOpinion extends Controller
{
    function opinion(Request $req, $subpage, $slug)
    {
        if($subpage == 'AddEditedOpinion')
            { $recepies =  recepieEdited::where('recepieBelongs','=',$slug )->first(); }
        elseif($subpage== 'AddOpinion')
            { $recepies = Recepie::where('id','=',$slug )->first(); }
        else
            { return back(); }
        $newTaste = ($recepies->taste + $req->input('taste'))/2;
        $newSpeed = ($recepies->speed + $req->input('speed'))/2;
        $newPrice = ($recepies->price + $req->input('price'))/2;

        $recepies->update([
            'taste'=> $newTaste,
            'speed'=> $newSpeed,
            'price'=> $newPrice
        ]);   
        return back();
    }
}
