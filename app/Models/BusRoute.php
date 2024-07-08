<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;
    protected $table = 'bus_routes';
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];
}
