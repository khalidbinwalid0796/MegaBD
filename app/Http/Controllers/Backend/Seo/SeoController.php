<?php

namespace App\Http\Controllers\Backend\Seo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SeoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Seo()
    {
        $seo=DB::table('seos')->first();
        return view('backend.pages.seo.seo',compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id=$request->id;
         $data=array();
         $data['meta_title']=$request->meta_title;
         $data['meta_author']=$request->meta_author;
         $data['meta_tag']=$request->meta_tag;
         $data['meta_description']=$request->meta_description;
         $data['google_analytics']=$request->google_analytics;
         $data['bing_analytics']=$request->bing_analytics;
         DB::table('seos')->where('id',$id)->update($data);
         $notification=array(
                 'messege'=>'SEO Updated',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }
}
