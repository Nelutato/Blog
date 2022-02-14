<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainSites extends Controller
{
    function index($slug)
    {
        $mainSite= [
            'welcome'=> 'home',
            'Blog'=> 'blog',
            'Community'=>'community' 
        ];
        return view($mainSite[$slug]);
    }
}
