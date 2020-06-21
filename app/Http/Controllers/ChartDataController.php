<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use DateTime;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
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
        $monthly_post_count = Bill::whereMonth( 'created_at', $month )->get()->count();
        return $monthly_post_count;
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
}
