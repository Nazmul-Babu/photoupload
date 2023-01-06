<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAuthController extends Controller
{
    public function showregister()
    {
       return view('user.register');
    }
    public function register(){
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|alpha_dash'
            ]);
             User::create([
             'name'=>request('name'),
             'email'=>request('email'),
             'password'=>bcrypt(request('password')),
                ])->financial()->create();
                return to_route('showlogin');

    }
    public function showlogin()
    {

       return view('user.login');
    }
    public function login(){
        $this->validate(request(),[
          'name'=>'required',
          'password'=>'required',
            ]);
            if(Auth::attempt(['name'=>request('name'),'password'=>request('password')])){
              return to_route('showupload');
            }else{
                return 'credential does not match';
            }
    }
    public function logout()
    {
      Auth::guard('web')->logout();
      return to_route('showlogin');
    }
}
