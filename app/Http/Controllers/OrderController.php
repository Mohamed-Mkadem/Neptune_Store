<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function customerIndex()
    {
        $orders = Order::where('user_id', Auth::id())->paginate();
        // dd($orders);
        return view('customer.orders', ['orders' => $orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $orders = Order::with('user')->paginate();
        return view('admin.orders.orders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = Cart::where('user_id', Auth::id())->with('user')->get();
        $total = $cart->sum(function ($cart_item) {
            return $cart_item->quantity * $cart_item->product->price;
        });
        return view('customer.checkout', ['cart' => $cart, 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $request->validate([
            'address_line_one' => ['required', 'string'],
            'postal_code' => ['required'],
            'city' => 'required',
            'country' => 'required',
            'payment_method' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $cart[0]->user->first_name . ' ' . $cart[0]->user->last_name,
                'address_line_one' => $request->address_line_one,
                'address_line_two' => $request->input('address_line_two', null),
                'postal_code' => $request->postal_code,
                'state' => $request->input('state', null),
                'total_cost' =>  $request->total,
                'no_items' => $cart->count(),
                'city' => $request->city,
                'country' => $request->country,

            ]);

            foreach ($cart as $cart_item) {
                OrderProduct::create([

                    'price' => $cart_item->product->price,
                    'product_id' => $cart_item->product_id,
                    'product_name' => $cart_item->product->name,
                    'quantity' => $cart_item->quantity,
                    'order_id' => $order->id,
                ]);
                $cart_item->product->update([
                    'ordered' => DB::raw('ordered + ' . $cart_item->quantity),
                    'quantity' => DB::raw('quantity -' . $cart_item->quantity)
                ]);
            }
            DB::commit();
            Cart::where('user_id', Auth::id())->delete();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->back()->with('success', 'Order created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function customerShow($id)
    {
        $order = Order::findOrFail($id);
        $order_items = OrderProduct::where('order_id', $id)->paginate();
        return view('customer.order', ['order' => $order, 'order_items' => $order_items]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        // $order = Order::where('id', $id)->first();
        $order = Order::findOrFail($id);
        $order_items = OrderProduct::where('order_id', $id)->paginate();

        return view('admin.orders.order', ['order' => $order, 'order_items' => $order_items]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::findOrFail($request->order_id);
        $request->validate([
            'order_id' =>  ['required', 'exists:orders,id'],
            'status' => 'required'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Order Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
