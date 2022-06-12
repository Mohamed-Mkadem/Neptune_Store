@extends('layouts.admin_layout')
@push('styles')
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush
@section('content')
    <div class="main-wrapper">

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
