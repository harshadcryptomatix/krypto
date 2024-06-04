<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Auth;
use Http;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->application = Application::where('user_id', Auth::id())->first();
            if (!$this->application) {
                return redirect()->route('profile.details');
            }
            return $next($request);
        });
    }
    public function index()
    {
        $orders = Transaction::where('user_id', Auth::id())->select('id','order_id','first_name','last_name','ip_address','email','status','amount','country','currency','transaction_date')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $currencies = getAllCurrency();
        $application = Application::where('user_id', Auth::user()->id)->first();
        $default_currency = $application?->default_currency;
        return view('orders.create', compact('currencies', 'default_currency'));
    }

    public function store(Request $request)
    {
        try {
            // You can call our API following curl post example
            $url = "https://dashboard.crypto-studio.co/api/test/transaction";
            $key = "11|FEvwAA7PPi1hLaKeX2nezd0XuDJPhVDDhcQxfdOi";
            // Fill with real customer info
            $data = [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'address' => 'Address',
                'customer_order_id' => 'ORDER-78544646461235',
                'country' => 'US',
                'state' => 'NY', // if your country US then use only 2 letter state code.
                'city' => 'New York',
                'zip' => '38564',
                'ip_address' => '192.168.168.4',
                'email' => 'test@gmail.com',
                'country_code' => '+91',
                'phone_no' => '999999999',
                'amount' => '10.00',
                'currency' => 'USD',
                'card_no' => '4242424242424242',
                'ccExpiryMonth' => '02',
                'ccExpiryYear' => '2026',
                'cvvNumber' => '123',
                'response_url' => 'https://yourdomain.com/callback.php',
                'webhook_url' => 'https://yourdomain.com/notification.php',
            ];

            $order_id = 'ODR' . strtoupper(\Str::random(4)) . time() . strtoupper(\Str::random(6));

            $transaction = Transaction::create(array_merge($data, ['transaction_date' => now(), 'order_id' => $order_id, 'user_id' => Auth::id(), 'card_type' => 'VISA']));

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $key,
            ])->post($url, $data);

            $responseData = $response->json();

            if (isset($responseData['responseCode']) && $responseData['responseCode'] == '1') {
                Transaction::where('id', $transaction->id)->update(['status' => '1']);
                return redirect()->back()->with('success', $responseData['responseMessage']);
            } else {
                return redirect()->back()->with('error', $responseData['responseMessage'] ?? 'error');
            }



        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }
    public function show($id)
    {
        return Transaction::where(['id' => $id,'user_id' => Auth::id()])->first();
    }
    
}
