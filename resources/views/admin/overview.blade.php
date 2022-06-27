@extends('layouts.admin_layout')

@section('content')
    <main id="main">
        <!-- Header -->
        @include('admin.components.header')
        <!-- Start main Content -->
        <div class="container">
            <section class="content">
                <!-- Title -->
                <div class="title">
                    <h2 class=" title-message">Hello Admin</h2>
                    <a href=" {{ route('home') }} " target="_blank" class="visit-store">
                        <i class="fal fa-sign-in-alt"></i><span>Visit Store</span>
                    </a>
                </div>




                <!-- Start quick stats section -->
                <div class="quick-stats">
                    <div class="quick-stats-item">
                        <h4>Total Sales</h4>
                        <p>
                            <x-currency :amount="$sales" />
                        </p>
                        <div class="action-icon">
                            <a href="">View Net Earnings</a>
                            <i class="fal fa-usd-circle"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Orders</h4>
                        <p>{{ $ordersCount }}</p>
                        <div class="action-icon">
                            <a href="">View All Orders</a>
                            <i class="fal fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Products</h4>
                        <p>{{ $products }}</p>
                        <div class="action-icon">
                            <a href="">View All Products</a>
                            <i class="fal fa-tshirt"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Customers</h4>
                        <p>{{ $customers }}</p>
                        <div class="action-icon">
                            <a href="">Manage Customers</a>
                            <i class="fal fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- Start Best Selling -->
                <div class="row ">
                    <div class="row-item">
                        <h4>Best Selling Products</h4>
                        <div class="row-info table-repsonsive">
                            <table>
                                <tbody>
                                    @foreach ($bestSelling as $product)
                                        <!-- Start TR -->

                                        <tr>
                                            <td>
                                                <img src=" {{ $product->image }} " width="30" alt="">
                                                <div>
                                                    <h5 class="product-name"> <a href="">{{ $product->name }}</a>
                                                    </h5>
                                                    <span class="added-date">{{ $product->created_at }}</span>
                                                </div>
                                            </td>
                                            <td class="t-center">
                                                <div>
                                                    <h5 class="product-info">
                                                        <x-currency :amount="$product->price" />
                                                    </h5>
                                                    <span class="field-name">price</span>
                                                </div>
                                            </td>
                                            <td class="t-center">
                                                <div>
                                                    <h5 class="product-info"> {{ $product->quantity }} </h5>
                                                    <span class="field-name">Stock</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- End TR -->
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row-item">
                        <h4>Last Orders</h4>
                        <div class="row-info table-responsive">
                            <table>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <!-- Start Row  -->
                                        <tr class="cat-row">
                                            <td>
                                                <div>
                                                    <h5 class="customer-name">
                                                        <a href="{{ route('show', $order->id) }}"> {{$order->customer_name}} </a>
                                                    </h5>
                                                    <span class="field-name">Customer Name</span>
                                                </div>
                                            </td>
                                            <td class="t-center">
                                                <div>
                                                    <h5 class="order-info"> {{ $order->no_items }} </h5>
                                                    <span class="field-name">N° Items</span>
                                                </div>
                                            </td>
                                            <td class="t-center">
                                                <div>
                                                    <h5 class="order-info">
                                                        <x-currency :amount="$order->total_cost" />
                                                    </h5>
                                                    <span class="field-name">Cost</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- End Row -->
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
