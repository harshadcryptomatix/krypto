<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
   
        if (Auth::guard('admin')->check()) {
            $user = auth()->guard('admin')->user();
        
            if(!$user->status){
                return redirect()->route('admin.login')->with('error','Your account is suspended');
            } 
            return $next($request);
        }

        return redirect()->route('admin.login'); // Redirect to admin login page
    }
}
