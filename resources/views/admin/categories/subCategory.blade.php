@extends('layouts.admin_layout')
@push('title')
    <title> {{ $subCategory->category->name }} / {{ $subCategory->name }} - NEPTUNE </title>
@endpush
@push('styles')
    <link rel="stylesheet" href="/CSS/categories.css">
    <link rel="stylesheet" href="/CSS/orders_products.css">
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
                        <h2 class=" title-message"> {{ $subCategory->category->name }} / {{ $subCategory->name }} </h2>

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
                            <table class="category">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($subCategory->products as $product)
                                        <tr>
                                            <td>#{{ $product->id }}</td>
                                            <td><a
                                                    href=" {{ route('showAdminProduct', $product->id) }} ">{{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->created_at->format('d/m/yy') }}</td>

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
                    @else
                        <div class="empty">
                            <h2 class="emptyMessage">You didn't add any product to this Sub-Category</h2>
                            <a href=" {{ route('addProduct') }}  " class="new">Add Some Products</a>
                        </div>
                    @endif
                </section>
            </div>
        </main>
    </div>
@endsection
