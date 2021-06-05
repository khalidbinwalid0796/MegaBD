<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function catgory()
    {
    	$category=DB::table('post_category')->get();
    	return view('backend.pages.post.post_category',compact('category'));
    }

    public function storecatgory(Request $request)
    {
    	$validatedData = $request->validate([
        'category_name_en' => 'required|unique:post_category|max:55',
        'category_name_bn' => 'required|unique:post_category|max:55',
        ]);

        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;
        DB::table('post_category')->insert($data);
        $notification=array(
                 'messege'=>'Category Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
    	 DB::table('post_category')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
    	$category=DB::table('post_category')->where('id',$id)->first();
    	return view('backend.pages.post.category_edit',compact('category'));
    }

    public function UpdateCategory(Request $request,$id)
    {
    	$validatedData = $request->validate([
        'category_name_en' => 'required|max:55',
        'category_name_bn' => 'required|max:55',
        ]);
        
        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;
        $update= DB::table('post_category')->where('id',$id)->update($data);
        if ($update) {
        	$notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('post.categories')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('post.categories')->with($notification);
        }
    }
}
