<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\recepieEdited;
use App\Models\Recepie;

class recepieOpinion extends Controller
{
    function opinion(Request $request, $slug)
    {
        $recepies = Recepie::where('id','=',$slug )->first();

        $newTaste = ($recepies->taste + $request->input('taste'))/2;
        $newSpeed = ($recepies->speed + $request->input('speed'))/2;
        $newPrice = ($recepies->price + $request->input('price'))/2;

        $recepies->update([
            'taste'=> $newTaste,
            'speed'=> $newSpeed,
            'price'=> $newPrice
        ]);   

        return back();
    }
}
