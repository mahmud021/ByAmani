<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category_id',
        'stock', 'is_featured', 'status', 'image','slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class)
            ->withPivot('price')
            ->withTimestamps();
    }


}
