@extends('layouts.admin_layout')
@push('title')
    {{-- <title> Products - NEPTUNE </title> --}}
@endpush
@push('styles')
    <link rel="stylesheet" href="/CSS/categories.css">
    <link rel="stylesheet" href="/CSS/product.css">
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
                        <h2 class=" title-message"> {{ $product->name }} </h2>
                        <div class="buttons">
                            <a href=" {{route('editProduct', $product->id)}} " class="edit"><i class="fal fa-edit"></i></a>
                            <form action=" {{ route('deleteProduct', $product->id) }} " method="post" id="delete_item"
                                class="delete_item">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="deleteBtn" id="deleteBtn">
                                    <i class="fal fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Messages -->
                    <div class="messages d-none fail">

                        <p class="message-body">Item Deleted Successfully</p>
                    </div>
                    <!-- Start Details Section -->
                    <div class="details">
                        <!-- Image and stats section -->
                        <div class="main-info">
                            <div class="img-holder">
                                <img src=" {{ $product->image }} " alt="" width="150">
                            </div>
                            <div class="text-info">
                                <div class="info-name">
                                    <h2> {{ $product->name }} </h2>
                                    @foreach ($subCategories as $subCat)
                                        <p> {{ $subCat->category->name }} <span>/</span> {{ $subCat->name }} </p>
                                    @endforeach
                                </div>
                                <div class="info-stats">
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-cart-plus"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Ordered</span>
                                            <h4>143</h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-warehouse"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>In Stock</span>
                                            <h4> {{ $product->quantity }} </h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Cost Price</span>
                                            <h4> ${{ $product->cost_price }}</h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-sack-dollar"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Sale Price</span>
                                            <h4>${{ $product->price }}</h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                </div>
                            </div>
                        </div>
                        <!-- Description and return policy section -->
                        <div class="secondary-info row">
                            <div class="description row-item">
                                <h4>Description</h4>
                                <ul style="list-style: circle ;     margin-left: 20px">
                                  {{ $product->description }}
                                </ul>
                            </div>
                            <div class="return-policy row-item">
                                <h4>Return Policy</h4>
                                <p>
                                    {{ $product->policy }}
                                </p>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </main>
    </div>
@endsection
