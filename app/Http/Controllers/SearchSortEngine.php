<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShowRecepie;

class SearchSortEngine extends Controller
{
    protected $ShowRecepie;
    function __construct(ShowRecepie $ShowRecepie)
    {
        $this->ShowRecepie = $ShowRecepie;
    }

    function sort(Request $req)
    {
        unset($Recepie);
        $Recepie = $this->ShowRecepie->getAllRecepies();
        $mode = $req->input('sort');

        if($mode == "oldest")
        {
            return view('recepies', ['Recepie' => $Recepie]);
        }elseif($mode == "newest")
        {
            return view('recepies', ['Recepie' => array_reverse($Recepie->toArray())] );
            // return $Recepie->reverse();
        }elseif($mode=="byWorstOpinion")
        {
            return "worst";
        }elseif($mode== "byBestOpinion")
        {
            dd($Recepie);
            return "Best";
        }else
        {
            return back() ;        
        }
    }
}
