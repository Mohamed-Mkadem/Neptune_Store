<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Model
{
    use HasFactory;
    public $incrementing = true;
    public $table = "order_product";

    public $fillable = [
        'price',
        'product_id',
        'product_name',
        'quantity',
        'order_id'
    ];
}
