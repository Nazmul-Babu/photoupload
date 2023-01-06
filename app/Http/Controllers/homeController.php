<?php

namespace App\Http\Controllers;

use App\Models\cashout;
use App\Models\product;
use Illuminate\Http\Request;

class homeController extends Controller
{
 public function index()

 {
    $product=product::where('status','approved')->get();
     return view('user.home',compact('product'));
 }
 public function withdraw()
 {
    return view('user.withdraw');
 }
 public function payment()
 {
   

    $items=[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
              'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
          ],
          'quantity' => 1,
    ];
    $stripe = new \Stripe\StripeClient('sk_test_51M93A9E4o5Z9I1xT72Bb0YJQTglBDuxGDs8br56OZLrcsOIVbHXglgk6gVZluoaE7ZVdUDh3Xfo0VzF3FQnyMExO00EvAsFQGz');
    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [
            [
          $items
        ]
    ],
        'mode' => 'payment',
        'success_url' => 'http://localhost:8000/success',
        'cancel_url' => 'http://localhost:8000/cancel',
      ]);
      return redirect($checkout_session->url);

 }

}
