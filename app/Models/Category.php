<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'description', 'status', 'user_id'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
