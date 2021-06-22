<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function catgory()
    {
    	$category=Category::all();
    	return view('backend.pages.category.category',compact('category'));
    }

    public function storecatgory(Request $request)
    {
    $this->validate($request, [
      'category_name'  => 'required|unique:categories|max:55',    
    ],
    [
      'category_name.required'  => 'Please provide a categories',     
    ]);
        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name =$request->category_name;
        $category->save();
        $notification=array(
                 'messege'=>'Category Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
    	 DB::table('categories')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('backend.pages.category.edit',compact('category'));
    }

    public function UpdateCategory(Request $request,$id)
    {
    $this->validate($request, [
      'category_name'  => 'required|max:55',    
    ],
    [
      'category_name.required'  => 'Please provide a categories',     
    ]);
         $data=array();
         $data['category_name']=$request->category_name;
         $update= DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
        	$notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }
    }
}
