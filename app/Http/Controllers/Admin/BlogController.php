<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function validation($request,$isCreate,$id=false)
    {
        $cond = $isCreate ? "required" : "";
        $slugCondition = $isCreate ? "unique:blogs" : "unique:blogs,slug,".$id;
        $request->validate([
            "title" => ["required","min:10"],
            "description" => ["required"],
            "category" => ["required"],
            "slug" => ["required",$slugCondition],
            "content" => ["required"],
            "thumbnail" => [$cond,"mimes:jpeg,jpg,png,gif","max:1024"],
            "status" => ["required","in:0,1"]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.blog-management.blogs",["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory=BlogCategory::all();

        return view("admin.blog-management.create-blog",["blog" => false,"blogCategory" => $blogCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request,true);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->short_description = $request->description;
        $blog->category_id = $request->category;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $thumbnail=$request->file("thumbnail");
        $thumbnailImage=\Intervention\Image\Facades\Image::make($thumbnail->getRealPath());
        $thumbnailImage->resize(550,350);
        $thumbnailName=Str::random(40).'.'.$thumbnail->getClientOriginalExtension();
        Storage::disk('s3')->put('blogs/thumbnails/'.$thumbnailName,(string) $thumbnailImage->encode()); //save thumbnail
        $blog->thumbnail=$thumbnailName;
        $blog->meta_title = $request->metatitle;
        $blog->meta_keyword = $request->metakeywords;
        $blog->meta_description = $request->metadescription;
        $blog->save();
        return redirect()->route("blog.index")->with("success","Blog Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blogCategory=BlogCategory::all();
        return view("admin.blog-management.create-blog",["blog" => $blog,"blogCategory" => $blogCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validation($request,false,$blog->id);
        $blog->title = $request->title;
        $blog->short_description = $request->description;
        $blog->category_id = $request->category;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->status = $request->status;
        if($request->hasFile("thumbnail")){
            $thumbnail=$request->file("thumbnail");
            $thumbnailImage=\Intervention\Image\Facades\Image::make($thumbnail->getRealPath());
            $thumbnailImage->resize(550,350);
            $thumbnailName=Str::random(40).'.'.$thumbnail->getClientOriginalExtension();
            Storage::disk('s3')->put('blogs/thumbnails/'.$thumbnailName,(string) $thumbnailImage->encode()); //save thumbnail
            $blog->thumbnail=$thumbnailName;
        }
        $blog->meta_title = $request->metatitle;
        $blog->meta_keyword = $request->metakeywords;
        $blog->meta_description = $request->metadescription;
        $blog->update();
        return redirect()->route("blog.index")->with("success","Blog Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with("success","Blog Deleted.");
    }
}
