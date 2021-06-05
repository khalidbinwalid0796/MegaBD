<?php

namespace App\Http\Controllers\Backend\Newslater;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class NewslaterController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function Newslater()
    {
        $sub=DB::table('newslaters')->get();
        return view('backend.pages.newslater.newslater',compact('sub'));
    }

    public function DeleteSub($id)
    {
        DB::table('newslaters')->where('id',$id)->delete();
        $notification=array(
                 'messege'=>'Subscriber Delete Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

}
