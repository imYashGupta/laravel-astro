<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{   
    public $name;
    public $description;
    public $title;
    public $keywords;
    public $email;
    public $phone;
    public $address;
    public $map_data;
    public $logo;
    public $favicon;
    public $footer_text;
    

    public function __construct( ) {
        $this->name = Setting::where("name","name")->first();
        $this->description = Setting::where("name","description")->first();
        $this->title = Setting::where("name","title")->first();
        $this->keywords = Setting::where("name","keywords")->first();
        $this->email = Setting::where("name","email")->first();
        $this->phone = Setting::where("name","phone")->first();
        $this->address = Setting::where("name","address")->first();
        $this->map_data = Setting::where("name","map_data")->first();
        $this->logo = Setting::where("name","logo")->first();
        $this->favicon = Setting::where("name","favicon")->first();
        $this->footer_text = Setting::where("name","footer_text")->first();

    }

    public function index()
    {
        return view("admin.site-setting",[
            "name" => $this->name,
            "description"   => $this->description,
            "title"   => $this->title,
            "keywords"   => $this->keywords,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "map_data" => $this->map_data,
            "logo" => $this->logo,
            "favicon" => $this->favicon,
            "footer_text" => $this->footer_text,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => ["required"],
            "description" => ["required"],
            "title" => ["required"],
            "keywords" => ["required"],
            "email" => ["required","email"],
            "phone" => ["required"],
            "address" => ["required"],
            "map_data" => ["required"],
            "logo" => ["image","mimes:png"],
            "favicon" => ["mimes:ico","dimensions:max_width=128,max_height=128"],
            "footer_text" => ["required"]
        ]);
        $this->name->update(["value" => $request->name]);
        $this->description->update(["value" => $request->description]);
        $this->title->update(["value" => $request->title]);
        $this->keywords->update(["value" => $request->keywords]);
        $this->email->update(["value" => $request->email]);
        $this->phone->update(["value" => $request->phone]);
        $this->name->update(["value" => $request->name]);
        $this->address->update(["value" => $request->address]);
        $this->map_data->update(["value" => $request->map_data]);
        $this->footer_text->update(["value" => $request->footer_text]);
        if($request->hasFile("logo")){
            $logo = $request->file("logo");
            $logoImage=\Intervention\Image\Facades\Image::make($logo->getRealPath());
            $logoImage->resize(638,168);
            $imageName = 'pathway_logo.'.$request->logo->getClientOriginalExtension();
            $logoImage->save(public_path('/src/images/header/'.$imageName));
            $this->logo->update(["value" => asset('/src/images/header').'/'.$imageName]);
        }
        if($request->hasFile("favicon")){
            $request->favicon->move(public_path('/src/images/header/'),"favicon.png");
            $this->favicon->update(["value" => asset('/src/images/header').'/favicon.png']);
        }
        return redirect()->back();
    }
}
