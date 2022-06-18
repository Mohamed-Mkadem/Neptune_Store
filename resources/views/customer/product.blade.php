@extends('layouts.customer_layout')
@section('title')
    <title> Product - NEPTUNE </title>
@endsection


@section('content')
    <div class="container">


        <section class="product-details">
            <div class="product-image-holder">
                <img src="{{ $product->image }}" alt="">
            </div>
            <div class="product-info">
                <div class="product-name-save">
                    <h2> {{ $product->name }} </h2>
                    <a href="#"> <i class="fal fa-heart"></i> </a>
                </div>
                <div class="product-categories">
                    @foreach ($product->subCategories as $subCat)
                    <p> {{$subCat->category->name}}/ {{$subCat->name}} </p>
                        
                    @endforeach
                    {{-- <p> Kids / Jackets </p> --}}
                </div>
                <div class="product-description">
                    <ul>
                        {!! $product->description !!}
                    </ul>
                </div>
                <p class="product-price">${{ $product->price }} <span> ${{$product->price * 1.3}}  </span></p>
                <div class="cart-options">
                    <div class="quantity-holder">
                        <button onclick="dec()">-</button>
                        <input name="number" readonly type="number" min="2" value="1">
                        <button onclick="inc()">+</button>
                    </div>
                    <a href="" class="add-to-cart btn"> <i class="fal fa-shopping-cart"></i> Add To Cart</a>
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
                    {{$product->policy}}
                </p>
            </div>
            {{-- End Col --}}
        </div>
    </div>
@endsection
