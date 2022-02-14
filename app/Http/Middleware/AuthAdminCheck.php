<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
        if(!session()-> has('logedAdmin') && ($req->path()== 'admin/panel') )
        {
            return redirect('admin/loginform')->with('fail','must be logged in');
        }

        if(session()-> has('logedAdmin') && ($req->path()== 'admin/loginform'  || $req->path() =='admin/registerform'))
        {
            return redirect('admin/panel');
        }

        return $next($req);
    }
}
