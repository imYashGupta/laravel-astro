<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view("admin.product-management.categories",["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.product-management.create-category",["category" => false]);
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
            "name" => ["required","min:3","unique:categories"],
            "status" => ["required","in:0,1"]
        ],[
            "name.unique" => "Category name already exists."
        ]);
        
        $category = new Category();
        $category->name  = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route("category.index")->with("success","Category Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.product-management.create-category",["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => ["required","min:3","unique:categories,name,".$category->id],
            "status" => ["required","in:0,1"]
        ],[
            "name.unique" => "Category name already exists."
        ]);

        $category->name  = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return redirect()->route("category.index")->with("success","Category Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->id==1){
            return redirect()->back()->with("error","This category can not be deleted.");
        }
        Product::where("category_id",$category->id)->update(["category_id" => 1]);
        $category->delete();
        return redirect()->back()->with("success","Category Deleted.");
    }
}
