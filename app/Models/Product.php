<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'cost_price', 'quantity', 'description', 'policy'];



    public function subCategories()
    {
        return $this->belongsToMany(
            SubCategory::class,
            'product_sub_category',
            'product_id',
        );
    }
}
