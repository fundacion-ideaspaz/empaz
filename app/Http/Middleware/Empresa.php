<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Empresa
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
        $currentRole = Auth::user()->role;
        if ($currentRole != 'empresa' || $currentRole === 'superadmin' || $currentRole === 'experto') {
            return $next($request);
        } else {
            return abort(403, 'Unauthorized.');
        }
    }
}
