<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    ///RetrunRequest
     public function RetrunRequest(){
        $orders =Order::where('return_order',1)->orderBy('id','DESC')->get();
        return view('admin.backend.return_order.return_request',compact('orders'));
     }//end


     ///RetrunRequestApprove
     public function RetrunRequestApprove($order_id){

        Order::where('id',$order_id)->update(['return_order' =>2]);

        $notifcation = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);

     }//end

     ///RetrunAllRequest
     public function RetrunAllRequest(){
        $orders =Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('admin.backend.return_order.all_return_request',compact('orders'));
     }//end
}
