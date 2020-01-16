<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class Checkjobseekersession
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
        
        if (!$request->session()->has('jobseeker_id') && !$request->session()->has('jobseeker_name')) {
            return redirect('login_page')->with('warning', 'ACCESS DENIED. DIRECT ACCESS TO THIS PAGE IS NOT PERMITTED');
        }

        return $next($request);
    }
}
