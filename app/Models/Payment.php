<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bus_id',
        'booking_id',
        'amount',
        'payment_get',
        'transaction_id',
        'amount',
        'status' 
    ];
}
