<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
// use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\JWTGuard;

class apicontroller extends Controller
{
    public function index(){
        $jsondata=[
            "name"=>"jhon Doe",
            "hobbies"=>[
                [
                    "name"=>"guardening",
                    "time"=>"2hour"
                ],
                [
                    "name"=>"cycling",
                    "time"=>"2hour"
                ]
            ]
        ];
        return response()->json($jsondata);
    }

    public function getphotos(){
        $product=product::all();
        return response()->json($product);
    }
    public function register(){
      $validator=Validator::make(request()->all(),[
        'name'=>'required|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|alpha_dash'
      ]);
      if ($validator->fails()) {
        return response()->json( [
            'status'=>'error',
            'errors'=>$validator->errors()
        ]);
    }
    User::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>bcrypt(request('password')),
    ])->financial()->create();
    return response()->json( [
        'status'=>'ok',
        'message'=>'created'
    ]);
    }
    public function login(){
        $credentials=request()->only(['name','password']);
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json([
        'status'=>'ok',
        'token'=> $token
        ]);
    }
}
