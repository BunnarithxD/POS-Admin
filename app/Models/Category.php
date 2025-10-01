<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // ✅ Enables factory usage for seeding & testing

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'image',       // ✅ Add image if you plan to store category images
        'created_by',
    ];

    /**
     * A category can have many products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * A category is created by one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
