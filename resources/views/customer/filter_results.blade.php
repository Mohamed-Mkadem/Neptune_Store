@extends('layouts.customer_layout')
@section('title')
    <title> Search - NEPTUNE </title>
@endsection

@include('customer.components.filter_form')
@section('content')
    @if (count($products) > 0)
        <div class="container">

            {{-- Layout Section --}}
            <div class="filter-bar">
                <h4 class="main ff-elmessiri"> {{ $products->count() }} Results:</h4>
                <div class="options">
                    <i class="fal fa-th grid pointer gridLayout"></i>
                    <i class="fal fa-list list pointer listLayout"></i>
                </div>
            </div>


            {{-- Product Showcase --}}
            <div class="product-showcase" id="product-showcase">
                {{-- Start Card --}}
                @foreach ($products as $product)
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
                                <form action="{{ route('addWishlist') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit"><i class="fal fa-heart"></i></button>
                                </form>
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
                                <form action="{{ route('addToCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">

                                    <button type="submit" class="btn addToCartBtn"><i class="fal fa-shopping-cart"></i> Add
                                        To Cart </button>
                                </form>


                                <a href=" {{ route('showProduct', $product->slug) }} " class="details btn"> <i
                                        class="fal fa-eye"></i> Details</a>
                                <form action="{{ route('addWishlist') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit" class="btn save"><i class="fal fa-heart"></i> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Card --}}
                @endforeach
            </div>
            {!! $products->appends(request()->input())->links() !!}
        </div>
    @else
        <div class="product-showcase">
            <h2 class="empty ff-elmessiri main">No Products Match your Search </h2>
        </div>
    @endif
@endsection
