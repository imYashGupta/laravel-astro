<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $categories;
    public $popularBlogs;

    public function __construct() {
        $this->categories = BlogCategory::where("status",1)->get();
        $this->popularBlogs=Blog::where("status",1)->orderBy("views","DESC")->limit(5)->get();
    }

    public function blogs(Request $request)
    {
        $blogs=Blog::where("status",1)->simplePaginate(4);
        if ($request->has("category")){
            $category=BlogCategory::where("name",$request->category)->first();
            $blogs=Blog::where("category_id",$category->id)->where("status",1)->simplePaginate(4);
        }
        return view("pages.blogs",["blogs" => $blogs,"categories" => $this->categories,"popularBlogs" => $this->popularBlogs]);
    }

    public function blog(Request $request,$slug)
    {
        $blog=Blog::where("slug",$slug)->where("status",1)->first();
        $blog->views = $blog->views + 1;
        $blog->update();
        return view("pages.blog-single",["blog" => $blog,"categories" => $this->categories,"popularBlogs" => $this->popularBlogs]);
    }
}
