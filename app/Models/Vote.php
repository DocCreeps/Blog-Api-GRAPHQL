<?php

// app/Models/Vote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'article_id', 'is_upvote', 'is_downvote'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article():  BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
