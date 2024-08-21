<?php

namespace App\Http\Controllers\Frontend;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function index() 
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }

    function placeorder(Request $request) 
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;   
        }
            $order->total_price = $total;

  
        $order->tracking_no = 'hegar'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item) 
        {
            OrderItem::create([
                'order_id'=>$order->id, 
                'prod_id'=>$item->prod_id, 
                'qty'=>$item->prod_qty, 
                'price'=>$item->products->selling_price, 
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
         
        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address_1 = $request->input('address1');
            $user->address_2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order sukses");
    }

    // function metodelain(Request $request) 
    // {

    //     $request->request->add(['total_price' => $request->qty * 1000, 'status' => 'pending']);
    //     $order = Order::create($request->all());
       
    //      /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
    // composer require midtrans/midtrans-php
                                  
    // Alternatively, if you are not using **Composer**, you can download midtrans-php library 
    // (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
    // the file manually.   
    
    // require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
    
    // //SAMPLE REQUEST START HERE
    
    // // Set your Merchant Server Key
    // \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    // \Midtrans\Config::$isProduction = false;
    // // Set sanitization on (default)
    // \Midtrans\Config::$isSanitized = true;
    // // Set 3DS transaction for credit card to true
    // \Midtrans\Config::$is3ds = true;
    
    // $params = array(
    //     'transaction_details' => array(
    //         'order_id' => $order->id,
    //         'gross_amount' => $order->totalprice,
    //     ),
    //     'customer_details' => array(
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //     ),
    // );
    
    // $snapToken = Snap::getSnapToken($params);
    // dd($snapToken);
    // return view('cekot', compact('snapToken', 'order'));

    // }


    }




