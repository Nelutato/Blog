<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUserCheck
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
        if(!session()->has('loggedUser') && ($req->path() =='user/view' && $req->path() != 'user'))
        {
            return redirect('user')->with('fail','You must be logged in');
        }
        if(session()->has('loggedUser') && ($req->path() =='user'))
        {
            return redirect('user/view');
        }
        if(!session()-> has('loggedUser') &&  $req->path() =='user/logout')
        {
            return back();
        }
        if(session()-> has('logedAdmin'))
        {
            return redirect('/admin/logout');
        }
        return $next($req);
    }

}
