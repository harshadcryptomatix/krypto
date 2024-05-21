<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use Hash, Auth;

class AccountSettingsController extends Controller
{
    public function getPage() : View {
        return view('account-settings.index');
    }

    public function changePassword(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required',
        ]);
        
        Auth::user()->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()->back()->with('success', 'Your Password Changed Successfully');
    }
}
