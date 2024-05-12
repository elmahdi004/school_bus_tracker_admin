<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function child() : HasMany
    {
        return $this->HasMany(child::class);
    }
}
