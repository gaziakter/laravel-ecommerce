<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
}
