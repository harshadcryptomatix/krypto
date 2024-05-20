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
}
