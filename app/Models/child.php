<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class child extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'child_id';

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Parents::class,'parent_id','parent_id');
    }
    public function waypoint(){
        return $this->belongsTo(WayPoint::class,'waypoint_id');
    }
}
