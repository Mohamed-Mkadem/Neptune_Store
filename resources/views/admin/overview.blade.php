@extends('layouts.admin_layout')

@section('content')
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
                    <h2 class=" title-message">Hello Admin</h2>
                    <a href=" {{route('home')}} " target="_blank" class="visit-store">
                        <i class="fal fa-sign-in-alt"></i><span>Visit Store</span>
                    </a>
                </div>




                <!-- Start quick stats section -->
                <div class="quick-stats">
                    <div class="quick-stats-item">
                        <h4>Total Earnings</h4>
                        <p>$210.25k</p>
                        <div class="action-icon">
                            <a href="">View Net Earnings</a>
                            <i class="fal fa-usd-circle"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Orders</h4>
                        <p>1470</p>
                        <div class="action-icon">
                            <a href="">View All Orders</a>
                            <i class="fal fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Products</h4>
                        <p>91</p>
                        <div class="action-icon">
                            <a href="">View All Products</a>
                            <i class="fal fa-tshirt"></i>
                        </div>
                    </div>
                    <div class="quick-stats-item">
                        <h4>Customers</h4>
                        <p>1025</p>
                        <div class="action-icon">
                            <a href="">Manage Customers</a>
                            <i class="fal fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- Start Best Selling -->
                <div class="row ">
                    <div class="row-item">
                        <h4>Best Selling Products</h4>
                        <div class="row-info table-repsonsive">
                            <table>
                                <tbody>
                                    <!-- Start TR -->
                                    <tr>
                                        <td>
                                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="30" alt="">
                                            <div>
                                                <h5 class="product-name"> <a href="">Columbia Jacket</a> </h5>
                                                <span class="added-date">21, 07 2015</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">$157</h5>
                                                <span class="field-name">price</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">225</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End TR -->
                                    <!-- Start TR -->
                                    <tr>
                                        <td>
                                            <img src="../Assets/green.jpg" width="30" alt="">
                                            <div>
                                                <h5 class="product-name"> <a href="">Columbia Green Jacket</a>
                                                </h5>
                                                <span class="added-date">12, 01 2019</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">$225</h5>
                                                <span class="field-name">price</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">98</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End TR -->
                                    <!-- Start TR -->
                                    <tr>
                                        <td>
                                            <img src="../Assets/red.jpg" alt="">
                                            <div>
                                                <h5 class="product-name"> <a href="">Columbia Red Jacket</a> </h5>
                                                <span class="added-date">22, 03 2018</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">$75</h5>
                                                <span class="field-name">price</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">658</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End TR -->
                                    <!-- Start TR -->
                                    <tr>
                                        <td>
                                            <img src="../Assets/Columbia Boys' Powder Lite Hooded Jacket.jpg" alt="">
                                            <div>
                                                <h5 class="product-name"> <a href="">Columbia Hoodie</a> </h5>
                                                <span class="added-date">12, 07 2015</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">$49.9</h5>
                                                <span class="field-name">price</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">525</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End TR -->
                                    <!-- Start TR -->
                                    <tr>
                                        <td>
                                            <img src="../Assets/Amazon Essentials Boys and Toddlers' Light-Weight Water-Resistant Packable Hooded Puffer Coat.jpg"
                                                alt="">
                                            <div>
                                                <h5 class="product-name"> <a href="">Adidas Boys Jacket</a> </h5>
                                                <span class="added-date">21, 07 2020</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">$120</h5>
                                                <span class="field-name">price</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="product-info">300</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End TR -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row-item">
                        <h4>Best Selling Categories</h4>
                        <div class="row-info table-responsive">
                            <table>
                                <tbody>
                                    <!-- Start Row  -->
                                    <tr class="cat-row">
                                        <td>
                                            <h5 class="cat-name">
                                                <a href="">Men</a> / <a href="">Jackets</a>
                                            </h5>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">1478</h5>
                                                <span class="field-name">Orders</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">6000</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End Row -->
                                    <!-- Start Row  -->
                                    <tr class="cat-row">
                                        <td>
                                            <h5 class="cat-name">
                                                <a href="">Men</a> / <a href="">Pants</a>
                                            </h5>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">1402</h5>
                                                <span class="field-name">Orders</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">600</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End Row -->
                                    <!-- Start Row  -->
                                    <tr class="cat-row">
                                        <td>
                                            <h5 class="cat-name">
                                                <a href="">Women</a> / <a href="">Shoes</a>
                                            </h5>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">1378</h5>
                                                <span class="field-name">Orders</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">740</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End Row -->
                                    <!-- Start Row  -->
                                    <tr class="cat-row">
                                        <td>
                                            <h5 class="cat-name">
                                                <a href="">Kids</a> / <a href="">Accessories</a>
                                            </h5>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">908</h5>
                                                <span class="field-name">Orders</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">100</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End Row -->
                                    <!-- Start Row  -->
                                    <tr class="cat-row">
                                        <td>
                                            <h5 class="cat-name">
                                                <a href="">Men</a> / <a href="">Shoes</a>
                                            </h5>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">478</h5>
                                                <span class="field-name">Orders</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="cat-info">360</h5>
                                                <span class="field-name">Stock</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End Row -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
