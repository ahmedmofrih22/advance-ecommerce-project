<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    //HomeBlog
    public function HomeBlog(){
        $blogpost = BlogPost::latest()->get();
                $blogcategory = BlogPostCategory::latest()->get();
                return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));

    }//end

    //DetailsBlog
    public function DetailsBlog($id){
        $blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::findOrFail($id);
    	return view('frontend.blog.blog_details',compact('blogpost','blogcategory'));

    }

    //HomeBlogCatPost
    public function HomeBlogCatPost($category_id){
        $blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
    	return view('frontend.blog.blog_cat_list',compact('blogpost','blogcategory'));

    }//end
}
