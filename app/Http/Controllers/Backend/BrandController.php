<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandAil()
    {
        $brand = Brand::latest()->get();
        return view('admin.backend.brand.brand_viwe', compact('brand'));
    }

    public function BrandStore(Request $request)
    {
// return $request;
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required',

        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_ar.required' => 'Input Brand Arabic Name',
            'brand_image.required' => 'Input Upload Image Brand',

        ]);

        $image = $request->file('brand_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $img_name);
        $save_url = 'upload/brand/' .  $img_name;

        Brand::insert([

            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_ar' => strtolower(str_replace('', '-', $request->brand_name_ar)),
            'brand_slug_en' => str_replace('', '-', $request->brand_name_en),
            'brand_image' => $save_url,


        ]);

        $notifcation = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    } /// end mothed


    public function BrandEdit($id)
    {
        $brand = Brand::findOrfail($id);
        return view('admin.backend.brand.brand_edit', compact('brand'));
    }
    public function BrandUpdate(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            //unlink($old_image);
            $image = $request->file('brand_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $img_name);
            $save_url = 'upload/brand/' .  $img_name;

            Brand::findOrfail($id)->update([

                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_ar' => strtolower(str_replace('', '-', $request->brand_name_ar)),
                'brand_slug_en' => str_replace('', '-', $request->brand_name_en),
                'brand_image' => $save_url,


            ]);

            $notifcation = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'info'
            );

            return  redirect()->route('brand.ail')->with($notifcation);
        } else {
            Brand::findOrfail($id)->update([

                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_ar' => strtolower(str_replace('', '-', $request->brand_name_ar)),
                'brand_slug_en' => str_replace('', '-', $request->brand_name_en),



            ]);

            $notifcation = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'info'
            );

            return  redirect()->route('brand.ail')->with($notifcation);
        } //end else

    } ///end mothed




    public function BrandDelete($id)
    {
       $brand = Brand::findOrFail($id);
       $img=  $brand->brand_image;
       unlink( $img);

       Brand::findOrFail($id)->delete();

       $notifcation = array(
        'message' => 'Brand delete Successfully',
        'alert-type' => 'danger'
    );

    return  redirect()->back()->with($notifcation);

    }
}
