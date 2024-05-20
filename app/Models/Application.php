<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'country',
        'state',
        'city',
        'address',
        'zip_code',
        'default_currency',
        'status' 
        
        
    ];
     // Define the relationship with the User model
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
