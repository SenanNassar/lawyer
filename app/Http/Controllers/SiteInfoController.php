<?php

namespace App\Http\Controllers;
use App\SiteInfo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiteInfo;
class SiteInfoController extends Controller
{
    //


    public function  index(){

        $info = SiteInfo::where(['id'=> 1])->first();         

        return view('admin.siteInfo', [ 'info'=>$info ]);
    
    }

    public function store(StoreSiteInfo $request){
       
            $request->validated();

           

       $site=  SiteInfo::updateOrCreate(

            ['id' => 1],
        [
            'about'=>$request->txtAbout,
            'email'=> $request->txtEmail,
            'phone'=> $request->txtPhone,           
            'twitter' => $request->txtTwitter,
            'linkedin' => $request->txtLinkedin,
            'facebook'=> $request->txtFace,

        ]);
    $site->save();


        return back()->with('success', "تم تحديث البيانات بنجاح");



    }
}
