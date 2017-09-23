<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Experto
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
        if(Auth::user()->role === 'experto'){
            return $next($request);
        }else{
            return abort(403, 'Unauthorized.');
        }
    }
}
