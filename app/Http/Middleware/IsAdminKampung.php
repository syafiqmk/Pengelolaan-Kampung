<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminKampung
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()) {
            if(auth()->user()->role !== "AdminKampung") {
                return redirect()->route("402");
            } else {
                if(auth()->user()->status === "Waiting") {
                    return redirect()->route("accountWait");
                }
            }
        } else {
            return redirect()->route("login");
        }
        return $next($request);
    }
}
