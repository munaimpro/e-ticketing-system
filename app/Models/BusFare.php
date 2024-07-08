<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Ticket;

class BusFare extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'boarding_point',
        'boarding_time',
        'dropping_point',
        'dropping_time',
        'fare',
    ];

    // Define the relationship to the Bus model
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

}
