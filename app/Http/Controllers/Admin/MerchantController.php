<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MerchantController extends Controller
{
    public function index()
    {
       $users = User::latest()->get();
    //    dd($users);
       return view('admin.merchant.index',compact('users')); 
    }
}
