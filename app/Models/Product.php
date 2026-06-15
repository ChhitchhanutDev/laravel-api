<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'image',
        'stock',
        'is_active',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
