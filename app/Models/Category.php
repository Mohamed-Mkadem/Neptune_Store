<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'slug','slogan', 'created_at', 'updated_at'];

    public function subCategories()
    {
        return $this->hasMany(
            SubCategory::class,
            'parent_id',
            'id'
        );
    }
}
