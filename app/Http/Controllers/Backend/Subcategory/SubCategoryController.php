<?php

namespace App\Http\Controllers\Backend\Subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Category;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories()
    {
    	$category=Category::all();
    	$subcategory=DB::table('subcategories')
						->join('categories','subcategories.category_id','categories.id')
						->select('categories.category_name','subcategories.*')
						->get();
    	return view('backend.pages.subcategory.subcategory',compact('category','subcategory'));
    }

    public function storesubcat(Request $request)
    {
    	$validatedData = $request->validate([
        'subcategory_name' => 'required|unique:subcategories|max:55',
        ]);
        $subcategory = new Subcategory();
        $subcategory->category_id =$request->category_id;
        $subcategory->subcategory_name =$request->subcategory_name;
        $subcategory->save();
        $notification=array(
                 'messege'=>'Subcategory Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function DeleteSubCat($id)
    {
    	 DB::table('subcategories')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>'SubCategory Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditSubCat($id)
    {
    	$subcat=DB::table('subcategories')->where('id',$id)->first();
    	$category=Category::all();
    	return view('backend.pages.subcategory.edit',compact('subcat','category'));
    }

    public function UpdateSubCat(Request $request,$id)
    {
    	$validatedData = $request->validate([
        'subcategory_name' => 'required|max:55',
        ]);
         $data=array();
         $data['category_id'] =$request->category_id;
         $data['subcategory_name']=$request->subcategory_name;
         $update= DB::table('subcategories')->where('id',$id)->update($data);
        if ($update) {
        	$notification=array(
                 'messege'=>'SubCategory Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('subcategories')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('subcategories')->with($notification);
        }
    }    
}
