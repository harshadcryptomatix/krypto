<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use Laravel\Fortify\Rules\Password;
use Hash, Auth;

class AccountSettingsController extends Controller
{
    public function getPage() : View {
        return view('account-settings.index');
    }

    public function changePassword(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'string', new Password, 'confirmed'],
        ]);
        
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Old password is invalid');
        }
        
        Auth::user()->update(['password' => Hash::make($request->new_password)]);
        
        return redirect()->back()->with('success', 'Your Password Changed Successfully');
    }
}
