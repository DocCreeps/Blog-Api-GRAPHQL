<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Save extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'articles_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function articles(): BelongsTo
    {
        return $this->belongsTo(Articles::class);
    }

}
