@extends('layouts.admin_layout')
@push('title')
    <title> Products - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
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
                    <h2 class=" title-message">Products :</h2>
                    <a href=" {{ route('addProduct') }} " class="add-product new">+ Add Product</a>
                </div>
                <!-- Messages -->
                @if (session()->has('success'))
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
                <!-- Start orders Table -->
                <div class="table-responsive">
                    @if (count($products) > 0)
                        <table class="products">

                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Categories</th>
                                <th>Quantity</th>
                                <th>Cost Price</th>
                                <th>Sale Price</th>
                                <th>Ordered</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <!-- Start Tr -->
                                @foreach ($products as $product)
                                    <tr>
                                        <td># {{ $product->id }} </td>
                                        {{-- <td> <img src="{{ $product->image }}" width="30" alt=""> </td> --}}
                                        <td>Image</td>
                                        <td><a
                                                href=" {{ route('showAdminProduct', $product->slug) }} ">{{ $product->name }}</a>
                                        </td>
                                        <td>
                                            @foreach ($product->subCategories as $subCat)
                                                - {{ $subCat->category->name }} / {{ $subCat->name }} <br>
                                            @endforeach

                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <x-currency :amount="$product->cost_price" />
                                        </td>
                                        <td>
                                            <x-currency :amount="$product->price" />
                                        </td>
                                        <td> {{ $product->ordered }} </td>
                                        <td>
                                            <form action=" {{ route('deleteProduct', $product->id) }} " method="post"
                                                id="delete_item" class="delete_item">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="deleteBtn" id="deleteBtn">
                                                    <i class="fal fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- End tr -->




                            </tbody>
                        </table>
                        <div class="pagination-holder">
                            {{ $products->links() }}
                        </div>
                    @else
                        <h2 class="empty">You didn't have any products yet!</h2>
                    @endif
                </div>


            </section>
        </div>
    </main>

@endsection
