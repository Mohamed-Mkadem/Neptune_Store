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
    <div class="container">
        @if ($products->count() > 0)
        @if (session()->has('success'))
            <div class="messages mt-15 success mb-10">
                <p class="message-body">{{ session()->get('success') }}</p>
            </div>
        @endif
            <div class="filter-bar">
                <h4 class="main ff-elmessiri"> {{ $products->count() }} Products:</h4>
                <div class="options">
                    <i class="fal fa-th grid pointer gridLayout"></i>
                    <i class="fal fa-list list pointer listLayout"></i>
                </div>
            </div>
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
            {!! $products->links() !!}
        @else
            <h2 class="empty main ff-elmessiri">No Products In This Category</h2>
        @endif
    </div>
@endsection
