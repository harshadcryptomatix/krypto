<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    

    public function index()
    {
       $applications = Application::latest()->get();
       return view('admin.applications.index',compact('applications')); 
    }
    public function viewApplication(Request $request,$id){
        $data = Application::findOrFail($id);
        return view('admin.applications.application-details',compact('data'));
    }
    public function statusUpdate(Request $request,$id){
         if($id){
            $data = Application::findOrFail($id);
            if($data->status == 'pending'){
                $data->status = $request->status;
                $data->save();
                return back()->with('success','Application status updated successfully.');
            }
            return back()->with('error','Application status already updated.');
         }
    }
}
