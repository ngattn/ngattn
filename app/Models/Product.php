<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name','slug', 'keyword', 'description', 'content', 'image', 'sku', 'price_cost','price', 'stock', 'status', 'type_product_id'];

    public function typeProuct()
    {
        return $this->belongsTo('App\Models\TypeProduct' , 'type_product_id', 'id');
    }

    public function productImage(){
        return $this->hasMany('App\Models\ProductImage','product_id', 'id');
    }
}
