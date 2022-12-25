<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //ReviewStore
    public function ReviewStore(Request $request){
        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);
        Review::insert([
            'summary' => $request->summary,
            'comment' => $request->comment,
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review Will Approve  By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    ///PendingReview
    public function PendingReview(){
        $review =Review::where('status',0)->orderBy('id','DESC')->get();
        return view('admin.backend.review0.pending_review',compact('review'));
     }//end

     ///ReviewApprove
     public function ReviewApprove($id){

        Review::where('id',$id)->update(['status' =>1]);

        $notifcation = array(
            'message' => 'Review Approve Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);

     }//end

      ///PublishReview
    public function PublishReview(){
        $review =Review::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.backend.review0.publish_review',compact('review'));
     }//end


     ///ReviewDelete
     public function ReviewDelete($id){
        Review::findOrFail($id)->delete();

        $notifcation = array(
            'message' => 'Review Delete Successfully',
            'alert-type' => 'danger'
        );

        return  redirect()->back()->with($notifcation);

     }
}
