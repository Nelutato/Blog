<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Models\Coment;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\RecepiesResources;
use Illuminate\Http\Request;

class RecepieController extends Controller
{
    public function index()
    {
        $Recepies = Recepie::whereColumn('id', 'primary')->paginate(5);
        return view('recepies', compact('Recepies'));
    }

    public function create()
    {
        return view('CreateRecepie');
    }

    public function store(Request $request, $slug = null)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'ingredients' => 'required',
        ]);
        $listIngredients= "";
        foreach ($request->input('ingredients') as $ingredient)
        {
            $listIngredients .= $ingredient." , ";
        }
        
        $timeYMD = carbon::now()->toDateString();
        $timeHMS = carbon::now()->toTimeString();
        $imageName = Auth::user()->name . '_' . $timeYMD . '_' . $timeHMS . '.png';
        $pathToFile = public_path('images') . '/';
        $request->image->move($pathToFile, $imageName);
        
        $Recepie = Recepie::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imageName,
            'ingredients' => substr($listIngredients,0,-2),
            'primary' => 0,
        ]);

        if (isset($slug)) {
            $Recepie->primary = $slug;
        } else {
            $Recepie->primary = $Recepie->id;
        }
        $Recepie->save();

        return redirect()->route('Recepie.show', [$Recepie]);
    }

    public function show($recepie)
    {
        $recepie = Recepie::where('id', '=', $recepie)->first();
        $creatorName = User::where('id', '=', $recepie['user_id'])->first(['name']);
        $coments = Coment::whereBelongsTo($recepie)
            ->with('user')
            ->get();

        return view('recepieWiew', [
            'Recepie' => $recepie,
            'creatorName' => $creatorName['name'],
            'coments' => $coments,
        ]);
    }

    function sortRecepie(Request $request)
    {
        $order = $request->input();
        if (($order == 'ASC') | ($order == 'DESC')) {
            $Recepie = Recepie::orderBy('created_at', $order)->paginate(5);
        } elseif (($order == 'price') | ($order == 'taste') | ($order == 'speed')) {
            $Recepie = Recepie::orderBy($order, 'ASC')->paginate(5);
        } else {
            $Recepie = Recepie::paginate(5);
        }

        return redirect()
            ->back()
            ->with(['Recepie' => $Recepie]);
    }

    function addComment(Request $req, $slug)
    {
        Coment::create([
            'user_id' => Auth::id(),
            'recepie_id' => $slug,
            'comment' => $req->input('comment'),
        ]);
        return back();
    }

    function listSubRecepies($slug)
    {
        return view('SubRecepieList', [
            'Recepie' => Recepie::where('primary', '=', $slug)->get(),
        ]);
    }

    function subRecepieCreateForm($slug)
    {
        return view('CreateSubRecepie', ['id' => $slug]);
    }

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
