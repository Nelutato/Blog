<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepie;
use App\Models\Task;
use Illuminate\Support\Carbon;

class RecepiesController extends Controller
{
    public function createPost(Request $req)
    {
        $req-> validate([
            'title'=> 'required',
            'body'=> 'required',
            'image'=> 'required',
            'ingredients'=> 'required'
        ]);

        $logedAdmin = $req->session()->get('logedAdmin');
        $timeYMD = carbon::now()->toDateString();
        $timeHMS = carbon::now()->toTimeString();
        $imageName= $logedAdmin. "_". $timeYMD. "_".$timeHMS. ".png";
        $req-> image -> move(public_path('images'),$imageName);

        $recepie=  Recepie::create([
            'admin_id' => $logedAdmin,
            'title' => $req-> input('title'),
            'body' => $req-> input('body'),
            'image' => $imageName,
            'ingredients' => $req-> input('ingredients')
        ]);
       
        return redirect('admin/panel');
    }

    function createform()
    {
        return view('createPostForm');
    }
    
    
}
