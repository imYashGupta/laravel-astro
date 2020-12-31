<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function validation($request,$isCreate)
    {
        $reqThumb = $isCreate ? 'required|' : ""; 
        $request->validate([
            "name" => "required",
            "short_description" => "required",
            "description" => "required",
            'category' =>  "required",
            'price' => "required|regex:/^\d+(\.\d{1,3})?$/",
            'discount' => 'numeric|between:0,99|regex:/^\d+(\.\d{1,3})?$/',
            "units"  => "required|integer|min:1",
            "availability" => "required|in:0,1",
            "min" => "digits_between:1,999",
            "max" => "digits_between:1,999",
            "thumbnail" =>  $reqThumb.'mimes:jpeg,jpg,png,gif|max:10000',
            'images.*' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view("admin.product-management.products",["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
    {
        $categories=Category::all();
        return view("admin.product-management.create-product",["product" => false,"categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $prod,Request $request)
    {
        if($prod->id) {
            $this->validation($request,false);
            $product = $prod;
            $str="updated";
            $productImages=DB::table("product_images")->where("product_id",$product->id)->count();
            if($request->images!=null){
                if($productImages+count($request->images) > 5 ){
                    return redirect()->back()->withErrors(["images" => "max number of images reached!"]);
                }
            }
        }else{
            $this->validation($request,true);
            // if(count($request->images) > 5 ){
            //     return redirect()->back()->withErrors(["images" => "max number of images is 5!"]);
            // }
            $product = new Product();
            $str="created";
        }   
        $product->name = $request->name;
        $product->slug = $this->genrateUniqueSlug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->units = $request->units;
        $product->availability = $request->availability;
        $product->min_qty = $request->min;
        $product->max_qty = $request->max;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->meta_title = $request->metatitle;
        $product->meta_keyword = $request->metakeywords;
        $product->meta_description = $request->metadescription;
        if($request->hasFile("thumbnail")){
            $thumbnail=$request->file("thumbnail");
            $thumbnailImage=\Intervention\Image\Facades\Image::make($thumbnail->getRealPath());
            $thumbnailImage->resize(250,250);
            $thumbnailName=Str::random(40).'.'.$thumbnail->getClientOriginalExtension();
            Storage::disk('public')->put('products/thumbnails/'.$thumbnailName,(string) $thumbnailImage->encode()); //save thumbnail
            Storage::disk('public')->putFileAs('products',$request->file("thumbnail"),$thumbnailName); //save orignal
            $product->thumbnail=$thumbnailName;
        }
        $product->save();
        if($request->has("images")){
            $images =$request->file("images");
            foreach($images as $image){
                $imageName = Str::random(40).'.'.$image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('products',$image,$imageName);
                DB::table("product_images")->insert(["name" => $imageName,"product_id" => $product->id]);
                /* $productImage = new ProductImage();
                $productImage->name = $imageName;
                $productImage->product_id = $product->id;
                $productImage->save(); */
            }
        }
       return redirect()->back()->with("success","Product $str.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product;
        $categories=Category::all();
        return view("admin.product-management.create-product",["product" => $product,"categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with("success","Product deleted.");
    }

    public function genrateUniqueSlug($productName)
    {
         $slug = Str::slug($productName, '-');
         $slugExists=Product::where("slug",$slug)->exists();
         if ($slugExists) {
             return $slug."-".Str::random(3);    
         }
         else{
             return $slug;
         }
    }

    public function deleteImage(Request $request)
    {   
        $image = DB::table("product_images")->where("id",$request->id)->first();
        DB::table("product_images")->where("id",$request->id)->delete();
        Storage::disk('public')->delete('products/'.$image->name);
        return response()->json(["response" => "ok"],200);
    }
}
