@extends('layouts.admin_layout')
@push('title')
    <title> Products - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush

@section('content')
    <div class="main-wrapper">
        <aside id="aside" class="">
            <i class="far fa-times-circle light aside-margin-toggler"></i>
            <a class="logo" href="dashboard.html"> <span class="word-logo">NEPTUNE</span> <span
                    class="letter-logo">N</span></a>

            <div class="aside-links">
                <a href="dashboard.html"> <i class="fal fa-flag"></i> <span>Overview</span></a>
                <a href="orders.html"> <i class="fal fa-cart-arrow-down"></i> <span>Orders</span></a>
                <a href="categories.html"> <i class="fal fa-list"></i> <span>Categories</span></a>
                <a href="products.html" class="active"> <i class="fal fa-tshirt"></i> <span>Products</span></a>
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
                        <h2 class=" title-message">Products :</h2>
                        <a href=" {{ route('addProduct') }} " class="add-product new">+ Add Product</a>
                    </div>
                    <!-- Messages -->
                    <div class="messages d-none fail">

                        <p class="message-body">Item Deleted Successfully</p>
                    </div>
                    <!-- Start orders Table -->
                    <div class="table-responsive">
                        @if (count($products) > 0)
                            <table class="products">

                                <thead>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Categories</th>
                                    <th>Quantity</th>
                                    <th>Production Price</th>
                                    <th>Sale Price</th>
                                    <th>Ordered</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <!-- Start Tr -->
                                    @foreach ($products as $product)
                                        <tr>
                                            <td># {{ $product->id }} </td>
                                            <td> <img src="{{ $product->image }}" width="30" alt=""> </td>
                                            <td><a
                                                    href=" {{ route('showProduct', $product->id) }} ">{{ $product->name }}</a>
                                            </td>
                                            <td>
                                                @foreach ($product->subCategories as $subCat)
                                                    - {{ $subCat->category->name }} / {{ $subCat->name }} <br>
                                                @endforeach

                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>${{ $product->cost_price }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>142</td>
                                            <td>
                                                <form action=" {{ route('deleteProduct', $product->id) }} " method="post"
                                                    id="delete_item" class="delete_item">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="deleteBtn" id="deleteBtn">
                                                        <i class="fal fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- End tr -->




                                </tbody>
                            </table>
                            <div class="pagination-holder">
                                {{ $products->links() }}
                            </div>
                        @else
                            <h2 class="empty">You didn't have any products yet!</h2>
                        @endif
                    </div>


                </section>
            </div>
        </main>
    </div>
@endsection
