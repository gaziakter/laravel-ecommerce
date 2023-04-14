<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function CartPage(){
        $user_id = Auth::id();
        $cart_item = Cart::where('user_id',  $user_id)->get();
        return view('customer.cart_page', compact('cart_item'));
    }

    //
    public function AddCart(Request $request){

        $unit_price = $request->unit_price;
        $quantity = $request->quantity;
        $total_price =  $unit_price * $quantity;

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'unit_price' => $unit_price,
            'total_price' =>  $total_price

        ]);
        return redirect()->route('cart.page')->with('message', 'Your Item added to cart');

    }


    public function RemoveCart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('cart.page')->with('message', 'Your Item removed successfully');
    }


    public function CheckOut(){
        return view('customer.Check_out_page');
    }

    public function PlaceOrder(Request $request){
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'address_info' => $request->address_info,
            'city_name' => $request->city_name,
            'post_code' => $request->post_code,
        ]);
        return redirect()->route('final.step');
    }

    public function FinalStep(){
        $user_id = Auth::id();
        $cart_item = Cart::where('user_id',  $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        return view('customer.final_step', compact('cart_item', 'shipping_address'));
    }

    public function MakeOrder(){
        $user_id = Auth::id();
        $cart_item = Cart::where('user_id',  $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach ($cart_item as $item) {
            Order::insert([
                'user_id' => $user_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'total_price' => $item->total_price,
                'phone_number' => $shipping_address->phone_number,
                'address_info' => $shipping_address->address_info,
                'city_name' => $shipping_address->city_name,
                'post_code' => $shipping_address->post_code
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        return redirect()->route('pending.order')->with('message', 'Your Order has been place successfully');
    }


    public function pendingOrder(){
        return view('customer.pending_order');
    }


}
