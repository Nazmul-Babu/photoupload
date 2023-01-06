<?php

namespace App\Http\Controllers;

use App\Models\cashout;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminDashboard');
    }
    public function showAdminlogin(){
        return view('admin.login');
    }
    public function Adminlogin(){
        $this->validate(request(),[
            'name'=>'required',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt(['name'=>request('name'),'password'=>request('password')]))
        {
            return to_route('admin');
        }else{
            return 'credential does not matched';
        }
    }
    public function Adminlogout()
    {
        Auth::guard('admin')->logout();
        return to_route('showAdminlogin');
    }
    public function approval(){
        $product=product::with('user')->where('status','pending')->get();
        return view('admin.approval',compact(['product']));
    }
    public function approvalproduct($imageid=NULL,$status=NULL)
    {
        if(Auth::guard('admin') && $imageid !=NULL && $status !=NULL){
            product::find($imageid)->update([
                'status'=>$status,
                'approved_by'=>$status == 'approved' ? Auth::guard('admin')->id() : NULL,
                'approved_date'=>$status=='approved' ? date('y-m-d H:i:s') :NULL,


              ]);
              return redirect()->back();
        }else{
            return 'invalid response';
        }

    }
    public function showbuyout(){
        $product=product::with('user')->where('status','selling');

        if(request()->has('from_date') && request()->has('to_date')){
            $from_date=Carbon::parse(request('from_date'))->format('y-m-d');
            $to_date=Carbon::parse(request('to_date'))->format('y-m-d');
           $product->whereBetween('created_at', [ $from_date, $to_date])->get();
           $product= $product->get();

        }else{
          $product=$product->get();
        }

        return view('admin.buyout',compact('product'));
    }
    public function buyout()
    {


          $this->validate( request(),[
           'rate'=>'numeric',
           'option'=>'required',
           'productid'=>'required',
          ]);
          $product=product::find(request('productid'));
          if(request('option')=='buy-out' && request('rate') !=NULL){
            DB::transaction(function() use($product){


            $userfinancial=$product->user->financial;
            $newbalance= $userfinancial->balance + request('rate');
            $userfinancial->update([
                'balance'=> $newbalance,

            ]);
              $product->update([
                'buyout_by'=>Auth::guard('admin')->id(),
                'buyout_date'=>date('y-m-d'),
                'rate'=>request('rate'),
                'status'=>request('option')
              ]);
            });
              return redirect()->back();

          }else{
            $product->update([

                'status'=>request('not-sellable')
              ]);
              return redirect()->back();
          }


    }
    public function showcashout()
    {
        $cashout=cashout::with('user')->where('status','pending')->get();
        return view('admin.cashout',compact('cashout'));
    }
    public function approvalcashout($cashoutid=NULL,$status=NULL){
   if( Auth::guard('admin') && $cashoutid != NULL && $status !=NULL){
     cashout::find($cashoutid)->update([
     'status'=>$status,

     ]);
     return redirect()->back();
   }else{
      return 'invalid response';
   }
    }
}
