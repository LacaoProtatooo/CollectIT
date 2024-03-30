<?php

namespace App\Http\Middleware;

use App\Models\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->User()->role == 'admin') {
            return $next($request);
        }
        else { // Modify Later, pangit auto logout haha
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            abort(401);
        }

    }
}
