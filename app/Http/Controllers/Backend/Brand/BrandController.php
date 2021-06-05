<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Admin\Brand;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand()
    {
        $brand=Brand::all();
        return view('backend.pages.brand.brand',compact('brand'));
    }

    public function storebrand(Request $request)
    {
        $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|max:55',
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('brand_logo');
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/brands/'.$image_one);    //   public/brands/123123.jpg
                $data['brand_logo']='public/brands/'.$image_one;   //   public/brands/123123.jpg
                 DB::table('brands') ->insert($data);
                $notification=array(
                     'messege'=>'Successfully Brand Inserted ',
                     'alert-type'=>'success'
                    );
            return redirect()->back()->with($notification);
           }else{
             return redirect()->back();
           }

    }

    public function DeleteBrand($id)
    {
        $data=DB::table('brands')->where('id',$id)->first();
        $image=$data->brand_logo;
        unlink($image);
        $brand=DB::table('brands')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Brand Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }

    public function EditBrand($id)
    {
         $brand=DB::table('brands')->where('id',$id)->first();
         return view('backend.pages.brand.edit',compact('brand'));
    }

    public function UpdateBrand(Request $request,$id)
    {
        $data=array();
           $data['brand_name']=$request->brand_name;
           $oldimage=$request->old_logo;  //public/brands/1154654.jpg;
           $image=$request->brand_logo;
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/brands/'.$image_one);    //   public/brands/123123.jpg
                $data['brand_logo']='public/brands/'.$image_one;   //   public/brands/123123.jpg
                 DB::table('brands')->where('id',$id) ->update($data);
                 unlink($oldimage);
                 $notification=array(
                     'messege'=>'Successfully Brand Updated ',
                     'alert-type'=>'success'
                    );
            return Redirect()->route('brands')->with($notification);
           }
            //jodi image na thake notun vabe
           $data['brand_logo']= $oldimage;
            DB::table('brands')->where('id',$id) ->update($data);
             $notification=array(
                     'messege'=>'Successfully Brand Updated Without Image',
                     'alert-type'=>'success'
             );
            return Redirect()->route('brands')->with($notification);
    }
   
}
