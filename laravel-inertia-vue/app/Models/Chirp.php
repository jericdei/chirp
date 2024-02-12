<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;

    /** @inheritDoc */
    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    /** @inheritDoc */
    protected $attributes = [
        'likes' => 0
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
