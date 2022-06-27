@extends('layouts.admin_layout')
@push('title')
    <title> Products - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush

@section('content')
<div class="pop-up-holder show">
    <div class="delete-modal">
        <i class="fal fa-exclamation-circle"></i>
        <p class="deleteMessage">This Item Are You Sure ?</p>
        <div class="buttons">
            <button class="deleteBtn" id="confirm_deletion" >Yes</button>
            <button class="cancel" id="cancel_deletion">Cancel</button>
        </div>
    </div>
</div>

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
                <div class="messages d-none fail">

                    <p class="message-body">Item Deleted Successfully</p>
                </div>
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
                                        <td><a
                                                href=" {{ route('showAdminProduct', $product->id) }} ">{{ $product->name }}</a>
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
