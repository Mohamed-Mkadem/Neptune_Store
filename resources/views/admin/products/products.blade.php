@extends('layouts.admin_layout')
@push('title')
    <title> Products - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
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
                                    <th>Production Price</th>
                                    <th>Sale Price</th>
                                    <th>Ordered</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <!-- Start Tr -->
                                    @foreach ($products as $product)
                                        <tr>
                                            <td># {{ $product->id }} </td>
                                            <td> <img src="{{ $product->image }}" width="30" alt=""> </td>
                                            <td><a
                                                    href=" {{ route('showAdminProduct', $product->id) }} ">{{ $product->name }}</a>
                                            </td>
                                            <td>
                                                @foreach ($product->subCategories as $subCat)
                                                    - {{ $subCat->category->name }} / {{ $subCat->name }} <br>
                                                @endforeach

                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>${{ $product->cost_price }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>142</td>
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
    </div>
@endsection
