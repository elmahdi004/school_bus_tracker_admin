<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drivers extends Model
{
    use HasFactory;

    protected $fillable =[
        'username',
        'role',
        'driver_licence_nbr',
        'bus_id'
    ];

    //  public function Bus() : HasMany
    // {
    //     return $this->belongsTo(Bus::class);
    // }
}
