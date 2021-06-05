<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use Session;
use Mail;
use App\Mail\Invoicemail;

class PaymentController extends Controller
{
    public function PymentPage()
    {
      	$cart=Cart::content();
      	return view('frontend.pages.payment.payment',compact('cart'));
    }

    public function payment(Request $request)
    {
		$data=array();
		$data['name']=$request->name;
		$data['email']=$request->email;
		$data['phone']=$request->phone;
		$data['address']=$request->address;
		$data['city']=$request->city;
		$data['payment']=$request->payment;

		if ($request->payment == 'stripe') {
			//stripe payment pages
			return view('frontend.pages.payment.stripe',compact('data'));

		}elseif($request->payment == 'paypal'){

		}elseif($request->payment == 'ideal'){

		}else{
			echo"handcash";
		}

    }

    public function STripeCharge(Request $request)
    {
        $email = Auth::user()->email;

    	$total=$request->total;
    	// Set your secret key. Remember to switch to your live secret key in production!
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey('sk_test_51HOzLpGCOpZOZeJftmS2Of6hsVMZnCuAhr5JmD9dDsfgBD1oZeteDtO4RTGLy4RGxoyRAoUb94tPRvTRjTGktEXG006QZTMYwN');

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];

		$charge = \Stripe\Charge::create([
		  'amount' => $total*100,
		  'currency' => 'usd',
		  'description' => 'Example charge',
		  'source' => $token,
		  'metadata' => ['order_id' => uniqid()],
		]);
		//dd($charge); dd korle sob data gulo dekhai jgulo need segulo nite hoy

			$data=array();
			$data['user_id']=Auth::id();
			$data['payment_id']=$charge->payment_method;
			$data['paying_amount']=$charge->amount/100;
			$data['blnc_transection']=$charge->balance_transaction;
			$data['stripe_order_id']=$charge->metadata->order_id;
			$data['shipping']=$request->shipping;
			$data['vat']=$request->vat;
			$data['total']=$request->total;
            $data['payment_type']=$request->payment_type;
			 if (Session::has('coupon')) {
			 	 $data['subtotal']=Session::get('coupon')['balance'];
                 $data['rating_point']=$data['subtotal']*.005;
    	     }else{
    	  	      $data['subtotal']=Cart::Subtotal() ;
                  $data['rating_point']=$data['subtotal']*.005;
    	    }
    	    $data['status']=0;
    	    $data['date']=date('d-m-y');
    	    $data['month']=date('F');
    	    $data['year']=date('Y');
            $data['status_code']=mt_rand(100000,999999); 
    	    $order_id=DB::table('orders')->insertGetId($data);

            Mail::to($email)->send(new Invoicemail($data));//mail send to user
            //Mail::to($ship_email);

    	    // insert shipping details table

    	    	$shipping=array();
    	    	$shipping['order_id']=$order_id;
    	    	$shipping['ship_name']=$request->ship_name;
    	    	$shipping['ship_email']=$request->ship_email;
    	    	$shipping['ship_phone']=$request->ship_phone;
    	    	$shipping['ship_address']=$request->ship_address;
    	    	$shipping['ship_city']=$request->ship_city;
    	    	DB::table('shipping')->insert($shipping);

    	    	//insert data into orderdeatils
    	    	$content=Cart::content();
    	    	$details=array();
    	    	foreach ($content as $row) {
    	    		$details['order_id']= $order_id;
    	    		$details['product_id']=$row->id;
    	    		$details['product_name']=$row->name;
    	    		$details['color']=$row->options->color;
    	    		$details['size']=$row->options->size;
    	    		$details['quantity']=$row->qty;
    	    		$details['singleprice']=$row->price;
    	    		$details['totalprice']=$row->qty * $row->price;
    	    		DB::table('order_details')->insert($details);
    	    	}
//total rating point insert in rating_point table
                $uid=Auth::id();
                $rating_point=DB::table('rating_point')->where('user_id',$uid)->first();
                $rating=array();
                if($rating_point != NULL){
                    $ruser=DB::table('orders')->where('user_id',$uid)->get();
                    $total=0;
                    $rating['user_id']= $uid;
                        foreach ($ruser as $row) {
                            $total=$total + $row->rating_point;
                        }
                    $rating['rtotal']=$total;
                    DB::table('rating_point')->where('user_id',$uid)->update($rating);

                }else{
                    $ruser=DB::table('orders')->where('user_id',$uid)->get();
                    $total=0;
                    $rating['user_id']= $uid;
                        foreach ($ruser as $row) {
                            $total=$total + $row->rating_point;
                        }
                    $rating['rtotal']=$total;
                    DB::table('rating_point')->insert($rating);

                }
                
//end rating point
    	    	Cart::destroy();
    	    	 if (Session::has('coupon')) {
			 	 Session::forget('coupon');
    	     }

    	       $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                 return Redirect()->to('/')->with($notification);
			

    }
}
