<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use DateTime;
use Illuminate\Http\Request;

class DoanhThuController extends Controller
{
//    public function getDoanhThu(){
//        return view('admin.statistics.doanhthu');
//    }

    function getAllMonths(){
        $month_array = array();
        $posts_dates = Bill::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
//        var_dump($posts_dates);exit();
        $posts_dates = json_decode( $posts_dates );
//        var_dump($posts_dates);exit();
        if ( ! empty( $posts_dates ) ) {
            foreach ( $posts_dates as $key=>$unformatted_date ) {
                $date = new DateTime( $unformatted_date);
                $month_no = $date->format( 'm' );
                $month_name = $date->format( 'M' );
                $month_array[ $month_no ] = $month_name;
            }
        }
//        var_dump($month_array);exit();
        return $month_array;
//        return $this->getMonthlyPostCount(11);
    }

    function getMonthlyPostCount( $month ) {
        $monthly_post_count = Bill::whereMonth( 'created_at', $month )->select('total')->get();
        $ahihi = json_decode( $monthly_post_count, TRUE );
//        $abc = json_encode($ahihi, true);
        $abc =[];
        foreach ($ahihi as $a){
//            var_dump($a['total']);die();
            array_push($abc, $a['total']);
        }
//        return $abc;
        return array_sum($abc);
    }

    function getMonthlyPostData() {
        $monthly_post_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if ( ! empty( $month_array ) ) {
            foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyPostCount( $month_no );
                array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $month_name_array, $month_name );
            }
        }
        $max_no = max( $monthly_post_count_array );
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $monthly_post_data_array = array(
            'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'max' => $max,
        );
        return $monthly_post_data_array;
    }

    public function getdoanhthu(){
        return view('admin.statistics.doanhthu');
    }


    public function getMonthlyBillCancel(){
        $month_array = array();
        $posts_dates = Bill::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
//        var_dump($posts_dates);exit();
        $posts_dates = json_decode( $posts_dates );
//        var_dump($posts_dates);exit();
        if ( ! empty( $posts_dates ) ) {
            foreach ( $posts_dates as $key=>$unformatted_date ) {
                $date = new DateTime( $unformatted_date);
                $month_no = $date->format( 'm' );
                $month_name = $date->format( 'M' );
                $month_array[ $month_no ] = $month_name;
            }
        }
//        var_dump($month_array);exit();
        return $month_array;
//        return $this->getMonthlyPostCount(11);
    }

    function getMonthlyBillCancelCount( $month ) {
        $monthly_post_count = Bill::whereMonth( 'created_at', $month )->select('status')->where('status', 4)->get();
//        var_dump($monthly_post_count);die();
        $ahihi = json_decode( $monthly_post_count, TRUE );
//        $abc = json_encode($ahihi, true);
        $abc =[];
        foreach ($ahihi as $a){
//            var_dump($a['total']);die();
            array_push($abc, $a['status']);
        }
//        return $abc;
        return sizeof($abc);
    }

    function getBillCancel() {
        $monthly_post_count_array = array();
        $month_array = $this->getMonthlyBillCancel();
        $month_name_array = array();
        if ( ! empty( $month_array ) ) {
            foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyBillCancelCount( $month_no );
                array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $month_name_array, $month_name );
            }
        }
        $max_no = max( $monthly_post_count_array );
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $monthly_post_data_array = array(
            'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'max' => $max,
        );
        return $monthly_post_data_array;
    }

    public function getdonhuy(){
        return view('admin.statistics.billCancel');
    }
}
