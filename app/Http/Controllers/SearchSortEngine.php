<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShowRecepie;
use App\Models\Recepie;

class SearchSortEngine extends Controller
{
    protected $ShowRecepie;
    function __construct(ShowRecepie $ShowRecepie)
    {
        $this->ShowRecepie = $ShowRecepie;
    }

    function sort(Request $req)
    {
        $order = $req->input('sort');

        $Recepie = Recepie::when($order == 'oldest',
            function($querry)
            {
                $querry; 
            })
        ->when($order == 'newest',
            function($querry)
            {
                $querry->orderBy('created_at','DESC');
            })
        ->when($order,
            function($querry, $order)
            {
                $querry->orderBy("$order",'ASC');
            })->get();
        
        return view('recepies', ['Recepie' => $Recepie]);
    }
}
