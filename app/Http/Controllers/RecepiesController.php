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
    function createform()
    {
        return view('createPostForm');
    }

    public function createPost(Request $req)
    {
        $req-> validate([
            'title'=> 'required',
            'body'=> 'required',
            'image'=> 'required',
            'ingredients'=> 'required'
        ]);

        if($req->session()->get('logedAdmin'))
        {
            $logedUser = $req->session()->get('logedAdmin');
        }elseif($req->session()->get('loggedUser'))
        {
            $logedUser = $req->session()->get('loggedUser') + 90;
        }
        
        $timeYMD = carbon::now()->toDateString();
        $timeHMS = carbon::now()->toTimeString();
        $imageName= $logedUser. "_". $timeYMD. "_".$timeHMS. ".png";
        $pathToFile = public_path('images')."/".$imageName;
        $req-> image -> move($pathToFile);
        

        Recepie::create([
            'admin_id' => $logedUser,
            'title' => $req-> input('title'),
            'body' => $req-> input('body'),
            'image' => $imageName,
            'ingredients' => $req-> input('ingredients')
        ]);
       
        return redirect('admin/panel');
    }
    
    function Show($page)
    {
        if($page == "Recepies"){
            return view('recepies' ,['Recepie' => $this ->getAllRecepies()]); 
        }
        elseif($page== "welcome")
        {
                $Recepie = Recepie::all();
                return view('home', ['Recepie' => $Recepie]);
        }else
        {
            return  $this ->getAllRecepies();
        }
    }
    
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

    function  showFullRecepie($slug )
    {
        $Recepie = Recepie::where('id', '=', $slug)->first();
        $creatorName = User::where('id', '=',$Recepie['admin_id'])-> first(['name']);
        $coments = $this->showComent($Recepie['id']);

        if( null !== session()-> get('loggedUser') )
        {
            $logedUserName =User::where( 'id', '=', session()->get('loggedUser') )-> first();;
        }elseif (null !== session()-> get('logedAdmin')) 
        {
            $logedUserName = User::where( 'id', '=', session()->get('logedAdmin') )-> first();
        }else
        {
            $logedUserName = "Niezalogowany"; 
        }
        
        return view('recepieWiew', [
            'Recepie' => $Recepie , 
            'creatorName' =>$creatorName['name'],
            'userName' => $logedUserName,
            'coments' =>$coments['coments'],
            'coment_user' => $coments['coment_user']
        ]);
    }
    
    function showComent($Recepie)
    {
        $coments = 'empty'; 
        $coment_user[0] = 'empty';
        $coments = Coment::where('recepie_id', '=', $Recepie)->get(); 
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

