@extends('layouts.admin_layout')
@push('title')
<title> {{$product->name}} - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/product.css">
@endpush


@section('content')
    @include('admin.components.confirm_deletion')


        <main id="main">
            <!-- Header -->
              @include('admin.components.header')
            <!-- Start main Content -->
            <div class="container">

                <section class="content">
                    <!-- Title -->
                    <div class="title">
                        <h2 class=" title-message"> {{ $product->name }} </h2>
                        <div class="buttons">
                            <a href=" {{ route('editProduct', $product->id) }} " class="edit"><i
                                    class="fal fa-edit"></i></a>
                            <form action=" {{ route('deleteProduct', $product->id) }} " method="post" id="delete_item"
                                class="delete_item">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="deleteBtn" id="deleteBtn">
                                    <i class="fal fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Messages -->
                    <div class="messages d-none fail">

                        <p class="message-body">Item Deleted Successfully</p>
                    </div>
                    <!-- Start Details Section -->
                    <div class="details">
                        <!-- Image and stats section -->
                        <div class="main-info">
                            <div class="img-holder">
                                <img src=" {{ $product->image }} " alt="" width="150">
                            </div>
                            <div class="text-info">
                                <div class="info-name">
                                    <h2> {{ $product->name }} </h2>
                                    @foreach ($subCategories as $subCat)
                                        <p> {{ $subCat->category->name }} <span>/</span> {{ $subCat->name }} </p>
                                    @endforeach
                                </div>
                                <div class="info-stats">
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-cart-plus"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Ordered</span>
                                            <h4> {{$product->ordered}} </h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-warehouse"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>In Stock</span>
                                            <h4> {{ $product->quantity }} </h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Cost Price</span>
                                            <h4><x-currency :amount=" $product->cost_price" /></h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                    <!-- Start stats item -->
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-sack-dollar"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Sale Price</span>
                                            <h4><x-currency :amount=" $product->price" /></h4>
                                        </div>

                                    </div>
                                    <div class="stats-item">
                                        <div class="icon-holder">
                                            <i class="fas fa-sack-dollar"></i>
                                        </div>
                                        <div class="info-stats-data">
                                            <span>Earnings</span>
                                            {{-- <h4><x-currency :amount=" ($product->price - $product->cost_price) * $product->ordered " /></h4> --}}
                                            <h4><x-currency :amount=" $product->earnings " /></h4>
                                        </div>

                                    </div>
                                    <!-- End stats item -->
                                </div>
                            </div>
                        </div>
                        <!-- Description and return policy section -->
                        <div class="secondary-info row">
                            <div class="description row-item">
                                <h4>Description</h4>
                                <ul style="list-style: circle ;     margin-left: 20px">
                                    {!! $product->description !!}
                                </ul>
                            </div>
                            <div class="return-policy row-item">
                                <h4>Return Policy</h4>
                                <p>
                                    {{ $product->policy }}
                                </p>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </main>

@endsection
