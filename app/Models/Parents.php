<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Parents extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $primaryKey = 'parent_id';

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(child::class,'parent_id','child_id');
    }
}
