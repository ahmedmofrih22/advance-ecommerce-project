<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrederController extends Controller
{
    ///PendingOrders
    public function PendingOrders(){
        $orders = Order::where('status','pending')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.pending_orders',compact('orders'));

    }//End method

    ///PendingOrderDetails
    public function PendingOrderDetails($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('admin.backend.orders.pending_orders_details',compact('order','orderItem'));
    }//End mothed

    ///ConfirmedOrder
    public function ConfirmedOrder(){
        $orders = Order::where('status','confirm')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.confirmed_orders',compact('orders'));

    }//End method

    ///ProcessindOrder
    public function ProcessindOrder(){
        $orders = Order::where('status','processing')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.processing_orders',compact('orders'));

    }//End method


    ///PickedOrder
    public function PickedOrder(){
        $orders = Order::where('status','picked')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.picked_orders',compact('orders'));

    }//End method

    ///shippedOrder
    public function shippedOrder(){
        $orders = Order::where('status','shipped')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.shipped_orders',compact('orders'));

    }//End method


    ///DeliveredOrder
    public function DeliveredOrder(){
        $orders = Order::where('status','delivered')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.delivered_orders',compact('orders'));

    }//End method

    ///CancelOrder
    public function CancelOrder(){
        $orders = Order::where('status','cancel')->OrderBy('id','DESC')->get();
        return view('admin.backend.orders.cancel_orders',compact('orders'));

    }//End method

    //PendingToConFirm
    public function PendingToConFirm($order_id){

        Order::findOrFail($order_id)->update(['status'=>'confirm']);
        $notifcation = array(
            'message' => 'Order ConFirm Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('pending-orders')->with($notifcation);
    }//End Method

    //ProcessingCnfirm
    public function ProcessingCnfirm($order_id){

        Order::findOrFail($order_id)->update(['status'=>'processing']);
        $notifcation = array(
            'message' => 'Order processing Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('confirmed-orders')->with($notifcation);
    }//End Method

    //PickedProcessing
    public function PickedProcessing($order_id){

        Order::findOrFail($order_id)->update(['status'=>'picked']);
        $notifcation = array(
            'message' => 'Order picked Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('picked-orders')->with($notifcation);
    }//End Method


     //ShippedPicked
     public function ShippedPicked($order_id){

        Order::findOrFail($order_id)->update(['status'=>'shipped']);
        $notifcation = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('shipped-orders')->with($notifcation);
    }//End Method

    //delivered
    public function ShippedDelivered($order_id){

        Order::findOrFail($order_id)->update(['status'=>'delivered']);
        $notifcation = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('delivered-orders')->with($notifcation);
    }//End Method

     //cancel
     public function DeliveredCancel($order_id){

        $product = OrderItem::where('order_id',$order_id)->get();
        foreach ($product as $item) {
            Product::where('id',$item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        } 

        Order::findOrFail($order_id)->update(['status'=>'cancel']);
        $notifcation = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('cancel-orders')->with($notifcation);
    }//End Method



    public function AdminInvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id' ,$order_id )->first();
        $orderItem = OrderItem::with('product')->where('order_id' ,$order_id )->orderBy('id' , 'DESC')->get();

    $pdf = PDF::loadView('admin.backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
        'tempDir' => public_path(),
        'chroot' => public_path(),
     ]);
    return $pdf->download('invoice.pdf');
    }///EndMethod
}



