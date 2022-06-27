@extends('layouts.customer_layout')
@section('title')
    <title> Orders - NEPTUNE </title>
    <link rel="stylesheet" href=" {{ asset('CSS/orders_products.css') }} ">
@endsection

@section('content')
    <div class="container">
        <section class="content">
            <!-- Title -->
           
                <h2 class=" title-message ff-elmessiri main">Orders :</h2>
           
            <!-- Start orders Table -->
            <div class="table-responsive">
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
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <x-currency :amount="$order->total_cost" />
                                </td>
                                <td class="{{ $order->status }}"> <span>{{ $order->status }}</span> </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </section>

    </div>
@endsection
