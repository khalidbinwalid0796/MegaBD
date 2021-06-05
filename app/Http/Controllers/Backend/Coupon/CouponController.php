<?php

namespace App\Http\Controllers\Backend\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
    	$coupon=DB::table('coupons')->get();
    	return view('backend.pages.coupon.coupon',compact('coupon'));
    }

    public function StoreCoupon(Request $request)
    {
        $validatedData = $request->validate([
        'coupon' => 'required|unique:coupons|max:55',
        ]);
        
    	$data=array();
    	$data['coupon']=$request->coupon;
    	$data['discount']=$request->discount;
    	DB::table('coupons')->insert($data);
    	$notification=array(
                 'messege'=>'Coupon Insert Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id)
    {
    	DB::table('coupons')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Coupon Delete Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);

    }

    public function EditCoupon($id)
    {
    	$coupon=DB::table('coupons')->where('id',$id)->first();
    	return view('backend.pages.coupon.edit',compact('coupon'));
    }

    public function UpdateCoupon(Request $request,$id)
    {
        $validatedData = $request->validate([
        'coupon' => 'required|max:55',
        ]);
    	$data=array();
    	$data['coupon']=$request->coupon;
    	$data['discount']=$request->discount;
    	DB::table('coupons')->where('id',$id)->update($data);
    	$notification=array(
                 'messege'=>'Coupon Update Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->route('admin.coupon')->with($notification);
    }

    public function ratingUser(){
        $rating=DB::table('orders')->join('users','orders.user_id','users.id')
                ->select('orders.*','users.name')
                ->where('status',3)->orderBy('orders.id','DESC')
                ->limit(10)->get();
         return view('backend.pages.rating.rating_user',compact('rating'));      
    }

    //year delevered by searching
    public function ratingGift()
    {
        $user_sums = DB::table('rating_point')
                    ->join('users','rating_point.user_id','users.id')
                    ->select('rating_point.*','users.name')
                    ->orderBy('rtotal','DESC')
                    //->limit(3)
                    ->get();
         return view('backend.pages.rating.gift_user',compact('user_sums'));

    }
    //user_id pass
    public function ratingGiftView($id){
        $rate=DB::table('rating_point')->where('user_id',$id)->first();
        return view('backend.pages.rating.gift_view',compact('rate'));
    }

    public function ratingGiftSend(Request $request,$id){
        $data=array();
        $data['rtotal']=$request->rtotal;

        //$rating=DB::table('rating_point')->where('id',$id)->first();

        //foreach ($rating as $row) {
            DB::table('rating_point')
              ->where('id',$id)
              ->update(['rtotal' => DB::raw('rtotal -'.$data['rtotal'])]);
       // }
        $notification=array(
                 'messege'=>'Gift Send Successfully',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

}
