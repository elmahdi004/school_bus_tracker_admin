<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['name','registration plate','model','number of seats','status','position_id','assistant_id','driver_id'];
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function busMaintenances(){
        return $this->hasMany(BusMaintenance::class);
    }
    public function assistant(){
        return $this->belongsTo(Assistant::class);
    }
    public function driver(){
        return $this->belongsTo(Drivers::class,'driver_id','driver_id');
    }
}
