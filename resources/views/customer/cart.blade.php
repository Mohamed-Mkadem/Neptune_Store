@extends('layouts.customer_layout')
@section('title')
    <title> Cart - NEPTUNE </title>
@endsection

@section('content')
    <div class="container">
        <h2 class="title">Awesome, You Have 5 Products On your Cart</h2>

        <div class="cart-holder table-responsive">
            <table>
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    <!-- Start Tr -->
                    <tr>
                        <td>
                            <i class="fal fa-trash remove-product"></i>
                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="75" alt="">
                        </td>
                        <td>
                            <h3 class="name main">Columbia Men Jacket</h3>
                        </td>
                        <td>
                            <div class="quantity-holder">
                                <button class="decBtn">-</button>
                                <input name="number" readonly type="number" class="number" min="1" value="1">
                                <button class="incBtn">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="unit-price">$19.99</p>
                        </td>
                        <td>
                            <p class="total">$19.99</p>
                        </td>
                    </tr>
                    <!-- End Tr -->
                    <!-- Start Tr -->
                    <tr>
                        <td>
                            <i class="fal fa-trash remove-product"></i>
                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="75" alt="">
                        </td>
                        <td>
                            <h3 class="name main">Columbia Men Jacket</h3>
                        </td>
                        <td>
                            <div class="quantity-holder">
                                <button class="decBtn">-</button>
                                <input name="number" readonly type="number" class="number" min="1" value="1">
                                <button class="incBtn">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="unit-price">$19.99</p>
                        </td>
                        <td>
                            <p class="total">$19.99</p>
                        </td>
                    </tr>
                    <!-- End Tr -->
                    <!-- Start Tr -->
                    <tr>
                        <td>
                            <i class="fal fa-trash remove-product"></i>
                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="75" alt="">
                        </td>
                        <td>
                            <h3 class="name main">Columbia Men Jacket</h3>
                        </td>
                        <td>
                            <div class="quantity-holder">
                                <button class="decBtn">-</button>
                                <input name="number" readonly type="number" class="number" min="1" value="1">
                                <button class="incBtn">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="unit-price">$19.99</p>
                        </td>
                        <td>
                            <p class="total">$19.99</p>
                        </td>
                    </tr>
                    <!-- End Tr -->
                    <!-- Start Tr -->
                    <tr>
                        <td>
                            <i class="fal fa-trash remove-product"></i>
                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="75" alt="">
                        </td>
                        <td>
                            <h3 class="name main">Columbia Men Jacket</h3>
                        </td>
                        <td>
                            <div class="quantity-holder">
                                <button class="decBtn">-</button>
                                <input name="number" readonly type="number" class="number" min="1" value="1">
                                <button class="incBtn">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="unit-price">$19.99</p>
                        </td>
                        <td>
                            <p class="total">$19.99</p>
                        </td>
                    </tr>
                    <!-- End Tr -->
                    <!-- Start Tr -->
                    <tr>
                        <td>
                            <i class="fal fa-trash remove-product"></i>
                            <img src="../Assets/Columbia Boys Glennaker Rain Jacket.jpg" width="75" alt="">
                        </td>
                        <td>
                            <h3 class="name main">Columbia Men Jacket</h3>
                        </td>
                        <td>
                            <div class="quantity-holder">
                                <button class="decBtn">-</button>
                                <input name="number" readonly type="number" class="number" min="1" value="1">
                                <button class="incBtn">+</button>
                            </div>
                        </td>
                        <td>
                            <p class="unit-price">$19.99</p>
                        </td>
                        <td>
                            <p class="total">$19.99</p>
                        </td>
                    </tr>
                    <!-- End Tr -->


                </tbody>
            </table>
            <div class="actions">
                <a href="" class="checkout">Checkout</a>
                <p class="total-cost">Total: <span>$99.95</span></p>
            </div>

        </div>

    </div>
@endsection
