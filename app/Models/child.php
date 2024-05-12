<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class child extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Parents() : BelongsTo
    {
        return $this->BelongsTo(Parents::class);
    }
    public function waypoint(){
        return $this->belongsTo(WayPoint::class,'waypoint_id');
    }
}
