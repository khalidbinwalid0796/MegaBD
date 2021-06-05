<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Session;
Use DB;

class LanguageController extends Controller
{
    public function English(){
    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang','english');
    	return redirect()->back();
    }
    public function Bangla(){
    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang','bangla');
    	return redirect()->back();    		
    }

    public function blog()
    {
     	$post=DB::table('posts')->join('post_category','posts.category_id','post_category.id')->select('posts.*','post_category.category_name_en','post_category.category_name_bn')->get();
     	return view('frontend.pages.blog.blog',compact('post'));
     	 
    }
}
