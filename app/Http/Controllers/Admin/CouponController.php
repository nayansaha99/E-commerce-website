<?php

namespace App\Http\Controllers\Admin;
use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }
    /*************coupon store *****/
    public function Store(Request $request){
        Coupon::insert(
            [
                'coupon_name'=>strtoupper($request->coupon_name),
                'created_at' => Carbon::now(),
            ]);

        return Redirect()->back()->with('success','Coupon Added');    

    }
    /************* coupon edit ************/
    public function couponEdit($coupon_id){
        $coupon = Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit',compact('coupon'));
    }
    public function update(Request $request)
    {
        $coupon_id = $request->id;
        Coupon::findOrFail($coupon_id)->update([
                'coupon_name'=>strtoupper($request->coupon_name),
                'updated_at' => Carbon::now(),
            ]);

        return Redirect()->route('admin.coupon')->with('success','Coupon Updated');    
    }
    public function couponDelete($coupon_id){
        Coupon::findOrFail($coupon_id)->delete();
        return Redirect()->back()->with('delete','Coupon Deleted');
    }

    // status inactive 
    public function Inactive($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 0]);
        return Redirect()->back()->with('status','Coupon inactive');
    }

    
    // status active 
    public function Active($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Coupon Activated');
    }
}




