<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'session_id',
        'gateway_id',
        'first_name',
        'last_name',
        'address',
        'customer_order_id',
        'country',
        'state',
        'city',
        'zip',
        'ip_address',
        'email',
        'country_code',
        'phone_no',
        'card_type',
        'amount',
        'currency',
        'card_no',
        'ccExpiryMonth',
        'ccExpiryYear',
        'cvvNumber',
        'status',
        'reason',
        'descriptor',
        'payment_gateway_id',
        'chargebacks',
        'chargebacks_date',
        'chargebacks_remove',
        'chargebacks_remove_date',
        'refund',
        'refund_reason',
        'refund_date',
        'refund_remove',
        'refund_remove_date',
        'is_converted',
        'converted_amount',
        'converted_currency',
        'is_converted_user_currency',
        'converted_user_amount',
        'converted_user_currency',
        'amount_in_usd',
        'website_url_id',
        'request_from_ip',
        'request_origin',
        'is_request_from_vt',
        'is_transaction_type',
        'is_webhook',
        'response_url',
        'webhook_url',
        'webhook_status',
        'webhook_retry',
        'transactions_token',
        'bin_details',
        'transaction_hash',
        'is_delete',
        'is_duplicate_delete',
        'transaction_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

