<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Null_;

class AllUserController extends Controller
{
    public function MyOrders(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id','DESC')->get();

        //dd( $orders);
        return view('frontend.user.order.order_view',compact('orders'));

    }//End nethod


    public function OrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id' ,$order_id )->where('user_id' , Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id' ,$order_id )->orderBy('id' , 'DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItem'));
    }//End mothed

    public function InvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id' ,$order_id )->where('user_id' , Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id' ,$order_id )->orderBy('id' , 'DESC')->get();

    $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
        'tempDir' => public_path(),
        'chroot' => public_path(),
     ]);
    return $pdf->download('invoice.pdf');

       // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
    }//EndMothed

    //ReturnOrder
    public function ReturnOrder( Request $request,$order_id){


        Order::findOrFail($order_id)->update([
              'return_date' =>Carbon::now()->format('d F Y'),
              'return_reason' => $request->return_reason,
              'return_order' => 1,
        ]);


        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);



    }//end mothed

    //ReturnOrderList
    public function ReturnOrderList(){
        $orders = Order::where('user_id', Auth::id())->where('return_reason','!=',Null)->orderBy('id','DESC')->get();


        return view('frontend.user.order.return_order_view',compact('orders'));


    }//end mothed

    //CancelOrders
    public function CancelOrders(){
        $orders = Order::where('user_id', Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();


        return view('frontend.user.order.cancel_order_view',compact('orders'));

    }//end mothed


       ///////////// Order Traking ///////

       public function OrderTraking(Request $request){
                    $invoice =$request->code;

                    $track =Order::where('invoice_no',$invoice)->first();

                    if($track)
                    {
                        return view('frontend.tracking.track_order',compact('track'));

                    }else{
                        $notification = array(
                            'message' => 'Invoice Code Is Invalid  ',
                            'alert-type' => 'error'
                        );

                        return redirect()->back()->with($notification);

                    }

       } // end mehtod


}
