<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use App\Events\CheckoutCreated;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItems;

class ShoppingController extends Controller
{
    public function store(Request $request)
    {
        $shopping = new ShoppingCart;
        $shopping->user_id = $request->user_id;
        $shopping->name = $request->name;
        $shopping->email = $request->email;
        $shopping->phone_number = $request->phone_number;
        $shopping->street_address = $request->street_address;
        $shopping->city = $request->city;
        $shopping->state_province = $request->state_province;
        $shopping->postal = $request->postal;
        $shopping->order_number = strtoupper(Str::random(6));
        $shopping->save();

        // temporary something like this logic must be inside a service
        foreach($request->cart as $items) {
            $cart = new ShoppingCartItems;
            $cart->shopping_cart_id = $shopping->id;
            $cart->number_of_items = $items['qty'];
            $cart->sku = $items['sku'];
            $cart->variant_name = $items['variant_name'];
            $cart->variant_id = $items['variant_id'];
            $cart->product_id = $items['product_id'];
            $cart->product_name = $items['product_name'];
            $cart->price = $items['price'];
            $cart->total_price = $items['price'] * $items['qty'];
            $cart->save();
        }

        Redis::publish('test-channel', json_encode($shopping->load('items')));

        return response()->json(['message' => 'Successful']);
    }
}
