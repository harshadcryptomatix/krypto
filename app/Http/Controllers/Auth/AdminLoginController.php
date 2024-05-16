<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index(){
           return view('admin.dashboard');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                if(!Auth::guard('admin')->user()->status){
                       Auth::guard('admin')->logout();
                       return back()->with('error','Your account is suspended');
                }
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->route('admin.login')->with('error', 'Invalid credentials');
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}