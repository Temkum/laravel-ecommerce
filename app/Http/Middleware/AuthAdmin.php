<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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
        if (Auth::user()->user_type === 'ADM') {
            session(['user_type' => 'ADM']);
        } else if (Auth::user()->user_type === 'USR') {
            session(['user_type' => 'USR']);
        }

        if (session('user_type') === 'ADM') {
            return $next($request);
        } else if (Auth::user()->user_type === 'USR') {
            session(['user_type' => 'USR']);
        } else {
            session()->flush();
            return redirect()->route('login');
        }

        return $next($request);
    }
}