@extends('layouts.customer_layout')
@section('title')
    <title> Collection - NEPTUNE </title>
@endsection
@section('showcase_message')
    <q class="ff-elmessiri ">Fashions fade, style is <span>eternal</span> </q>
@endsection


@include('customer.components.search_form')
@section('content')
    {{-- Start filter and search bar --}}
    <div class="container">
        <div class="filter-bar">
            <button class="filter main">
                <span>Filter</span> <i class="fal fa-random pointer"></i>
            </button>
            <div class="options">
                <i class="fal fa-th grid pointer" id="gridLayout"></i>
                <i class="fal fa-list list pointer" id="listLayout"></i>
                <i class="fal fa-search pointer" id="show-search-form"></i>
            </div>
            {{-- Search Form --}}
        </div>

    </div>
    {{-- Start product Showcase --}}
    <div class="container">
        <div class="product-showcase" id="product-showcase">
            {{-- Start Card --}}
            @foreach ($products as $product)
                <div class="card">
                    <div class="product-image">
                        <img src=" {{ $product->image }} " alt="">
                        <div class="options">
                            <a href=""><i class="fal fa-shopping-cart"></i></a>
                            <a href=""><i class="fal fa-eye"></i></a>
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
                            <a href="" class="add-to-cart btn"> <i class="fal fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="details btn"> <i class="fal fa-eye"></i> Details</a>
                            <a href="" class="save btn"> <i class="fal fa-heart"></i> Save </a>
                        </div>
                    </div>
                </div>
                {{-- End Card --}}
            @endforeach
        </div>
        {!! $products->links() !!}
    </div>
@endsection
