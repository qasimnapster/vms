<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::id()) {
            
            if ($request->route()->getName() == 'admin.login') {

                return redirect()->route('admin.index');
            }
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
