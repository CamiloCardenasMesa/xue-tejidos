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
        'enable',
        'image',
        'category_id'
    ];

     /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    // Relación muchos a muchos si un producto puede tener múltiples tags
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class);
    // }
}
