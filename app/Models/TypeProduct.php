<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'type_products';

    protected $fillable = ['name', 'slug', 'status', 'category_product_id'];

    public function categoryProduct()
    {
        return $this->belongsTo('App\Models\CategoryProduct', 'category_product_id', 'id');
    }
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'type_product_id', 'id');
    }
}
