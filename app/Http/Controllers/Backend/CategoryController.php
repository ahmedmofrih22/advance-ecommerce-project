<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $cateogry = Category::latest()->get();
        return view('admin.backend.category.category_viwe', compact('cateogry'));
    }

    public function CategoryStore(Request $request)
    {

        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required',

        ], [
            'category_name_en.required' => 'Input category English Name',
            'category_name_ar.required' => 'Input category Arabic Name',
            'category_icon.required' => 'Input Upload Icon category',

        ]);



        Category::insert([

            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_ar' => strtolower(str_replace('', '-', $request->category_name_ar)),
            'category_slug_en' => str_replace('', '-', $request->category_name_en),
            'category_icon' => $request->category_icon,


        ]);

        $notifcation = array(
            'message' => 'category Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    } /// end mothed


    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.backend.category.category_edit', compact('category'));
    }


    public function CategoryUpdate(Request $request){
        $id= $request->id;
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required',

        ], [
            'category_name_en.required' => 'Input category English Name',
            'category_name_ar.required' => 'Input category Arabic Name',
            'category_icon.required' => 'Input Upload Icon category',

        ]);



        Category::findOrFail($id)->update([

            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_ar' => strtolower(str_replace('', '-', $request->category_name_ar)),
            'category_slug_en' => str_replace('', '-', $request->category_name_en),
            'category_icon' => $request->category_icon,


        ]);

        $notifcation = array(
            'message' => 'category Update Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->route('category.ail')->with($notifcation);

    } // end mothed

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notifcation = array(
         'message' => 'Category delete Successfully',
         'alert-type' => 'danger'
     );

     return  redirect()->back()->with($notifcation);
    }
}
