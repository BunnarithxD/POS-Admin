<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
    ];

    /**
     * Type casting for attributes.
     */
    protected $casts = [
        'price' => 'decimal:2',  
        'is_active' => 'boolean',
    ];

    /**
     * A product belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
