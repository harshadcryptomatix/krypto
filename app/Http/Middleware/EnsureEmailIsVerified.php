<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerified
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
        if (Auth::check() && !$request->user()->hasVerifiedEmail()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Your account has been registered successfully. You will receive an email shortly to activate your account.'], 403);
            }

            Auth::logout();
            
            return redirect()->route('login')->with('success', 'Your account has been registered successfully. You will receive an email shortly to activate your account.');
        }

        return $next($request);
    }
}
