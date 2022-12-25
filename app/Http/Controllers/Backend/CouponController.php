<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Coupon;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function CouponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('admin.backend.coupon.coupon_viwe',compact('coupons'));
    }//end mothed

    public function CouponStore(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',



        ]);



        Coupon::insert([

            'coupon_name' => strtoupper($request->coupon_name) ,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),


        ]);

        $notifcation = array(
            'message' => 'coupon Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    }//end method


    public function CouponEdit(Request $request ,$id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.backend.coupon.edit_viwe',compact('coupons'));
    }


   public function  CouponUpdata(Request $request , $id)
   {


    Coupon::findOrFail($id)->update([

        'coupon_name' => strtoupper($request->coupon_name) ,
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        'created_at' => Carbon::now(),


    ]);

    $notifcation = array(
        'message' => 'coupon Update Successfully',
        'alert-type' => 'success'
    );

    return  redirect()->route('Manage-Coupons')->with($notifcation);
   }


        public function CouponDelete($id)
        {


            Coupon::findOrFail($id)->delete();

            $notifcation = array(
                'message' => 'Coupon Deleted Successfully',
                'alert-type' => 'error'
            );

            return  redirect()->route('Manage-Coupons')->with($notifcation);


        } //end method CouponsDelete
}
