<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
  
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
 
        $total = $cart->sum(function ($cart_item) {
            return $cart_item->quantity * $cart_item->product->price;
        });
        return view('customer.cart', ['cart' => $cart, 'total' => $total]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['min:1', 'integer', 'required']
        ]);
        Cart::updateOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ], [
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => DB::raw('quantity + ' . $request->quantity)

        ]);

        return redirect()->back()->with('success', 'Item Added Successfully');
    }

    public function update(Request $request)
    {
        $cart_item = Cart::findOrFail($request->id);
        $request->validate([
            'quantity' => ['required', 'min:1', 'int'],
        ]);

        $cart_item->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'cart Updated Successfully');
    }

    public function destroy($id)
    {
        $cart_item = Cart::findOrFail($id);
        $cart_item->destroy($id);
        return redirect()->back()->with('success', 'item deleted successfully');
    }
}
