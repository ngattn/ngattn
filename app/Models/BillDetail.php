<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';

    protected $fillable = ['id_bill','id_product','	quantity','unit_price'];


    public function bill()
    {
        return $this->belongsTo('App\Models\Bill','id_bill','id');
    }


    public function product()
    {
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
}
