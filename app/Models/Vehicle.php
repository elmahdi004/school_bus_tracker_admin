<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['name','registration plate','model','number of seats','status','position_id'];
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function busMaintenances(){
        return $this->hasMany(BusMaintenance::class);
    }
}
