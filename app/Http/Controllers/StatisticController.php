<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StatisticController extends Controller
{

    public function chuaxuly()
    {
        $customers = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('bills.status', '=', '0')
            ->get();
//        var_dump($customers);die();
        return view('admin.statistic.listOrder', compact('customers'));
    }

    public function chuagiao()
    {
        $customers = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('bills.status', '=', '1')
            ->get();
        return view('admin.statistic.listOrder', compact('customers'));
    }

    public function danggiao()
    {
        $customers = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('bills.status', '=', '2')
            ->get();
        return view('admin.statistic.listOrder', compact('customers'));
    }

    public function dagiao()
    {
        $customers = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('bills.status', '=', '3')
            ->get();
        return view('admin.statistic.listOrder', compact('customers'));
    }

    public function huy()
    {
        $customers = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('bills.status', '=', '4')
            ->get();
        return view('admin.statistic.listOrder', compact('customers'));
    }

    public function deleteBillStatus($id){
//        var_dump($id);die();
        $bill = Customer::find($id);
//        var_dump($bill);die();
        $bill->delete();
        Session::flash('message', "Successfully deleted");

        return Redirect::to('/bill');
    }
}
