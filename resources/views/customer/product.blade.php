@extends('layouts.customer_layout')
@section('title')
    <title> Product - NEPTUNE </title>
@endsection


@section('content')
    <div class="container">
        <!-- Messages -->
        @if (session()->has('success'))
            <div class="messages  success mt-15">
                <p class="message-body">{{ session()->get('success') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="messages fail mb-10">
                @foreach ($errors->all() as $error)
                    <p> {{ $error }} </p>
                @endforeach
            </div>
        @endif
        <section class="product-details">
            <div class="product-image-holder">
                <img src="{{ $product->image }}" alt="">
            </div>
            <div class="product-info">
                <div class="product-name-save">
                    <h2> {{ $product->name }} </h2>
                    <form action="{{ route('addWishlist') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                        <button type="submit"><i class="fal fa-heart"></i></button>
                    </form>
                   
                </div>
                <div class="product-categories">
                    @foreach ($product->subCategories as $subCat)
                        <p> {{ $subCat->category->name }}/ {{ $subCat->name }} </p>
                    @endforeach
                    {{-- <p> Kids / Jackets </p> --}}
                </div>
                <div class="product-description">
                    <ul>
                        {!! $product->description !!}
                    </ul>
                </div>
                <p class="product-price">
                    <x-currency :amount="$product->price" /> <span>
                        <x-currency :amount="$product->price * 1.1" />
                    </span>
                </p>
                <div class="cart-options">
                    <form action="{{ route('addToCart') }}" method="post">
                        @csrf
                        <div class="d-flex">
                            <div class="quantity-holder mr-15">
                                <div onclick="dec()">-</div>
                                <input name="quantity" readonly type="number" min="1" value="1">
                                <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                <div onclick="inc()">+</div>
                            </div>
                            <button class=" btn addToCartBtn"> <i class="fal fa-shopping-cart"></i> Add To Cart
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
        {{-- Start description & return policy section --}}
        <div class="row product-page">
            {{-- Start Col --}}
            <div class="row-item description">
                <h2 class="row-title">Description</h2>
                <ul>
                    {!! $product->description !!}
                </ul>
            </div>
            {{-- End Col --}}
            {{-- Start Col --}}
            <div class="row-item">
                <h2 class="row-title">Return Policy</h2>
                <p>
                    {{ $product->policy }}
                </p>
            </div>
            {{-- End Col --}}
        </div>
    </div>
@endsection
