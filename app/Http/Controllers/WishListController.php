<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $saved = WishList::select('product_id')->where('user_id', Auth::id())->get();
        $products = Product::whereIn('id', $saved)->get();
        // dd($products);
        return view('customer.wishList', ['products' => $products]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id']
        ]);
        WishList::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with('success', 'Saved Successfully');
    }
    public function destroy(Request $request)
    {
        $wishlist_item = WishList::where([
            'product_id' => $request->product_id,
            'user_id' => Auth::id()
        ])->first();
        $wishlist_item->destroy($wishlist_item->id);
        return view('customer.wishlist')->with('success', 'item deleted successfully');
    }
}
