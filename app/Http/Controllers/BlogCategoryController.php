<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=BlogCategory::all();
        return view("admin.blog-management.categories",["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.blog-management.create-category",["category" => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required","min:3","unique:blog_categories"],
            "status" => ["required","in:0,1"]
        ],[
            "name.unique" => "Category name already exists."
        ]);

        $category = new BlogCategory();
        $category->name  = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route("blog-category.index")->with("success","Category Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view("admin.blog-management.create-category",["category" => $blogCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            "name" => ["required","min:3","unique:blog_categories,name,".$blogCategory->id],
            "status" => ["required","in:0,1"]
        ],[
            "name.unique" => "Category name already exists."
        ]);

        $blogCategory->name  = $request->name;
        $blogCategory->description = $request->description;
        $blogCategory->status = $request->status;
        $blogCategory->update();
        return redirect()->route("blog-category.index")->with("success","Category Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if($blogCategory->id==1){
            return redirect()->back()->with("error","This category can not be deleted.");
        }
        Blog::where("category_id",$blogCategory->id)->update(["category_id" => 1]);
        $blogCategory->delete();
        return redirect()->back()->with("success","Category Deleted.");
    }
}
