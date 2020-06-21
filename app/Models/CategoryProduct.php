<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products';

    protected $fillable = ['name', 'slug', 'status'];

    public function typeProducts()
    {
        return $this->hasMany('App\Models\TypeProduct', 'category_product_id', 'id');
    }
}
