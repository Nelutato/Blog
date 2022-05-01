<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recepie;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databaseCount['users'] = User::all()->count();
        $databaseCount['recepies'] = Recepie::all()->count();
        return view('auth.admin.adminAccountView',['logedAdminInfo'=>Auth::user() ,'databaseCount'=>$databaseCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'email'=> ['filled', 'min:8'],
            'name' => ['filled', 'min:8'],
        ]);
        
        if(isset($validated->safe()->name)){
            $user = User::where( 'id','=', $id)->update(['name'=>$validated->safe()->name]);
        }elseif(isset($validated->safe()->email)){
            $user = User::where( 'id','=', $id)->update(['email'=>$validated->safe()->email]);
        }
        
         return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
