@extends('layouts.customer_layout')
@section('title')
    <title> Order - NEPTUNE </title>
    <link rel="stylesheet" href=" {{ asset('css/orders_products.css') }} ">
@endsection

@section('content')
        <div class="container">
            <section class="content">
                <!-- Title -->

                    <h2 class=" title-message ff-elmessiri main mt-15">Order Informations:</h2>

                {{-- Messages --}}
                @if (session()->has('success'))
                    <div class="messages  success mb-10">
                        <p class="message-body">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="messages fail mb-10">
                        @foreach ($errors->all() as $error)
                            <p> {{ $error }} </p>
                        @endforeach
                    </div>
                @endif
                <!-- Start orders Table -->
                <div class="table-responsive mb-15">
                    <table class="order_details customer">
                        <thead>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>N° Items</th>
                            <th>Cost</th>
                            <th>Status</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->no_items }}</td>
                                <td>
                                    <x-currency :amount="$order->total_cost" />
                                </td>
                                <td class="{{ $order->status }}">
                                    <span>{{ $order->status }}</span>                                   
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


                    <h2 class=" title-message ff-elmessiri main mt-15">Order Details:</h2>


                <div class="table-responsive mb-55">
                    <table class="order_items">
                        <thead>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($order_items as $order_item)
                                <tr>
                                    <td>#{{ $order_item->product_id }}</td>
                                    <td>{{ $order_item->product_name }}</td>
                                    <td>{{ $order_item->quantity }}</td>
                                    <td>
                                        <x-currency :amount="$order_item->price" />
                                    </td>
                                    <td>
                                        <x-currency :amount="$order_item->price * $order_item->quantity" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
@endsection
