<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ReturnorderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function SuccessList()
    {
         $order=DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(10)->get();
         return view('frontend.pages.returnorder.returnorder',compact('order'));
    }

    public function RequestReturn($id)
    {
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
         $notification=array(
              'messege'=>'Order Return request done please wait for our confirmation email',
               'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
