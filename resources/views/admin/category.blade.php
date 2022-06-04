@extends('layouts.admin_layout')
@push('title')
    {{-- <title> Categories - NEPTUNE </title> --}}
@endpush
@push('styles')
    <link rel="stylesheet" href="../CSS/categories.css">
    <link rel="stylesheet" href="../CSS/orders_products.css">
@endpush

@section('content')
    <div class="pop-up-holder">
        <form class="delete-modal">
            <i class="fal fa-exclamation-circle"></i>
            <p class="deleteMessage"></p>
            <div class="buttons">
                <button class="deleteBtn" type="submit">Yes</button>
                <button class="cancel">Cancel</button>
            </div>
        </form>
    </div>
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
                        <h2 class=" title-message"> {{ $category->name }} </h2>
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
                        <form action=" {{ route('editCategory', $category->id) }} " method="post">
                            @csrf
                            <input type="text" name="name" value=" {{ $category->name }} " id="cat_name"
                                placeholder="Category Name" required>
                            <button type="submit" class="editBtn">Edit Category</button>
                        </form>
                    </div>
                    <!-- List Categories Section -->
                    <h2 class="sub-title">Sub-Categories</h2>
                    <div class="add-new add-new-subcategory">
                        <form action="" method="post">
                            <input type="text" name="name" id="cat_name" placeholder="Sub-Category Name" required>
                            <button type="submit" class="new">New Sub-Category</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="category">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td><a href="category.html">Jackets</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td><a href="category.html">Pants</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#3</td>
                                    <td><a href="category.html">Accessories</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#4</td>
                                    <td><a href="category.html">Pants</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#5</td>
                                    <td><a href="category.html">Shoes</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#6</td>
                                    <td><a href="category.html">Hoodies</a></td>
                                    <td>25 03 2022</td>

                                    <td>
                                        <button type="button" class="deleteBtn" id="deleteBtn"
                                            onclick="confirmDelete('hamma', '1')">
                                            <i class="fal fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
