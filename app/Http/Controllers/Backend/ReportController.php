<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //ReportsView
    public function ReportsView(){
        return view('admin.backend.Report0.report_view');

    }//end mothed

    //ReportByDate
    public function ReportByDate(Request $request){
        $date = new DateTime($request->date);
        $DateFormat = $date->format('d F Y');
        $orders = Order::where('order_date',  $DateFormat)->latest()->get();
        return view('admin.backend.Report0.report_show',compact('orders'));



    }//end mothed


    //ReportByMonth
     public function ReportByMonth(Request $request){
        $orders = Order::where('order_month',  $request->month)->where('order_year',  $request->year_name)->latest()->get();
        return view('admin.backend.Report0.report_show',compact('orders'));

     }//end mothed


    //ReportByYear
    public function ReportByYear(Request $request){
        $orders = Order::where('order_year',  $request->year)->latest()->get();
        return view('admin.backend.Report0.report_show',compact('orders'));

     }//end mothed
}
