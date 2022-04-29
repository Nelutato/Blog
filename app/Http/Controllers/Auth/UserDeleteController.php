<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDeleteController extends Controller
{
    function DeleteUser($userID)
    {
        $delete = User::where('id', '=', $userID)->delete();
    }   
}
