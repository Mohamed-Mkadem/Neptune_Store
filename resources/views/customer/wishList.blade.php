@extends('layouts.customer_layout')
@section('title')
    <title> WishList - NEPTUNE </title>
@endsection

@section('content')
    <div class="container">
        @if ($products->count() > 0)
            <h2 class="title">Awesome, You Have {{ $products->count() }} Products On your Cart</h2>
            <div class="product-showcase list">
                @foreach ($products as $product)
                    <!-- Start Card -->
                    <div class="card">
                        <div class="product-image">
                            <img src="{{ $product->image }}" alt="">

                        </div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <div class="product-description ">
                                <ul>
                                    {!! $product->description !!}
                                </ul>
                            </div>
                            <span class="product-price">
                                <x-currency :amount="$product->price" />
                            </span>
                            <div class="product-options">
                                <form action="{{ route('addToCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">

                                    <button type="submit" class="btn addToCartBtn"><i class="fal fa-shopping-cart"></i> Add
                                        To Cart </button>
                                </form>


                                <a href=" {{ route('showProduct', $product->id) }} " class="details btn"> <i
                                        class="fal fa-eye"></i> Details</a>
                                <form action="{{ route('removeWishlist') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit" class="btn delete"> <i class="fal fa-heart"></i> Remove</button>
                                </form>
                                {{-- <a href="{{ route('removeWishlist', $product->id) }}" class="delete btn "> <i class="fal fa-heart"></i> Remove </a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach
            </div>
        @else
            <div class="empty-block bg-light">
                <h2 class="ff-elmessiri main">Your WishList Is Empty</h2>
                <a href=" {{ route('collection') }} ">Add Some Now</a>
            </div>
        @endif
    </div>
@endsection
