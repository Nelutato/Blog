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
        // if(!session()->has('loggedUser') && ($req->path() !='user/login' && $req->path() !='user/register'));
        if(!session()->has('loggedUser') && ($req->path() =='user/view' && $req->path() != 'user'))
        {
            return redirect('user')->with('fail','You must be logged in');
        }

        if(session()->has('loggedUser') && ($req->path() =='user'))
        {
            return redirect('user/view');
        }
        return $next($req);
    }
    // https://www.youtube.com/watch?v=ko4PU4eplnY
    // https://stackoverflow.com/questions/55178647/the-post-method-is-not-supported-for-this-route-supported-methods-get-head-l?rq=1
    
    // możliwe że nie działa bo nie ma atrybutu ->name('view.name'); w web.php :)
}
