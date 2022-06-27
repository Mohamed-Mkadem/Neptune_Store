<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
    {
        // Quick Stats
        $sales = Order::sum('total_cost');
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $customers = User::count();
        // Best Sales / Orders
        $bestSelling = Product::orderBy('ordered','DESC')->limit(5)->get();
        $orders = Order::limit(5)->latest()->get();
        // dd($orders);
        // dd($bestSelling);
        return view('admin.overview', [
            'sales' => $sales,
            'ordersCount' => $ordersCount,
            'products' => $productsCount,
            'customers' => $customers,
            'bestSelling' => $bestSelling,
            'orders' => $orders
        ]);
    }
}
