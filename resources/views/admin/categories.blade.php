@extends('layouts.admin_layout')
@push('title')
    {{-- <title> Categories - NEPTUNE </title> --}}
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush

<div class="pop-up-holder">
    <div class="delete-modal" id="delete_form">
        <i class="fal fa-exclamation-circle"></i>
        <p class="deleteMessage"></p>
        <div class="buttons">
            <button class="deleteBtn" type="submit" id="submit">Yes</button>
            <button class="cancel">Cancel</button>
        </div>
    </div>
</div>

@section('content')
    <div class="main-wrapper">
        <aside id="aside" class="">
            <i class="far fa-times-circle light aside-margin-toggler"></i>
            <a class="logo" href="dashboard.html"> <span class="word-logo">NEPTUNE</span> <span
                    class="letter-logo">N</span></a>

            <div class="aside-links">
                <a href="dashboard.html"> <i class="fal fa-flag"></i> <span>Overview</span></a>
                <a href="orders.html"> <i class="fal fa-cart-arrow-down"></i> <span>Orders</span></a>
                <a href="categories.html" class="active"> <i class="fal fa-list"></i> <span>Categories</span></a>
                <a href="products.html"> <i class="fal fa-tshirt"></i> <span>Products</span></a>
                <a href="statistics.html"> <i class="fal fa-chart-bar"></i> <span>Statistics</span></a>
                <a href="cutomers.html"> <i class="fal fa-user"></i> <span>Customers</span></a>
                <a href="tickets.html"> <i class="fal fa-user-headset"></i> <span>Tickets</span></a>
                <a href="tasks.html"> <i class="fal fa-tasks"></i> <span>Tasks</span></a>
                <a href="settings.html"> <i class="fal fa-cog"></i> <span>Settings</span></a>
                <a href=""> <i class="fal fa-sign-out"></i> <span>Logout</span></a>
            </div>
        </aside>
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
                        <h2 class=" title-message">Categories</h2>
                    </div>
                    <!-- Add Category Section -->
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
                    <div class="add-new">
                        <form action=" {{ route('addCategory') }} " method="post">
                            @csrf
                            <input type="text" name="name" id="cat_name" placeholder="Category Name" required>
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
                                            <td>{{ $category->created_at->format('d/m/y') }} </td>
                                            <td>25</td>
                                            <td>
                                                <form action=" {{ route('deleteCategory', $category->id) }} "
                                                    method="post" id="delete_item" class="delete_item">
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
                    @else
                        <h2 class="empty category">You didn't add Any Category yet</h2>
                        @endif
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
