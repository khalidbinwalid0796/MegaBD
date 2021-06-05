<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
use Session;

class CheckoutController extends Controller
{
    public function Checkout()
    {
        if (Auth::check()) {
              $cart=Cart::content();
              return view('frontend.pages.checkout.checkout',compact('cart'));
        }else{
           $notification=array(
                              'messege'=>'AT first login your account',
                               'alert-type'=>'success'
                         );
          return redirect()->route('login')->with($notification);
        }


    }
}
