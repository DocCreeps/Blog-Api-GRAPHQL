<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'lists_id', 'is_like'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lists(): BelongsTo
    {
        return $this->belongsTo(Lists::class);
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
