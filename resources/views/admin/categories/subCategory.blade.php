@extends('layouts.admin_layout')
@push('title')
    <title> {{ $subCategory->category->name }} / {{ $subCategory->name }} - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/orders_products.css">
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
                    <div>

                        <h2 class=" title-message"> {{ $subCategory->name }} </h2>
                        <p class="breadCrumb">
                            <a href=" {{ route('showCategory', $subCategory->category->id) }} ">
                                {{ $subCategory->category->name }} </a> /
                            <a href=" {{ route('showSubCategory', $subCategory->id) }} ">{{ $subCategory->name }}</a>
                        </p>
                    </div>
                    <div class="buttons">

                        <i class="fal fa-edit edit pointer enableEdit"></i>

                        <form action=" {{ route('deleteSubCategory', $subCategory->id) }} " method="post"
                            id="delete_item" class="delete_item">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="deleteBtn" id="deleteBtn">
                                <i class="fal fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Messages --}}
                @if (session()->has('success'))
                    {{-- <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> --}}
                    <div class="messages  success">

                        <p class="message-body">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="messages fail">
                        @foreach ($errors->all() as $error)
                            <p> {{ $error }} </p>
                        @endforeach
                    </div>
                @endif
                <div class="add-new subCategory">
                    <form action=" {{ route('editSubCategory', $subCategory->id) }} " method="post">
                        @csrf
                        <input type="text" name="name" value=" {{ $subCategory->name }} " id="cat_name"
                            class="enableEditInput" readonly placeholder="subCategory Name" required>

                        <select name="parent_id" id="" class="enableEditInput pointer">
                            <option value="">Category</option>
                            @foreach ($categories as $item)
                                <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                            @endforeach
                        </select>

                        <button type="submit" class="editBtn">Edit subCategory</button>
                    </form>
                </div>
                <!-- List and add products Section -->
                <h2 class="sub-title">Products</h2>
                @if (count($subCategory->products) > 0)
                    <div class="table-responsive">
                        <table class="subCategory">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Added at</th>
                                <th>Quantity</th>
                                <th>Ordered</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>#{{ $product->id }}</td>
                                        <td><a
                                                href=" {{ route('showAdminProduct', $product->slug) }} ">{{ $product->name }}</a>
                                        </td>
                                        <td>{{ $product->created_at->format('d/m/yy') }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->ordered }}</td>
                                        <td>
                                            <x-currency :amount="$product->price" />
                                        </td>

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

                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-holder">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="empty">
                        <h2 class="emptyMessage">You didn't add any product to this Sub-Category</h2>
                        <a href=" {{ route('addProduct') }}  " class="new">Add Some Products</a>
                    </div>
                @endif
            </section>
        </div>
    </main>

@endsection
