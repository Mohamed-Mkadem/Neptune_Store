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
                            <a href="" class="add-to-cart btn"> <i class="fal fa-shopping-cart"></i> Add To Cart</a>
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
    </div>
@endsection
