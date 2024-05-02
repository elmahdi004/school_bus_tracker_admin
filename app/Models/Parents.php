<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parents extends Model
{
    use HasFactory;
    protected $primaryKey = 'parent_id';

    protected $fillable = [
        'username',
        'contact_num',
        'email',
        'address',
        'password'
        // Add more attributes as needed
    ];
    public function child() : HasMany
    {
        return $this->HasMany(child::class);
    }
}
