<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bus_id',
        'from',
        'to',
        'doj',
        'seat',
        'seats',
        'fare',
        'amount',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Bus model
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
