<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name', 'gender', 'email','phone_number','address','note'];

    public function bill()
    {
        return $this->hasMany('App\Models\Bill','id_customer','id');
    }
}
