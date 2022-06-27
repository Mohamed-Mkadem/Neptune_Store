@extends('layouts.admin_layout')
@push('styles')
    <link rel="stylesheet" href="/CSS/orders_products.css">
@endpush
@section('content')
    <main id="main">
        <!-- Header -->
        @include('admin.components.header')
        <div class="container">
            <section class="content">
                <!-- Title -->
                <div class="title">
                    <h2 class=" title-message">Order Informations:</h2>
                </div>
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
                <div class="table-responsive">
                    <table class="order_details">
                        <thead>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>N° Items</th>
                            <th>Cost</th>
                            <th>Status</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->no_items }}</td>
                                <td>
                                    <x-currency :amount="$order->total_cost" />
                                </td>
                                <td class="{{ $order->status }} d-flex a-i-center j-c-center gap-15">
                                    <span>{{ $order->status }}</span>
                                    <form action="{{route('updateOrder')}}" method="post" class="d-flex a-i-center j-c-center gap-15 order_update">
                                        @csrf
                                        <select name="status" id="">
                                            <option value="">Update Status</option>
                                            <option value="Processing"> Processing</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Canceled">Canceled</option>
                                        </select>
                                        <input type="hidden" name="order_id" value="{{ (int) $order->id }}">
                                        <button type="submit"><i class="fal fa-sync-alt"></i></button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="title">
                    <h2 class=" title-message">Order Details:</h2>
                </div>

                <div class="table-responsive">
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
    </main>
@endsection
