<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   //BlogCategory
   public function BlogCategory(){
    $blogcategory = BlogPostCategory::latest()->get();
    return view('admin.backend.blog.category.category_view',compact('blogcategory'));

   }//end mothed

   //BlogCategoryStore
   public function BlogCategoryStore(Request $request)
    {


        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',


        ], [
            'blog_category_name_en.required' => 'Input blog category English Name',
            'blog_category_name_ar.required' => 'Input blog category Arabic Name',


        ]);



        BlogPostCategory::insert([

            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_ar' => strtolower(str_replace('', '-', $request->blog_category_name_ar)),
            'blog_category_slug_en' => str_replace('', '-', $request->blog_category_name_en),
            'created_at' => Carbon::now(),



        ]);

        $notifcation = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return  redirect()->back()->with($notifcation);
    } /// end mothed

    ///BlogCategoryEdit
    public function BlogCategoryEdit($blog_id){
        $blogcategory = BlogPostCategory::findOrFail($blog_id);
        return view('admin.backend.blog.category.category_edit',compact('blogcategory'));

    }//end mothed

    //BlogCategoryStore
   public function BlogCategoryUpdate(Request $request)
   {

    $id= $request->id;
       $request->validate([
           'blog_category_name_en' => 'required',
           'blog_category_name_ar' => 'required',


       ], [
           'blog_category_name_en.required' => 'Input blog category English Name',
           'blog_category_name_ar.required' => 'Input blog category Arabic Name',


       ]);



       BlogPostCategory::findOrFail($id)->update([

           'blog_category_name_en' => $request->blog_category_name_en,
           'blog_category_name_ar' => $request->blog_category_name_ar,
           'blog_category_slug_ar' => strtolower(str_replace('', '-', $request->blog_category_name_ar)),
           'blog_category_slug_en' => str_replace('', '-', $request->blog_category_name_en),
           'created_at' => Carbon::now(),



       ]);

       $notifcation = array(
           'message' => 'Blog Category Update Successfully',
           'alert-type' => 'info'
       );

       return  redirect()->route('category.blog')->with($notifcation);
   } /// end mothed

                //BlogCategoryDelete
            public function BlogCategoryDelete($blog_id){
                        BlogPostCategory::findOrFail($blog_id)->delete();

                        $notifcation = array(
                        'message' => 'Blog Category delete Successfully',
                        'alert-type' => 'danger'
                        );

                    return  redirect()->back()->with($notifcation);
            }//end mothed



            ///ListlogPost
            public function ListBlogPost(){
                $blogpost = BlogPost::with('catgory')->latest()->get();

                return view('admin.backend.blog.post0.post_list',compact('blogpost'));
            }

            ///ViewBlogPost
            public function AddBlogPost(){
                $blogpost = BlogPost::latest()->get();
                $blogcategory = BlogPostCategory::latest()->get();
                return view('admin.backend.blog.post0.post_view',compact('blogpost','blogcategory'));
            }

            ///PostStore
            public function PostStore(Request $request){
                $request->validate([
                    'post_title_en' => 'required',
                    'post_title_ar' => 'required',
                    'post_image' => 'required',
                ],[
                    'post_title_en.required' => 'Input Post Title English Name',
                    'post_title_ar.required' => 'Input Post Title Arabic Name',
                ]);


                $image = $request->file('post_image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
                $svae_url = 'upload/post/'.$name_gen;



                BlogPost::insert([
                    'category_id' => $request->category_id,
                    'post_title_en' => $request->post_title_en,
                    'post_title_ar' => $request->post_title_ar,
                    'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
                    'post_slug_ar' => str_replace(' ', '-',$request->post_title_ar),
                    'post_image' => $svae_url,
                    'post_details_en' => $request->post_details_en,
                    'post_details_ar' => $request->post_details_ar,
                    'created_at' => Carbon::now(),

                    ]);

                    $notification = array(
                        'message' => 'Blog Post Inserted Successfully',
                        'alert-type' => 'success'
                    );

                    return redirect()->route('list.post')->with($notification);


            }
}
