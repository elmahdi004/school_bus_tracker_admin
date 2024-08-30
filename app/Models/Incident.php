<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
    public function assistant(){
        return $this->belongsTo(Assistant::class,'assistant_id');
    }
}
