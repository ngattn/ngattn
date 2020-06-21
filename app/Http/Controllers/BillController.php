<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use App\Models\Bill;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sday = $request->get('sday');
        $eday = $request->get('eday');
//        var_dump($sday);exit();
        $status = $request->get('status');

        $startDay = !empty($sday) ? $sday . ' 00:00:00' : '1970-01-01 02:41:2';
        $endDay = !empty($eday) ? $eday . ' 23:59:59' : date("Y/m/d H:i:s");
//        var_dump($startDay);exit();
        if ($status != '') {
            $listOrders = DB::table('customers')
                ->join('bills', 'customers.id', '=', 'bills.id_customer')
                ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status')
                //            ->join('bills', 'customers.id', '=', 'bills.id_customer')->get();
                ->where('bills.created_at', '>=', $startDay)
                ->where('bills.created_at', '<=', $endDay)
                ->where('bills.status', $status)
                ->orderBy('id', 'desc')
                //            ->get()
                ->paginate(10)
                ->withPath('?sday=' . $sday . '&eday=' . $eday . '&status=' . $status);
            //        var_dump($listOrders);die();
            $this->data['listOrders'] = $listOrders;
        }else{
            $listOrders = DB::table('customers')
                ->join('bills', 'customers.id', '=', 'bills.id_customer')
                ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status')
                //            ->join('bills', 'customers.id', '=', 'bills.id_customer')->get();
                ->where('bills.created_at', '>=', $startDay)
                ->where('bills.created_at', '<=', $endDay)
                ->orderBy('id', 'desc')
                //            ->get()
                ->paginate(10)
                ->withPath('?sday=' . $sday . '&eday=' . $eday . '&status=' . $status);
            //        var_dump($listOrders);die();
            $this->data['listOrders'] = $listOrders;
        }
        return view('admin.bill.index', $this->data, compact('sday', 'eday', 'status'));
    }

    public function getBillGuest($id){
//        var_dump($id);die();
        $customerInfo = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
//            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('customers.id', '=', $id)
            ->first();

        $billInfo = DB::table('bills')
            ->join('bill_details', 'bills.id', '=', 'bill_details.id_bill')
            ->leftjoin('products', 'bill_details.id_product', '=', 'products.id')
            ->where('bills.id_customer', '=', $id)
            ->select('bills.*', 'bill_details.*', 'products.name as product_name')
            ->get();
//        var_dump($billInfo);die();

        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('admin.bill.bill-guest', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerInfo = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.id_customer')
//            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status')
            ->select('customers.*', 'bills.id as id_bill', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status', 'bills.payment')
            ->where('customers.id', '=', $id)
            ->first();

        $billInfo = DB::table('bills')
            ->join('bill_details', 'bills.id', '=', 'bill_details.id_bill')
            ->leftjoin('products', 'bill_details.id_product', '=', 'products.id')
            ->where('bills.id_customer', '=', $id)
            ->select('bills.*', 'bill_details.*', 'products.name as product_name')
            ->get();

        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('admin.bill.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        Session::flash('message', "Successfully updated");

        return Redirect::to('bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        var_dump($id);die();
//        $bill = Customer::find($id);
//        $bill->delete();
//        Session::flash('message', "Successfully deleted");
//
//        return Redirect::to('/bill');
    }

    public function deleteBill($id){
//        var_dump($id);die();
        $bill = Customer::find($id);
//        var_dump($bill);die();
        $bill->delete();
        Session::flash('message', "Successfully deleted");

        return Redirect::to('/bill');
    }
}
