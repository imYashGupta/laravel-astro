<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageManagement extends Controller
{
    public function faqCreate()
    {
        return view("admin.page-management.faq.create",["faq" => false]);
    }

    public function about()
    {
        $about=DB::table("page_management")->where("name","about")->first();     
        $about= json_decode($about->content,true);
        return view("admin.page-management.about",["content" => $about["content"],"image" => $about["image"]]);
    }

    public function updateAbout(Request $request)
    {

        $request->validate([
            "content" => "required",
        ]);
        if($request->hasFile("image")){
            $request->image->move(public_path('/src/images/content/about'),"about.jpg");
        }
        DB::table("page_management")->where("name","ABOUT")->update([
            "content" => json_encode(["content" => $request->content,"image" => asset('/src/images/content/about').'/about.jpg']),
            "updated_at" => \Carbon\Carbon::now()
        ]);


        return redirect()->back()->with("success","Page Saved.");
    }

    public function privacyPolicy()
    {
        $getPrivacyPolicy=DB::table("page_management")->where("name","PRIVACY")->first();     
        $privacyPolicy= json_decode($getPrivacyPolicy->content,true);
        return view("admin.page-management.privacy-policy",["content" => $privacyPolicy["content"]]);
    }

    public function updatePrivacyPolicy (Request $request)
    {

        $request->validate([
            "content" => "required",
        ]); 
        DB::table("page_management")->where("name","PRIVACY")->update([
            "content" => json_encode(["content" => $request->content]),
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return redirect()->back()->with("success","Page Saved.");
    }

    public function termsAndCondition()
    {
        $getTermsAndConditions=DB::table("page_management")->where("name","TERMS")->first();     
        $termsAndConditions= json_decode($getTermsAndConditions->content,true);
        return view("admin.page-management.terms-and-conditions",["content" => $termsAndConditions["content"]]);
    }

    public function updateTermsAndCondition (Request $request)
    {
        $request->validate([
            "content" => "required",
        ]); 
        DB::table("page_management")->where("name","TERMS")->update([
            "content" => json_encode(["content" => $request->content]),
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return redirect()->back()->with("success","Page Saved.");
    }

    public function services()
    {   
        $services=DB::table("page_management")->whereIn("name",["horoscopes","numerology","kundli-dosh","birth-journal","vastu-shastra","gemstones"])->get();     
        return view("admin.page-management.services",["services" => $services]);
    }

    public function service(Request $request,$service)
    {
        $getService=DB::table("page_management")->where("name",$service)->first();     
        $_service = json_decode($getService->content,true);
        return view("admin.page-management.service",[
            "content" => $_service["content"],
            "image" => $_service["image"],
            "description" => $_service["description"],
            "main" => $_service["main"]
        ]);
    }

    public function updateService(Request $request,$service)
    {

        $request->validate([
            "content" => "required",
            "description" => "required"
        ]);

        if($request->hasFile("main_image")){
            $request->main_image->move(public_path('/src/images/content/services/main/'),$service.".png");
        }

        if($request->hasFile("image")){
            $request->image->move(public_path('/src/images/content/services'),$service.".".$request->file("image")->getClientOriginalExtension());
            DB::table("page_management")->where("name",$service)->update([
                "content" => json_encode([
                    "content" => $request->content,
                    "image" => asset('/src/images/content/services')."/".$service.".".$request->file("image")->getClientOriginalExtension(),
                    "description" => $request->description,
                    "main" => asset("/src/images/content/services/main/".$service.".png")
                ]),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }else{
            $getService=DB::table("page_management")->where("name",$service)->first();     
            $_service = json_decode($getService->content,true);
            DB::table("page_management")->where("name",$service)->update([
                "content" => json_encode([
                    "content" => $request->content,
                    "image" => $_service["image"],
                    "description" => $request->description,
                    "main" => asset("/src/images/content/services/main/".$service.".png")
                ]),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }


        return redirect()->back()->with("success","Page Saved.");
    }
}
