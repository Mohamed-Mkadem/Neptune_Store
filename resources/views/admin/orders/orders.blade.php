@extends('layouts.admin_layout')
@push('styles')
    <link rel="stylesheet" href="/CSS/orders_products.css">
@endpush
@push('title')
    <title> Orders - NEPTUNE </title>
@endpush
@section('content')
    <main id="main">
        <!-- Header -->
        @include('admin.components.header')
        <!-- Start main Content -->
        <div class="container">
            @if ($orders->count() > 0)
                <section class="content">
                    <!-- Title -->
                    <div class="title">
                        <h2 class=" title-message">Orders :</h2>
                    </div>
                    <!-- Start orders Table -->
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>N° Items</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td><a href=" {{ route('show', $order->id) }} ">#{{ $order->id }}</a></td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->no_items }}</td>
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

                </section>
            @else
                <div class="empty">
                    <h2 class="emptyMessage">There is No Orders Yet!</h2>
                </div>
            @endif
        </div>
    </main>
@endsection
