@extends('layouts.customer_layout')
@section('title')
    <title> Checkout - NEPTUNE </title>
@endsection

@section('content')
    <div class="container">
        <h2 class="title">Checkout:</h2>
        <div class="checkout-holder ">
            <div class="order-info row-item">
                <h4>Shipping Informations:</h4>
                <form action=" {{ route('newOrder') }} " method="post">
                    @csrf
                    <div class="row">
                        <input type="text" name="address_line_one" id="" placeholder="Address Line 1" required>
                        <input type="text" name="address_line_two" id="" placeholder="Address Line 2">
                    </div>
                    <div class="row">
                        <input type="number" name="postal_code" id="" placeholder="Postal Code" required>
                        <input type="text" name="state" placeholder="State" id="">
                    </div>
                    <div class="row">
                        <input type="text" name="city" placeholder="City" required>

                        <select name="country" id="" required>
                            @foreach (Symfony\Component\Intl\Countries::getNames() as  $country)
                                @if ($country !== 'Israel')
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    {{-- hidden inputs --}}
                    <input type="hidden" name="total" value="{{ (int) $total }}">
                    <p>Payment Method :</p>
                    <div class="d-flex j-c-between a-i-center">
                        <label for="cod" class="pointer">Cash On Delivery
                            <input type="radio" checked name="payment_method" id="cod">
                        </label>
                        @if ($cart->count() > 0)
                            <button type="submit">Place Order</button>
                        @endif
                    </div>
                </form>
            </div>
            <div class="cart-info row-item">
                <div class="d-flex j-c-between a-i-center">
                    <h4>Order Summary:</h4>
                    <a href="{{ route('cart') }}">Edit</a>
                </div>
                @foreach ($cart as $cart_item)
                    <div class="d-flex j-c-between">
                        <p>{{ $cart_item->product->name }} <span>x{{ $cart_item->quantity }}</span></p>
                        <h5>
                            <x-currency :amount="$cart_item->product->price * $cart_item->quantity" />
                        </h5>
                    </div>
                @endforeach

                <div class="d-flex j-c-between total">
                    <p class="total">Total:</p>
                    <h5 class="total">
                        <x-currency :amount="$total" />
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
