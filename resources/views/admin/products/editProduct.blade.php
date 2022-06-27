@extends('layouts.admin_layout')
@push('title')
    <title> {{ $product->name }} - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="/CSS/categories.css">
    <link rel="stylesheet" href="/CSS/product.css">
@endpush

@section('content')

        <main id="main">
            <!-- Header -->
            @include('admin.components.header')
            <!-- Start main Content -->
            <div class="container">

                <section class="content">
                    <!-- Title -->
                    <div class="title">
                        <h2 class=" title-message">Edit Product</h2>
                    </div>
                    {{-- Messages --}}
                    @if (session()->has('success'))
                        {{-- <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> --}}
                        <div class="messages  success mb-10">
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
                    <!-- Messages -->
                    <div class="messages d-none fail">
                        <p class="message-body">Item Deleted Successfully</p>
                    </div>
                    <!-- Start Adding new product Section -->

                    <div class="add-form details">
                        <form action=" {{ route('updateProduct', $product->id) }} " method="POST">
                            @csrf

                            <div class="row">
                                <input type="text" class="row-item" value=" {{ old('name', $product->name) }} "
                                    name="name" placeholder="Product Name" required id="">
                                <input type="text" class="row-item" value=" {{ old('image', $product->image) }} "
                                    name="image" placeholder="Image Url" required id="">
                            </div>
                            <div class="row three">
                                <input type="number" class="row-item"
                                    value=" {{ old('cost_price', $product->cost_price) }} " name="cost_price"
                                    id="" placeholder="Cost Price">
                                <input type="number" class="row-item" value=" {{ old('price', $product->price) }} "
                                    name="price" placeholder="Price" id="">
                                <input type="number" class="row-item" value=" {{ old('quantity', $product->quantity) }} "
                                    name="quantity" id="" placeholder="Quantity">
                            </div>
                            <div class="row">
                                <textarea class="row-item" placeholder="Description" name="description" id="" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
                                <textarea class="row-item" placeholder="Return Policy" name="policy" id="" cols="30" rows="10">{{ old('policy', $product->policy) }}</textarea>
                            </div>
                            <div class="row three">
                                <!-- Start Row item -->
                                @foreach ($categories as $category)
                                    <div class="row-item">
                                        <h2 class="section-name mb-10"> {{ $category->name }} </h2>
                                        <div class="section-values">
                                            @if (count($category->subCategories) > 0)
                                                @foreach ($category->subCategories as $subCat)
                                                    <label for="{{ (int) $subCat->id }}" class="pointer d-block mb-10">
                                                        <input type="checkbox" name="sub_category_id[]"
                                                            id="{{ (int) $subCat->id }}" value="{{ $subCat->id }}"
                                                            @foreach ($product->subCategories as $prod) @if ($prod->id === $subCat->id)
                                                                checked @endif
                                                            @endforeach>
                                                        {{ $subCat->name }}
                                                    </label>
                                                @endforeach
                                            @else
                                                <span>Empty</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End Row item -->

                            </div>
                            <div class="d-flex j-c-end">
                                <button type="submit" class="new p-15-25">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </main>

@endsection
