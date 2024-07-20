<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Assistant extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    public function vehicle(){
        return $this->hasOne(Vehicle::class,'assistant_id');
    }
    public function incidents(){
        return $this->hasMany(Incident::class,'assistant_id');
    }
}
