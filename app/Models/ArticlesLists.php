<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticlesLists extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'list_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function list(): BelongsTo
    {
        return $this->belongsTo(Lists::class);
    }
}
