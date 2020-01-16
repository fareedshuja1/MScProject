<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class Checkusersession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (!Session::has('admin_name') && !Session::has('admin_email')) {
            return redirect('adminlogin')->with('status', 'Please login to contiue!');
        }

        return $next($request);
    }
}
