<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Auth;

class ApplicationController extends Controller
{
    public function profile_details(Request $request){
        $data = Application::where('user_id',Auth::user()->id)->first();
        if(!empty($data) && $request->update != 'true'){
            return view('application.profile-details',compact('data'));
        }
        $countries = getAllCountries();
        $currencies = getAllCurrency();
        if($request->update == 'true' && !empty($data)){
            return view('application.profile-edit',compact('countries','currencies','data'));
        }
        return view('application.profile-create',compact('countries','currencies'));
    }
    public function profile_save_info(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'country' => 'required',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'default_currency' => 'required',
        ]);
        $personalInfo = Application::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'dob' => date('Y-m-d',strtotime($validatedData['dob'])),
                'gender' => $validatedData['gender'],
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'address' => $validatedData['address'],
                'zip_code' => $validatedData['zip_code'],
                'default_currency' => $validatedData['default_currency'],
            ]
        );
        return redirect()->route('profile.details')->with('success','info save successfully');
    }
}
