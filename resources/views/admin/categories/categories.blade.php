@extends('layouts.admin_layout')
@push('title')
    <title> Categories - NEPTUNE </title>
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
                    <h2 class=" title-message">Categories</h2>
                </div>
                <!-- Add Category Section -->
                {{-- Messages --}}
                @if (session()->has('success'))
                    {{-- <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> --}}
                    <div class="messages  success mb-10">
                        <p class="message-body">{{ session()->get('success') }}</p>
                    </div>
                @endif
                @if (session()->has('newErrors'))
                    {{-- <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> --}}
                    <div class="messages fail mb-10">
                        <p> {{ session()->get('newErrors') }} </p>
                        {{-- <p class="message-body">{{ session()->get('success') }}</p> --}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="messages fail mb-10">
                        @foreach ($errors->all() as $error)
                            <p> {{ $error }} </p>
                        @endforeach
                    </div>
                @endif
                <div class="add-new">
                    <form action=" {{ route('addCategory') }} " method="post">
                        @csrf

                        <input  type="text" name="name" id="cat_name" placeholder="Category Name"
                            required>
                        <input   type="text" name="slogan" id="cat_slogan" placeholder="Category Slogan" >

                        <button type="submit" class="new">Add Category</button>
                    </form>
                </div>
                <!-- List Categories Section -->
                <div class="table-responsive">
                    @if (count($categories) > 0)
                        <table class="categories">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Sub-categories</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td> #{{ $category->id }} </td>
                                        <td><a href=" {{ route('showCategory', $category->id) }} " class="underlined">
                                                {{ $category->name }}
                                            </a></td>
                                        <td>{{ $category->created_at->format('d-m-yy') }} </td>
                                        <td> {{ $category->subCategories->count() }} </td>
                                        <td>
                                            <form action=" {{ route('deleteCategory', $category->id) }} " method="post"
                                                class="delete_item">
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
                    {{ $categories->links() }}
                </div>
            @else
                <h2 class="empty category">You didn't add Any Category yet</h2>
                @endif
            </section>
        </div>
    </main>

@endsection
