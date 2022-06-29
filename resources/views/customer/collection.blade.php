@extends('layouts.customer_layout')
@section('title')
    <title> Collection - NEPTUNE </title>
@endsection
@section('showcase_message')
    <div class="showcase collection">
        <q class="ff-elmessiri ">Fashions fade, style is <span>eternal</span> </q>
    </div>
@endsection



@section('content')
    @if ($products->count() > 0)
        <form action=" {{ route('filterProducts') }} " id="filter-form" class="filter-form" method="get">

            <i class="fal fa-window-close close pointer" id="close-filter-form"></i>
            <div class="row three">
                {{-- Start Row --}}
                <div class="row-item">
                    <h4> Category </h4>
                    @foreach ($categories as $category)
                        <label class="pointer">
                            <input class="catBtn" data-category="{{ $category->name }}"
                                onclick="getSubCategories({{ $category->id }})" type="radio" name="category_id"
                                id="{{ $category->id }}" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
                {{-- End Row --}}
                {{-- Start Row --}}
                <div class="row-item">
                    <h4>Sub-Category</h4>
                    <div id="subCategoriesHolder"> </div>
                </div>
                {{-- End Row --}}
                {{-- Start Row --}}
                <div class="row-item">
                    <h4>Price</h4>
                    <label for="">
                        Min :
                    </label>
                    <input type="number" name="min" min="0" id="minPrice">
                    <label for="">
                        Max :
                    </label>
                    <input type="number" name="max" min="0" id="maxPrice">
                    <button type="submit" id="filterSubmit">Filter</button>
                </div>
                {{-- End Row --}}
            </div>

        </form>
        {{-- Start filter and search bar --}}
        <div class="container">

            <div class="filter-bar">
                <button class="filter main" id="filterBtn">
                    <span>Filter</span> <i class="fal fa-random pointer"></i>
                </button>
                <div class="options">
                    <i class="fal fa-th grid pointer gridLayout"></i>
                    <i class="fal fa-list list pointer listLayout"></i>
                </div>
            </div>

        </div>
    @endif
    {{-- Start product Showcase --}}
    <div class="container">
        {{-- Messages --}}
        @if (session()->has('success'))
            {{-- <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> --}}
            <div class="messages  success mb-10">
                <p class="message-body">{{ session()->get('success') }}</p>
            </div>
        @endif
        @if ($products->count() == 0)
            <div class="product-showcase" id="product-showcase">
                {{-- Start Card --}}
                <h2 class="empty main ff-elmessiri"> There is no Products To Show </h2>
            </div>
        @else
            <div class="product-showcase" id="product-showcase">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="product-image">
                            {{-- <img src=" {{ $product->image }} " alt=""> --}}
                            <img src=" {{asset('Assets/Columbia Boys Glennaker Rain Jacket.jpg')}} " alt="">
                            <div class="options">
                                <form action=" {{ route('addToCart') }} " method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                    <button type="submit" class="addToCartBtn"><i
                                            class="fal fa-shopping-cart"></i></button>

                                </form>
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
                                <a href="" class="save btn"> <i class="fal fa-heart"></i> Save </a>
                            </div>
                        </div>
                    </div>
                    {{-- End Card --}}
                @endforeach
            </div>
            {!! $products->links() !!}
        @endif
    </div>
@endsection
