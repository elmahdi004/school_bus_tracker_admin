<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Drivers extends Model
{
    use HasFactory;

    protected $fillable =[
        'username',
        'role',
        'driver_licence_nbr',
        'bus_id',
        'phone_number'
    ];

     public function bus()
    {
        return $this->hasOne(Vehicle::class,'driver_id');
    }
}
