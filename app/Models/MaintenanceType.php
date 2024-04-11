<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    use HasFactory;
    public function busMaintenance(){
        return $this->hasMany(BusMaintenance::class,'maintenance_type_id');
    }
}
