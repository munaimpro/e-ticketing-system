<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bus_id',
        'doj',
        'seats',
        'status'
    ];

    protected $casts = [
        'seats' => 'array', // Automatically cast the JSON column to an array
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
