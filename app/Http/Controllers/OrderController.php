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
    
    public function create()
    {
        $currencies = getAllCurrency();
        $application = Application::where('user_id',Auth::user()->id)->first();
        $default_currency = $application?->default_currency;
        return view('orders.create',compact('currencies','default_currency'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // You can call our API following curl post example
        $url = "https://dashboard.crypto-studio.co/api/transaction";
        $key = "11|FEvwAA7PPi1hLaKeX2nezd0XuDJPhVDDhcQxfdOi";
        // Fill with real customer info
        $data = [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
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

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            'Content-Type: application/json',
            'Authorization: Bearer 11|FEvwAA7PPi1hLaKeX2nezd0XuDJPhVDDhcQxfdOi'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $responseData = json_decode($response);
        
        dd($responseData);  
        return [
            'status' => $responseData->responseCode,
            'reason' => $responseData->responseMessage,
        ];

        
    }
}
