<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;


class OrderController extends Controller
{

    public function index()
    {

        $orders = Transaction::with('user:id,name') // Adjust fields based on your User model
            ->select('id', 'order_id', 'user_id', 'first_name', 'last_name', 'ip_address', 'email', 'status', 'amount', 'country', 'currency', 'transaction_date')
            ->latest()
            ->paginate(10);
        return view('admin.order.index', compact('orders'));
    }
    public function show($id)
    {
        return Transaction::findOrFail($id);
    }
}
