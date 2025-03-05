<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',

        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function image():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
