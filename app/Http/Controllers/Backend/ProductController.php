<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;


use Image;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function AddProduct()
    {
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.backend.product.product_add', compact('category', 'brand'));
    }


    // public function Get_SubSubCategory($subcategory_id)
    // {

    //     $subcat2 = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();

    //     return json_encode($subcat2);

    //     //return SubSubCategory::where("subcategory_id", $subcategory_id)->pluck("subsubcategory_name_en", "id");
    // }

    public function StoreProduct(Request $request)
    {
        $image = $request->file('product_thambnail');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $img_name);
        $save_url = 'upload/products/thambnail/' .  $img_name;

        $product_id =  Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace('', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace('', '-', $request->product_name_ar),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        //////////  multi img

        $image = $request->file('multi_img');
        foreach ($image as  $imag) {
            $make_name = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(917, 1000)->save('upload/products/multi_Img/' . $make_name);
            $uploadpath = 'upload/products/multi_img/' .  $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadpath,
                'created_at' => Carbon::now(),

            ]);
        } //end foreach


        $notifcation = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('Manage-product')->with($notifcation);
    } ///////end mothed


    public function ManageProduct()
    {
        $product = Product::latest()->get();
        return view('admin.backend.product.product_view', compact('product'));
    }


    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('admin.backend.product.product_edit', compact('multiImgs', 'category', 'brand', 'subcategory', 'subsubcategory', 'products'));
    }


    public function ProductUpdate(Request $request)
    {

        $prodect_id = $request->id;

        $prodect =   Product::findOrFail($prodect_id);
        $prodect->brand_id = $request->brand_id;
        $prodect->category_id = $request->category_id;
        $prodect->subcategory_id = $request->subcategory_id;
        $prodect->subsubcategory_id = $request->subsubcategory_id;
        $prodect->product_name_en = $request->product_name_en;
        $prodect->product_name_ar = $request->product_name_ar;
        $prodect->product_slug_en = strtolower(str_replace('', '-', $request->product_name_en));
        $prodect->product_slug_ar = str_replace('', '-', $request->product_name_ar);

        $prodect->product_code = $request->product_code;
        $prodect->product_qty = $request->product_qty;
        $prodect->product_tags_en = $request->product_tags_en;
        $prodect->product_tags_ar = $request->product_tags_ar;
        $prodect->product_size_en = $request->product_size_en;
        $prodect->product_size_ar = $request->product_size_ar;
        $prodect->product_color_en = $request->product_color_en;
        $prodect->product_color_ar = $request->product_color_ar;
        $prodect->selling_price = $request->selling_price;
        $prodect->discount_price = $request->discount_price;
        $prodect->short_descp_en = $request->short_descp_en;
        $prodect->short_descp_ar = $request->short_descp_ar;
        $prodect->long_descp_en = $request->long_descp_en;
        $prodect->long_descp_ar = $request->long_descp_ar;
        $prodect->hot_deals  = $request->hot_deals;
        $prodect->featured = $request->featured;
        $prodect->special_offer = $request->special_offer;
        $prodect->special_deals = $request->special_deals;
        $prodect->status = 1;
        $prodect->created_at = Carbon::now();
        $prodect->save();

        $notifcation = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->route('Manage-product')->with($notifcation);
    }

    /// Start Mothed MutiImgUpdate ///
    public function MutiImgUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi_img/' . $make_name);
            $uploadepath = 'upload/products/multi_img/' .  $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' =>  $uploadepath,
                'updated_at' => Carbon::now(),
            ]);
        } //end foreach
        $notifcation = array(
            'message' => 'Product   Image Updated Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->back()->with($notifcation);
    } /// end Mothed MutiImgUpdate ///


    public function ThambnailImgUpdate(Request $request)
    {
        $proid = $request->id;
        $oldimg = $request->old_img;
        unlink($oldimg);
        $image = $request->file('product_thambnail');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $img_name);
        $save_url = 'upload/products/thambnail/' .  $img_name;

        $prodect =   Product::findOrFail($proid);

        //    Product::findOrFail($proid)->update([ ]);
        $prodect->product_thambnail =  $save_url;
        $prodect->updated_at = Carbon::now();
        $prodect->save();
        $notifcation = array(
            'message' => 'Product thambnail  Image Updated Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->back()->with($notifcation);
    } ///end mothed ThambnailImgUpdate

    public function multiDelete($id)
    {
        $oldimg= MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notifcation = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'erorr'
        );

        return  redirect()->back()->with($notifcation);

    }///end mothed multiDelete


    public function ProductInactive($id)
    {
        $productInActive=  Product::findOrFail($id);
        $productInActive->status = 0;
        $productInActive->save();

        $notifcation = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);

    }////ProductInactive

    public function ProductActive($id)
    {
      $productInActive=  Product::findOrFail($id);
      $productInActive->status = 1;
      $productInActive->save();

        $notifcation = array(
            'message' => 'Product Active',
            'alert-type' => 'info'
        );

        return  redirect()->back()->with($notifcation);

    }////ProductActive


    public function ProductDelete($id)
    {
        $product=  Product::findOrFail($id);
        unlink( $product->product_thambnail);

        Product::findOrFail($id)->delete();
        $imges = MultiImg::where('product_id',$id)->get();
        foreach ( $imges as   $imge)
        {
            unlink( $imge->photo_name);
            MultiImg::where('product_id',$id)->delete();

        }//end foreach
        $notifcation = array(
            'message' => 'Product Active',
            'alert-type' => 'erorr'
        );

        return  redirect()->back()->with($notifcation);

    }////ProductDelete


     ///ProductStock
    public function ProductStock()
    {
        $product = Product::latest()->get();
        return view('admin.backend.product.product_stock', compact('product'));
    }


}
