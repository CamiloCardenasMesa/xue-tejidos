<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product',
        'description',
        'price',
        'stock',
        'status',
        'image',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    // Relación muchos a muchos si un producto puede tener múltiples tags
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class);
    // }
}
