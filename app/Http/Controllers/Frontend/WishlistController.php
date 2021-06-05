<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function AddWishlist($id)
    {

    	$userid=Auth::id();
    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	);

    	if (Auth::check()) {
    		if ($check) {
    			// return \Response::json(['error' => 'Product Already has on your wishlist']);        
                return response()->json(['error' => 'Product Already has on your wishlist']);       
    		}else{
    			DB::table('wishlists')->insert($data);
             //   return \Response::json(['success' => 'Successfully Added on your wishlist']); 
             return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
    	}else{
    		//return \Response::json(['error' => 'At first login your account']);
              return response()->json(['error' => 'At first login your account']);        
    	}

    }

    public function Wishlist()
    {
        $product = DB::table('wishlists')
                    ->join('products','wishlists.product_id','products.id')
                    ->select('products.*','wishlists.user_id')
                    ->where('wishlists.user_id',Auth::id())
                    ->get();


        //return response()->json($product_color);
      return  view('frontend.pages.wishlist.wishlist',compact('product'));
    }

    public function RemoveWishlist($id){
        $userid=Auth::id();
        DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->delete();
        $notification=array(
             'messege'=>'Successfully wishlist Deleted ',
             'alert-type'=>'success'
            );
         return Redirect()->back()->with($notification);
    }
}
