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
                                <a href=""><i class="fal fa-shopping-cart"></i></a>
                                <a href=" {{ route('showProduct', $product->slug) }}  "><i class="fal fa-eye"></i></a>
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
                                <a href=" {{ route('showProduct', $product->slug) }} " class="details btn"> <i
                                        class="fal fa-eye"></i> Details</a>
                                <a href="" class="save btn"> <i class="fal fa-heart"></i> Save </a>
                            </div>
                        </div>
                    </div>
                    {{-- End Card --}}
                @endforeach
            </div>
            {!! $products->links() !!}
        </div>
    @else
        <div class="product-showcase">
            <h2 class="empty ff-elmessiri main">No Products Match your Search </h2>
        </div>
    @endif
@endsection
