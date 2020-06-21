<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getBill(){
        return view('admin.statistics.sldonhang');
    }

}
