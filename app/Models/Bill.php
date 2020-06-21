<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = ['total','payment','note','id_customer', 'status'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','id_customer','id');
    }

    public function billDetail()
    {
        return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }
}
