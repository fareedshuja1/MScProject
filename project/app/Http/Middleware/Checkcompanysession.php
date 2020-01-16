<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class Checkcompanysession
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
        
        if (!$request->session()->has('company_id') && !$request->session()->has('company_name')) {
            return redirect('login_page')->with('warning', 'To access this page, you must first login as Company / Employer.');
        }

        return $next($request);
    }
}
