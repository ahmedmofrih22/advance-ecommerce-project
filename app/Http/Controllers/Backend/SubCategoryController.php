<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {

        $subcateogry = SubCategory::latest()->get();
        // $category = Category::latest()->get();
        $category = Category::orderBy('category_name_en', 'ASC')->get();

        return view('admin.backend.category.subcategory_viwe', compact('subcateogry', 'category'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id' => 'required',

        ], [
            'subcategory_name_en.required' => 'Input subcategory English Name',
            'subcategory_name_ar.required' => 'Input subcategory Arabic Name',
            'category_id.required' => 'Plesa  Select Any  option',

        ]);



        SubCategory::insert([

            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_ar' => strtolower(str_replace('', '-', $request->subcategory_name_ar)),
            'subcategory_slug_en' => str_replace('', '-', $request->subcategory_name_en),
            'category_id' => $request->category_id,


        ]);

        $notifcation = array(
            'message' => 'subcategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    }

    public function SubCategoryEdit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        return view('admin.backend.category.subcategory_edit', compact('subcategory', 'category'));
    }


    public function SubCategoryUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id' => 'required',

        ], [
            'subcategory_name_en.required' => 'Input subcategory English Name',
            'subcategory_name_ar.required' => 'Input subcategory Arabic Name',
            'category_id.required' => 'Plesa  Select Any  option',

        ]);



        SubCategory::findOrFail($id)->update([

            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_ar' => strtolower(str_replace('', '-', $request->subcategory_name_ar)),
            'subcategory_slug_en' => str_replace('', '-', $request->subcategory_name_en),
            'category_id' => $request->category_id,


        ]);

        $notifcation = array(
            'message' => 'subcategory Update Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('ail.subcategory')->with($notifcation);
    } /// end mothed


    public function  SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notifcation = array(
            'message' => 'SubCategory delete Successfully',
            'alert-type' => 'danger'
        );

        return  redirect()->back()->with($notifcation);
    }


    //// method sub->subcatyegory

    public function Sub_SubCategoryView()
    {

        $sub_subcateogry = SubSubCategory::latest()->get();
        // $category = Category::latest()->get();
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();

        return view('admin.backend.category.sub_subcategory_viwe', compact('sub_subcateogry', 'category', 'subcategory'));
    }

    public function GetSubCategory($category_id)
    {

        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();

        return json_encode($subcat);

        //return SubCategory::where("category_id", $category_id)->pluck("subcategory_name_en", "id");
    }


    public function SubSubCategory($subcategory_id)
    {


        $subcat2 = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();

        return json_encode($subcat2);

        //return SubSubCategory::where("subcategory_id", $subcategory_id)->pluck("subsubcategory_name_en", "id");
    }



    public function Sub_SubCategoryStore(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',

        ], [
            'subsubcategory_name_en.required' => 'Input Sub_subcategory English Name',
            'subsubcategory_name_ar.required' => 'Input Sub_subcategory Arabic Name',
            'category_id.required' => 'Plesa  Select Any  option',
            'subcategory_id.required' => 'Plesa  Select Any  option',

        ]);



        SubSubCategory::insert([

            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_ar' => strtolower(str_replace('', '-', $request->subsubcategory_name_ar)),
            'subsubcategory_slug_en' => str_replace('', '-', $request->subsubcategory_name_en),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,


        ]);

        $notifcation = array(
            'message' => 'Sub_subcategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    } ///end mothed




    public function Sub_SubCategoryEdit($id)
    {
        $sub_subcategory = SubSubCategory::findOrFail($id);
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        return view('admin.backend.category.sub_subcategory_edit', compact('sub_subcategory', 'category', 'subcategory'));
    }

    public function Sub_SubCategoryUpdate(Request $request)
    {






        SubSubCategory::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_ar' => strtolower(str_replace('', '-', $request->subsubcategory_name_ar)),
            'subsubcategory_slug_en' => str_replace('', '-', $request->subsubcategory_name_en),



        ]);

        $notifcation = array(
            'message' => 'Sub_subcategory Inserted Successfully',
            'alert-type' => 'info'
        );

        return  redirect()->route('ail.sub_subcategory')->with($notifcation);
    } ///end mothed


    public function Sub_SubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notifcation = array(
            'message' => 'Sub_subcategory delete',
            'alert-type' => 'error'
        );

        return  redirect()->back()->with($notifcation);
    }

    ///////////// end method sub->subcatyegory
}
