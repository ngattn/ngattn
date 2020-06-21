<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\New24h;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bills = Bill::all();
        $products = Product::all();
        $guest = DB::table('users')
            ->where('role', '1')
            ->get();
        $news = New24h::all();
        $bill_guest = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin/home', compact('bills', 'products', 'guest', 'news', 'bill_guest'));
    }
}
