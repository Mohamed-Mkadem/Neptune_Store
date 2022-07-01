@extends('layouts.customer_layout')
@section('title')
    <title> Home - NEPTUNE </title>
@endsection
@section('showcase_message')
    <div class="showcase ">
        <q class="ff-elmessiri">We don't do Fashion, We do <span>Greatness</span> </q>
        <a href="#collection" class="explore light">Explore</a>
    </div>
@endsection

@section('content')
    <!-- Start Categories -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center" id="categories"> Top Categories </h2>

            <div class="categories-row">
                @foreach ($categories as $category)
                    <!-- Start Row item -->
                    <div class="row-item">
                        <h3 class="cat-name"> {{ $category->name }} </h3>
                        <p class="cat-description">What Men Needs</p>
                        <a href=" {{ route('showCategoryProducts', $category->slug) }} " class="cat-link"> <i
                                class="fal fa-arrow-to-right"></i> Shop Now</a>
                    </div>
                    <!-- End Row item -->
                @endforeach

            </div>

        </div>
    </section>
    <!-- Start New Releases -->
    <section>
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center"> New Releases </h2>
            <div class="product-showcase four">
                @foreach ($newProducts as $product)
                    <!-- Start Card -->
                    <div class="card">
                        <div class="product-image">
                            <img src=" {{ $product->image }} " alt="">
                            <div class="options">
                                <form action=" {{ route('addToCart') }} " method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit" class="addToCartBtn"><i
                                            class="fal fa-shopping-cart"></i></button>

                                </form>
                                <a href=" {{ route('showProduct', $product->slug) }}  "><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"> {{ $product->name }} </h3>

                            <span class="product-price">
                                <x-currency :amount="$product->price" />
                            </span>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach


            </div>
        </div>
    </section>
    <!-- Start Best Sales -->
    <section>
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center"> Best Selling </h2>
            <div class="product-showcase four">
                @foreach ($bestProducts as $product)
                    <!-- Start Card -->
                    <div class="card">
                        <div class="product-image">
                            <img src=" {{ $product->image }} " alt="">
                            <div class="options">
                                <form action=" {{ route('addToCart') }} " method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit" class="addToCartBtn"><i
                                            class="fal fa-shopping-cart"></i></button>

                                </form>
                                <a href=" {{ route('showProduct', $product->id) }}  "><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"> {{ $product->name }} </h3>

                            <span class="product-price">
                                <x-currency :amount="$product->price" />
                            </span>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach


            </div>
        </div>
    </section>
    <!-- Start Brands -->
    <section>
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center"> Our Brands </h2>
            <div class="four-row brands">
                <!-- Start Row item -->
                <div class="four-row-item">
                    <img src="../Assets/hummellogo.png" alt="">
                </div>
                <!-- End Row item -->
                <!-- Start Row item -->
                <div class="four-row-item">
                    <img src="../Assets/prada.png" alt="">
                </div>
                <!-- End Row item -->
                <!-- Start Row item -->
                <div class="four-row-item">
                    <img src="../Assets/zara.png" alt="">
                </div>
                <!-- End Row item -->
                <!-- Start Row item -->
                <div class="four-row-item">
                    <img src="../Assets/Versace.png" alt="">
                </div>
                <!-- End Row item -->
            </div>
        </div>
    </section>
    <!-- Start why neptune Section -->
    <section class="why-neptune">
        <div class="container">
            <h2 class="section-title ff-elmessiri main">Why Neptune ?</h2>
            <div class="four-row why-neptune">
                <!-- Start Col -->
                <div class="four-row-item">
                    <div class="col-item">
                        <i class="fal fa-shipping-fast"></i>
                        <h4>Fast Delivery</h4>
                        <p>Shipping in 5 days</p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="four-row-item">
                    <div class="col-item">
                        <i class="fal fa-gift"></i>
                        <h4>Gift Voucher</h4>
                        <p>Surprise coupon voucher </p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="four-row-item">
                    <div class="col-item">
                        <i class="fal fa-wallet"></i>
                        <h4>Money back</h4>
                        <p>Refund within 30 days</p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="four-row-item">
                    <div class="col-item">
                        <i class="fal fa-shield-check"></i>
                        <h4>Safe payment</h4>
                        <p>100% secure with us</p>
                    </div>
                </div>
                <!-- End col -->
            </div>
        </div>
    </section>
@endsection
