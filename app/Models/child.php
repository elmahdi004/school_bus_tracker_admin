<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class child extends Model
{
    use HasFactory;
    protected $primaryKey = 'child_id';
    protected $fillable=[
        'username',
        'age',
        'nivScolaire',
        'parent_id'
    ];

    public function Parents() : BelongsTo
    {
        return $this->BelongsTo(Parents::class);
    }
    
}
