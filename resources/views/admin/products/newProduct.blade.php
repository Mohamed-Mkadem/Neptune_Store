@extends('layouts.admin_layout')
@push('title')
    <title> New Product - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/product.css">
@endpush

@section('content')
    <div class="main-wrapper">

        <main id="main">
            <!-- Header -->
            <header>
                <!-- Layout Toggler -->
                <i class="far fa-bars layout-toggler" id="layoutToggler"></i>


                <h3 class="date">June 31, 2022</h3>



                <div class="top-menu-actions">
                    <i class="fal fa-eclipse-alt mode-switcher"></i>
                    <a href="settings.html">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>

            </header>
            <!-- Start main Content -->
            <div class="container">

                <section class="content">
                    <!-- Title -->
                    <div class="title">
                        <h2 class=" title-message">Add New Product</h2>
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
                        <form action=" {{ route('storeProduct') }} " method="POST">
                            @csrf

                            <div class="row">
                                <input type="text" class="row-item" name="name" placeholder="Product Name" required
                                    id="">
                                <input type="text" class="row-item" name="image" placeholder="Image Url" required
                                    id="">
                            </div>
                            <div class="row three">
                                <input type="number" class="row-item" name="cost_price" id=""
                                    placeholder="Cost Price">
                                <input type="number" class="row-item" name="price" placeholder="Price" id="">
                                <input type="number" class="row-item" name="quantity" id="" placeholder="Quantity">
                            </div>
                            <div class="row">
                                <textarea class="row-item" placeholder="Description" name="description" id="" cols="30" rows="10"></textarea>
                                <textarea class="row-item" placeholder="Return Policy" name="policy" id="" cols="30" rows="10"></textarea>
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
                                                            id="{{ (int) $subCat->id }}" value="{{ $subCat->id }}">
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
                                <button type="submit" class="new p-15-25">Add Product</button>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </main>
    </div>
@endsection
