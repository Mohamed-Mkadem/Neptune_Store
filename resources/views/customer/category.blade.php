@extends('layouts.customer_layout')
@section('title')
    <title> Category - NEPTUNE </title>
@endsection

@section('showcase_message')
    <div class="showcase collection">
        <q class="ff-elmessiri "> {{ $category->name }} </q>
    </div>
@endsection


@section('content')
    {{-- Include the grid/list switchers --}}
    <div class="container">
        @include('customer.components.filter-bar')
    </div>
    <div class="container">
        @if ($products->count() > 0)
            <div class="product-showcase" id="product-showcase">
                {{-- Start Card --}}
                @foreach ($products as $product)
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
                    {{-- End Card --}}
                @endforeach
            </div>
            {!! $products->links() !!}
        @else
            <h2 class="empty main ff-elmessiri">No Products In This Category</h2>
        @endif
    </div>
@endsection
