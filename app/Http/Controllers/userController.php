<?php

namespace App\Http\Controllers;

use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function showupload()
    {
        return view ('user.upload');
    }
    public function upload()
    {
        $this->validate(request(),[
         'name'=>'required',
         'details'=>'required',
         'product_name'=>'required|image|mimes:jpg,png',
        ]);
        $productName='';
        try{
            $extension=request()->file('product_name')->extension();
        $productName='product_'.uniqid().time().'.'.$extension;
        request()->file('product_name')->move('images',$productName);
        }catch(Exception $e){
            dd($e->getMessage());

        }
        Auth::user()->products()->create([
             'name'=>request('name'),
             'details'=>request('details'),
             'product_name'=>$productName,
        ]);

         return redirect()->back()->with('success', 'successfully uploaded');

    }
    public function myproduct()
    {
        $product=product::where('user_id',Auth::user()->id)->latest()->paginate('2');
        return view('user.myproduct',compact('product'));
    }
    public function sellimage($imageid)
    {
       $product=product::find($imageid);
       if($product->user_id == Auth::id()){
          $product->update([
            'status'=>'selling'
          ]);
        return redirect()->back();
       }else{
        return 'hacker detected';
       }
    }
    public function showcashout(){
        $userfinancial=Auth::user()->financial;
        $cashout=Auth::user()->cashout;
        return view('user.cashout',compact(['userfinancial','cashout']));
    }
    public function cashout()
    {
        $userfinancial=Auth::user()->financial;
     if($userfinancial->balance <= 10 ){
      return 'your balance is less than 10taka';
     }else{
        $withdrawamount=(int)$userfinancial->balance;
        $newbalance= $userfinancial->balance - $withdrawamount;

        Auth::user()->cashout()->create([
           'amount'=>$withdrawamount,
           'status'=>'pending'
        ]);
        $userfinancial->update([
            'balance'=>$newbalance
        ]);
        return redirect()->back();
     }
    }
}
