<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'slug'];
    // protected $table = 'sub_categories';
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_sub_category',
            'sub_category_id',
            'product_id',
            'id',
            'id'
        );
    }
}
