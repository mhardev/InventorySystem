<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->role_as =='0'){
            return redirect('admin/dashboard')->with('status', 'Access Denied. You are not a User.');
        }

        $sessionStartTime = session('start_time');
        $currentTime = now();

        $sessionDuration = $currentTime->diffInMinutes($sessionStartTime);

        if ($sessionDuration > 120) {
            // Session has exceeded 120 minutes
            // Redirect to login page with SweetAlert message
            return redirect()->route('login')->with('session_expired', true);
        }

        return $next($request);
    }
}
