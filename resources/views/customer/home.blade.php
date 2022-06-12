@extends('layouts.customer_layout')
@section('title')
    <title> Home - NEPTUNE </title>
@endsection
@section('showcase_message')
    <q class="ff-elmessiri">We don't do Fashion, We do <span>Greatness</span> </q>
    <a href="#collection" class="explore light">Explore</a>
@endsection

@section('content')
    <!-- Start Collection Section -->
    <section class="collection">
        <div class="container">


            <h2 class="section-title" id="collection"> Collection </h2>
            <div class="home-row">
                <!-- Start col -->
                <div class="col pointer">
                    <div class="col-item">
                        <img src="../Assets/men.jpg" alt="">
                        <div class="layer">
                            <a href="">MEN</a>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col pointer">
                    <div class="col-item">
                        <img src="../Assets/women.jpg" alt="">
                        <div class="layer">
                            <a href="">WOMEN</a>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col pointer">
                    <div class="col-item">
                        <img src="../Assets/kids.jpg" alt="">
                        <div class="layer">
                            <a href="">KIDS</a>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
        </div>
    </section>

    <!-- Start New Arrival Section -->

    <section class="arrivals">
        <div class="container">
            <h2 class="section-title ff-elmessiri main t-center">New Arrivals</h2>
            <div class="home-row arrivals">
                <!-- Start Col -->
                <div class="col pointer">
                    <div class="col-item">
                        <div class="img-holder">
                            <img src="../Assets/Amazon Essentials Boys and Toddlers' Light-Weight Water-Resistant Packable Hooded Puffer Coat.jpg"
                                alt="">
                            <div class="options">
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=""><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <p class="product-name">Nike Essentials T-shirt</p>
                            <span class="price">$229.9</span>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col pointer">
                    <div class="col-item">
                        <div class="img-holder">
                            <img src="../Assets/Amazon Essentials Boys and Toddlers' Light-Weight Water-Resistant Packable Hooded Puffer Coat.jpg"
                                alt="">
                            <div class="options">
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=""><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <p class="product-name">Nike Essentials T-shirt</p>
                            <span class="price">$229.9</span>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col pointer">
                    <div class="col-item">
                        <div class="img-holder">
                            <img src="../Assets/Amazon Essentials Boys and Toddlers' Light-Weight Water-Resistant Packable Hooded Puffer Coat.jpg"
                                alt="">
                            <div class="options">
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=""><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <p class="product-name">Nike Essentials T-shirt</p>
                            <span class="price">$229.9</span>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col pointer">
                    <div class="col-item">
                        <div class="img-holder">
                            <img src="../Assets/Amazon Essentials Boys and Toddlers' Light-Weight Water-Resistant Packable Hooded Puffer Coat.jpg"
                                alt="">
                            <div class="options">
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=""><i class="fal fa-eye"></i></a>
                                <a href=""><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="info ">
                            <p class="product-name">Nike Essentials T-shirt</p>
                            <span class="price">$229.9</span>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
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
