<?php

namespace App\Models;


use \NumberFormatter;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $table = "products";

    protected $fillable = ['name', 'image', 'price', 'cost_price', 'quantity', 'description', 'policy', 'ordered'];



    public function subCategories()
    {
        return $this->belongsToMany(
            SubCategory::class,
            'product_sub_category',
            'product_id',
        );
    }

    public function getEarningsAttribute()
    {
           return ($this->price - $this->cost_price) * $this->ordered;
        
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id',  'id', 'id');
    }
}
