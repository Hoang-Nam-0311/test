<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartAttr;
use App\Models\Attribute;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{



    public function cart()
    {
        if (!Auth::guard('cus')->user()->id && !Auth::check()) return;
        $carts = Cart::where('cus_id', 1)->paginate(5);
        $check = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();
        // dd($carts);
        return view('cart-view', compact('carts', 'check'));
    }



    public function add(Request $request, Product $product)
    {
        
        if ($request->attr_id[0] != null) {
            if (!Auth::guard('cus')->user()->id && !Auth::check()) return  view('layouts.login-register');
            $id = Auth::guard('cus')->user()->id;
            $cart = Cart::where('cus_id', $id)->where('pro_id', $product->id)->first();
            if ($cart) {

                $cartItems = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

                foreach ($cartItems as $cartItem) {

                    if ($cartItem->pro_id == $product->id) {

                        $cartAttr = array_map('strval', $cartItem->cart_attr->pluck('id')->toArray());

                        $newAttr = $request->id_attr;

                        if ($cartAttr == $newAttr) {
                            $cartItem->quantity += $request->quantity;
                            $cartItem->total_price += $request->quantity * $product->price;
                            $cartItem->save();

                        } else {
                            $cart = Cart::create([
                                "quantity" => $request->quantity,
                                "total_price" => $request->quantity * $product->price,
                                "cus_id" => Auth::guard('cus')->user()->id,
                                "pro_id" => $product->id,
                            ]);

                            $attributes = $request->attr_id;
                            foreach ($attributes as $value) {
                                CartAttr::create([
                                    "cart_id" => $cart->id,
                                    "attr_id" => $value,
                                ]);
                            }

                        }
                        return redirect()->route('cart.view');
                    }
                }
            } else {

                $cart = Cart::create([
                    "quantity" => $request->quantity,
                    "total_price" => $request->quantity * $product->price,
                    "cus_id" => $id,
                    "pro_id" => $product->id,
                ]);

                $attributes = $request->attr_id;
                foreach ($attributes as $value) {
                    CartAttr::create([
                        "cart_id" => $cart->id,
                        "attr_id" => $value,
                    ]);
                }
                return redirect()->route('cart.view');
            }

            return redirect()->route('cart.view');

        } else {
            return redirect()->back()->with('no', 'Please choose attribute');
        }
    }

    public function updateQuantity(Request $request, Cart $cartItem)
    {
        if ($request->quantity_cart <= 0 || $request->quantity_cart != is_numeric($request->quantity_cart)) {
            if ($request->quantity_cart == 0) {
                $attrs = CartAttr::where('cart_id', $cartItem->id)->get();
                foreach ($attrs as $value) {
                    $value->delete();
                }
                $cartItem->delete();
            } else {
                $cartItem->quantity = 1;
                $cartItem->total_price = $cartItem->cart->price;
                $cartItem->save();
            }
        } else {
            $cartItem->quantity = $request->quantity_cart;
            $cartItem->total_price = $request->quantity_cart * $cartItem->cart->price;
            $cartItem->save();
        }

        return redirect()->route('cart.view');
    }


    public function delete(Cart $cartItem)
    {
        $attrs = CartAttr::where('cart_id', $cartItem->id)->get();
        foreach ($attrs as $value) {
            $value->delete();
        }

        $cartItem->delete();


        return redirect()->route('cart.view');
    }
}
