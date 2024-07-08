<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'coach_name',
        'coach_type',
        'total_seats',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function payment()
    // {
    //     return $this->belongsTo(Payment::class);
    // }
}
