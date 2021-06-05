<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function Storenewslatter(Request $request)
    {
    	$validatedData = $request->validate([
        'email' => 'required|unique:newslaters|max:55',
        ]);

        $data=array();
        $data['email']=$request->email;
        DB::table('newslaters')->insert($data);
         $notification=array(
                'messege'=>'Thanks for subscribing ',
                'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function OrderTracking(Request $request)
    {
         $code=$request->code;

         $track=DB::table('orders')->where('status_code',$code)->first();
         if ($track) {             
             return view('frontend.pages.order.track',compact('track'));
         }else{
               $notification=array(
                'messege'=>'Status code invalid ',
                'alert-type'=>'error'
                       );
             return Redirect()->back()->with($notification);
         }

    }

    public function ProductSearch(Request $request)
    {
         $brands=DB::table('brands')->get();
          $item=$request->search;
          $products=DB::table('products')
                                // ->join('brands','products.brand_id','brands.id')
                                // ->select('products.*','brands.brand_name')
                                ->where('product_name','LIKE', "%{$item}%")
                                // ->orWhere('brand_name','LIKE', "%{$item}%")
                                ->paginate(20);

    // $products = Product::orWhere('product_name', 'like', '%'.$item.'%')
    //->orWhere('product_details', 'like', '%'.$item.'%')
    // ->orderBy('id', 'desc')
    //->paginate(9);

               return view('frontend.pages.search.search',compact('brands','products'));       
    }
}
