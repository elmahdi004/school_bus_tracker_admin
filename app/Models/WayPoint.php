<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WayPoint extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function students(){
        return $this->hasMany(child::class,'waypoint_id');
    }
    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
}
