<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSeat extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'doj',
        'seats',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'seats' => 'array', // Cast the seats attribute to an array
    ];
}
