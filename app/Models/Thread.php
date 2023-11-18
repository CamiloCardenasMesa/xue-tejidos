<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_category_id  ',
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function forumCategory(): BelongsTo
    {
        return $this->belongsTo(ForumCategory::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
