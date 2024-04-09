<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusMaintenance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function busMaintenanceType(){
        return $this->belongsTo(MaintenanceType::class,'maintenance_type_id');
    }
}
