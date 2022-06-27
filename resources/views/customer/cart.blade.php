@extends('layouts.customer_layout')
@section('title')
    <title> Cart - NEPTUNE </title>
@endsection

@section('content')
    <div class="container">
        @if ($cart->count() > 0)
            <h2 class="title">Awesome, You Have {{ $cart->count() }} Products On your Cart</h2>

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
                        @foreach ($cart as $cart_item)
                            <tr>
                                <td>
                                    <a href=" {{ route('removeItem', $cart_item->id) }} "><i
                                            class="fal fa-trash remove-product"></i></a>
                             
                                    <img src=" {{ $cart_item->product->image }} " width="75" alt="">
                                </td>
                                <td>
                                    <h3 class="name main">{{ $cart_item->product->name }}</h3>
                                </td>
                                <td>

                                    <form action=" {{ route('updateCartItem') }} " method="post"
                                        class="d-flex j-c-between a-i-center">
                                        @csrf
                                        <div class="quantity-holder">
                                            <div class="decBtn">-</div>
                                            <input name="quantity" readonly type="number" class="number" min="1"
                                            value="{{ $cart_item->quantity }}">
                                            <div class="incBtn">+</div>
                                            <input type="hidden" name="id" value="{{$cart_item->id}}">
                                        </div>
                                        <button type="submit" class="button"><i class="fal fa-sync-alt"></i></button>
                                    </form>

                                </td>
                                <td>
                                    <p class="unit-price">
                                        <x-currency :amount="$cart_item->product->price" />
                                    </p>
                                </td>
                                <td>
                                    <p class="total">
                                        <x-currency :amount="$cart_item->product->price * $cart_item->quantity" />
                                    </p>
                                </td>
                            </tr>
                            <!-- End Tr -->
                        @endforeach


                    </tbody>
                </table>
                <div class="actions">
                    <a href="{{route('checkout')}}" class="checkout">Checkout</a>
                    <p class="total-cost">Total:
                        <x-currency :amount="$total" />
                    </p>
                </div>
            @else
                <div class="empty-block bg-light">
                    <h2 class="ff-elmessiri main">Your Cart Is Empty</h2>
                    <a href=" {{ route('collection') }} ">Shop Now</a>
                </div>
        @endif

    </div>

    </div>
@endsection
