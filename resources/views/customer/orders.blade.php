@extends('layouts.customer_layout')
@section('title')
    <title> Orders - NEPTUNE </title>
    <link rel="stylesheet" href=" {{ asset('css/orders_products.css') }} ">
@endsection

@section('content')
    <div class="container">
        <section class="content">
            <!-- Title -->
            @if ($orders->count() > 0)
                <h2 class=" title-message ff-elmessiri main mt-55">Orders :</h2>
                <!-- Start orders Table -->
                <div class="table-responsive mb-55">
                    <table class="customer_orders">
                        <thead>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Cost</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><a href=" {{ route('showOrder', $order->id) }} ">#{{ $order->id }}</a></td>
                                    <td>{{ $order->created_at->format('d-m-yy') }}</td>
                                    <td>
                                        <x-currency :amount="$order->total_cost" />
                                    </td>
                                    <td class="{{ $order->status }}"> <span>{{ $order->status }}</span> </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="pagination-holder">
                    {{ $orders->links() }}
                </div>
            @else
                <div class="empty-block bg-light">
                    <h2 class="ff-elmessiri main">Your Orders List Is Empty</h2>
                    <a href=" {{ route('collection') }} ">Shop Now</a>
                </div>
            @endif

        </section>

    </div>
@endsection
