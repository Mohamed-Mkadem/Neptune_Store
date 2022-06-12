@extends('layouts.admin_layout')
@push('title')
<title> {{$product->name}} - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="/CSS/categories.css">
    <link rel="stylesheet" href="/CSS/product.css">
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
                        <h2 class=" title-message"> {{ $product->name }} </h2>
                        <div class="buttons">
                            <a href=" {{ route('editProduct', $product->id) }} " class="edit"><i
                                    class="fal fa-edit"></i></a>
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
