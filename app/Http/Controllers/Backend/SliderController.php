<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    //start view
       public function ViewSlider()
       {
           $Slider = Slider::latest()->get();

           return view('admin.backend.slider.slider_view',compact('Slider'));
       } //end method view


       //start sliderdEdit
       public function sliderdEdit($id)
       {
           $Slider = Slider::findOrFail($id);
           return view('admin.backend.slider.slider_edit',compact('Slider'));

       } //end method sliderdEdit


       //start SliderStore
       public function SliderStore(Request $request)
       {
            $request->validate([
                'slider_img' => 'required',

            ], [
                'slider_img.required' => 'Plz Select on Image',


            ]);

            $image  = $request->file('slider_img');
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/slider/'.$img_name);
            $save_url = 'upload/slider/'. $img_name;

            Slider::insert([

                'description' => $request->description,
                'title' => $request->title,
                'slider_img' => $save_url,
            ]);

            $notifcation = array(
                'message' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
            );

            return  redirect()->back()->with($notifcation);

         } //end method SliderStore


       //start SliderUpdate
       public function SliderUpdate(Request $request)
       {
           $Slider_id = $request->id;
           $old_img = $request->old_image;
           if($request->file('slider_img'))
           {
               unlink($old_img);
               $image =$request->file('slider_img');
               $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
               Image::make($image)->resize(848,370)->save('upload/slider/'.$img_name);
               $save_url = 'upload/slider/'.$img_name;

               $slider = Slider::findOrFail($Slider_id);

               $slider->description = $request->description;
               $slider->title = $request->title;
               $slider->slider_img = $save_url;

               $slider->save();

               $notifcation = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            );

            return  redirect()->route('Manage-slider')->with($notifcation);




           }else{

            $slider = Slider::findOrFail($Slider_id);

            $slider->description = $request->description;
            $slider->title = $request->title;


            $slider->save();

            $notifcation = array(
             'message' => 'Slider Updated Without Image Successfully',
             'alert-type' => 'info'
         );

         return  redirect()->route('Manage-slider')->with($notifcation);

           } // end if

       } //end method SliderUpdate


       //start view
       public function SliderDelete($id)
       {
         $slider = Slider::findOrFail($id);
         $image =$slider->slider_img;
         unlink($image);

         Slider::findOrFail($id)->delete();

         $notifcation = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error'
        );

        return  redirect()->route('Manage-slider')->with($notifcation);


       } //end method SliderDelete


       public function SliderActive($id)
       {
         $SliderInActive=  Slider::findOrFail($id);
         $SliderInActive->status = 1;
         $SliderInActive->save();

           $notifcation = array(
               'message' => 'Slider Active',
               'alert-type' => 'Success'
           );

           return  redirect()->back()->with($notifcation);

       }////SliderActive


    public function SliderInactive($id)
    {
        $SliderInActive=  Slider::findOrFail($id);
        $SliderInActive->status = 0;
        $SliderInActive->save();

        $notifcation = array(
            'message' => 'Slider Inactive',
            'alert-type' => 'error'
        );

        return  redirect()->back()->with($notifcation);

    }////SliderInactive



}
