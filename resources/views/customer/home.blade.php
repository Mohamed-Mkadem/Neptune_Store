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
    <!-- Start Collection Section -->
    <section class="collection">
        <div class="container">


            <h2 class="section-title" id="collection"> Collection </h2>
            <div class="home-row">
                @foreach ($categories as $cat)
                    
                <!-- Start col -->
                <div class="col pointer">
                    <div class="col-item">
                        <img src="../Assets/men.jpg" alt="">
                        <div class="layer">
                            <a href=" {{route('showCategoryProducts', $cat->id)}} "> {{$cat->name}} </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End col -->
                
            </div>
        </div>
    </section>

    <!-- Start New Arrival Section -->

    <section class="arrivals">
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center">New Arrivals</h2>
            <div class="product-showcase home">
                @foreach ($products as $product)
                <!-- Start Col -->
                 <div class="card">
                        <div class="product-image">
                            <img src=" {{ $product->image }} " alt="">
                            <div class="options">
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=" {{ route('showProduct', $product->id) }}  "><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"> {{ $product->name }} </h3>
                            <div class="product-description ">
                                <ul>
                                    {!! $product->description !!}
                                </ul>
                            </div>
                            <span class="product-price">${{ $product->price }} </span>
                            <div class="product-options">
                                <a href="" class="add-to-cart btn"> <i class="fal fa-shopping-cart"></i> Add To
                                    Cart</a>
                                <a href=" {{ route('showProduct', $product->id) }} " class="details btn"> <i
                                        class="fal fa-eye"></i> Details</a>
                                <a href="" class="save btn"> <i class="fal fa-heart"></i> Save </a>
                            </div>
                        </div>
                    </div>
                <!-- End Col -->
                    
                @endforeach

            </div>
        </div>
    </section>
    <!-- Start why neptune Section -->
    <section class="why-neptune">
        <div class="container">
            <h2 class="section-title">Why Neptune ?</h2>
            <div class="home-row why-neptune">
                <!-- Start Col -->
                <div class="col">
                    <div class="col-item">
                        <i class="fal fa-shipping-fast"></i>
                        <h4>Fast Delivery</h4>
                        <p>Shipping in 5 days</p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="col">
                    <div class="col-item">
                        <i class="fal fa-gift"></i>
                        <h4>Gift Voucher</h4>
                        <p>Surprise coupon voucher </p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="col">
                    <div class="col-item">
                        <i class="fal fa-wallet"></i>
                        <h4>Money back</h4>
                        <p>Refund within 30 days</p>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start Col -->
                <div class="col">
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
    <!-- Start Footer -->
@endsection
