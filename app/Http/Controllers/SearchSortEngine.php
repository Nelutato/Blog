<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecepiesController;
use App\Models\Recepie;

class SearchSortEngine extends Controller
{
    protected $ShowRecepie;
    function __construct(RecepiesController $ShowRecepie)
    {
        $this->ShowRecepie = $ShowRecepie;
    }

    function sort(Request $req)
    {
        $order = $req->input('sort');

        if($order == 'ASC' | $order == 'DESC')
        {
            $Recepie = Recepie::orderBy('created_at', $order)->get();
        }elseif( $order == 'price' | $order == 'taste' | $order == 'speed' )
        {
            $Recepie = Recepie::orderBy($order,'ASC')->get();
        }else
        {
            $Recepie = Recepie::get();
        }
        
        return view('recepies', ['Recepie' => $Recepie]);
    }
}
