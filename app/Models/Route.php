<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
    public function waypoints(){
        return $this->hasMany(WayPoint::class,'route_id');
    }
    public function vols(){
        return $this->hasMany(Vol::class,'route_id');
    }
}
