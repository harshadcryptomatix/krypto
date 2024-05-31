<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Auth;

class OrderController extends Controller
{
    public function index(){
         return view('orders.index');
    }
    public function create(){
        $currencies = getAllCurrency();
        $application = Application::where('user_id',Auth::user()->id)->first();
        $default_currency = $application?->default_currency;
        return view('orders.create',compact('currencies','default_currency'));
    }
    public function store(Request $request){
         dd($request->all());
    }
}
