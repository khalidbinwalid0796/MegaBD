<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
use Session;

class CouponController extends Controller
{
    public function Coupon(Request $request)
    {
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
              session::put('coupon',[
                  'name' => $check->coupon,
                  'discount' => $check->discount,
                  'balance' => Cart::Subtotal() - $check->discount
              ]);
              $notification=array(
                              'messege'=>'Successfully Coupon Applied',
                               'alert-type'=>'success'
                         );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                              'messege'=>'Invalid Coupon',
                               'alert-type'=>'error'
                         );
            return redirect()->back()->with($notification);
        }

    }

    public function CouponRemove()
    {
         session::forget('coupon');
          return redirect()->back();
    }


}
