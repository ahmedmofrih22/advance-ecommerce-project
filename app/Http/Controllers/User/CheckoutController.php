<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\Shipping;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){
        $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        //dd($ship);
        return json_encode($ship);

    }

    public function StateGetAjax($district_id){
        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        //dd($ship);
        return json_encode($ship);

    } // end method


    public function CheckoutStore( Request $request){
        $data =array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $data['order_id'] = $request->order_id;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $cartTotal = Cart::total();

       if($request-> payment_method == 'stripe'){
        return view('frontend.payment.stripe',compact('data','cartTotal'));
       }elseif($request-> payment_method == 'card'){
        return 'card';
       }else{
        return view('frontend.payment.cach',compact('data','cartTotal'));
       }

        // Shipping::insert([
        //     'shipping_name' => $request->shipping_name,
        //     'shipping_email' => $request->shipping_email,
        //     'shipping_phone' => $request->shipping_phone,
        //     'post_code' => $request->post_code,
        //     'notes' => $request->notes,

        //     'order_id' => $request->order_id,
        //     'division_id' => $request->division_id,
        //     'district_id' => $request->district_id,

        //     'state_id' => $request->state_id,


        // ]);

        // $notifcation = array(
        //     'message' => 'category Inserted Successfully',
        //     'alert-type' => 'success'
        // );

        // return  redirect()->back()->with($notifcation);
    }//end method
}
