@extends('layouts.admin_layout')
@push('styles')
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush
@section('content')
    <div class="main-wrapper">
        <aside id="aside" class="">
            <i class="far fa-times-circle light aside-margin-toggler"></i>
            <a class="logo" href="{{ route('dashboard') }}"> <span class="word-logo">NEPTUNE</span> <span
                    class="letter-logo">N</span></a>

            <div class="aside-links">
                <a href="{{ route('dashboard') }}"> <i class="fal fa-flag"></i> <span>Overview</span></a>
                <a href="{{ route('orders') }}" class="active"> <i class="fal fa-cart-arrow-down"></i> <span>Orders</span></a>
                <a href="{{ route('categories') }}"> <i class="fal fa-list"></i> <span>Categories</span></a>
                <a href=" {{ route('products') }} "> <i class="fal fa-tshirt"></i> <span>Products</span></a>
                <a href="statistics.html"> <i class="fal fa-chart-bar"></i> <span>Statistics</span></a>
                <a href="cutomers.html"> <i class="fal fa-user"></i> <span>Customers</span></a>
                <a href="tickets.html"> <i class="fal fa-user-headset"></i> <span>Tickets</span></a>
                <a href="tasks.html"> <i class="fal fa-tasks"></i> <span>Tasks</span></a>
                <a href="settings.html"> <i class="fal fa-cog"></i> <span>Settings</span></a>
                <a href=""> <i class="fal fa-sign-out"></i> <span>Logout</span></a>
            </div>
        </aside>
        <main id="main">
            <!-- Header -->
            <header>
                <!-- Layout Toggler -->
                <i class="far fa-bars layout-toggler" id="layoutToggler"></i>


                <h3 class="date">June 31, 2022</h3>



                <div class="top-menu-actions">
                    <i class="fal fa-eclipse-alt mode-switcher"></i>
                    <a href="settings.html">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>

            </header>
            <!-- Start main Content -->
            <div class="container">
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
                                <tr>
                                    <td><a href="order.html">#1</a></td>
                                    <td>Mohamed Mkadem</td>
                                    <td>25 03 2022</td>
                                    <td>25</td>
                                    <td>$254.3</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td><a href="">#1</a></td>
                                    <td>Mohamed Mkadem</td>
                                    <td>25 03 2022</td>
                                    <td>25</td>
                                    <td>$254.3</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td><a href="">#1</a></td>
                                    <td>Mohamed Mkadem</td>
                                    <td>25 03 2022</td>
                                    <td>25</td>
                                    <td>$254.3</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td><a href="">#1</a></td>
                                    <td>Mohamed Mkadem</td>
                                    <td>25 03 2022</td>
                                    <td>25</td>
                                    <td>$254.3</td>
                                    <td>Delivered</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </section>
            </div>
        </main>
    </div>
@endsection
