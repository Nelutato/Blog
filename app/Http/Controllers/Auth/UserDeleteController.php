<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class UserDeleteController extends Controller
{
    function DeleteUser()
    {
        $user = Auth::user();
        Auth::logout();
        $delete = User::where('id', '=', $user['id'])->delete();
        return redirect()->back();
    }   
}
