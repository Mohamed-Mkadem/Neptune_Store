<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="shortcut icon" href="/Assets/favicon.png" type="image/x-icon">
    {{-- Css --}}
    <link rel="stylesheet" href=" {{ asset('css/customer/home.css') }} ">
    {{-- FontAwesome Library --}}
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">

</head>

<body>
    {{-- <div class="cart-message">
        <p> Added To Cart Successfully </p>
    </div> --}}
    @include('customer.components.search_form')

    <div class="main-wrapper home">
        {{-- Hero Section --}}
        @include('customer.components.navBar')

        {{-- Start showcase --}}
        {{-- <div class="showcase collection">
            @yield('showcase_message')
            @yield('showcase_cta')
        </div> --}}
        @yield('showcase_message')
        @section('filter')

            <div class="filter-bar">
            @section('action')
            @endsection
            <div class="options">
                <i class="fal fa-th grid pointer gridLayout"></i>
                <i class="fal fa-list list pointer listLayout"></i>
            </div>
        </div>
    @endsection



    {{-- Start Content --}}


    @yield('content')




    {{-- Start Footer --}}

    <footer>
        <div class="container">
            <div class="home-row footer">
                {{-- Start Col --}}
                <div class="col">
                    <div class="col_item">
                        <h4>Follow Us</h4>
                        <ul>

                            <li> <a href="">Facebook</a> </li>
                            <li> <a href="">TikTok</a> </li>
                            <li> <a href="">Instagram</a> </li>
                            <li> <a href="">Twitter</a> </li>

                        </ul>
                    </div>
                </div>
                {{-- End col --}}
                {{-- Start Col --}}
                <div class="col">
                    <div class="col_item">
                        <h4>Services</h4>
                        <ul>

                            <li> <a href="">About Us</a> </li>
                            <li> <a href="">Support</a> </li>
                            <li> <a href="">Terms & Condition</a> </li>
                            <li> <a href="">Refund Policy</a> </li>

                        </ul>
                    </div>
                </div>
                {{-- End col --}}
                {{-- Start Col --}}
                <div class="col">
                    <div class="col_item">
                        <h4>Quick Links</h4>
                        <ul>

                            <li> <a href=" {{route('cart')}} ">Cart</a> </li>
                            <li> <a href=" {{route('wishlist')}} ">WishList</a> </li>
                            <li> <a href=" {{route('settings')}} ">Contact Us</a> </li>
                            <li> <a href="{{route('faqs')}}">Faq's</a> </li>

                        </ul>
                    </div>
                </div>
                {{-- End col --}}
            </div>

            <div class="copyright">
                &copy; All Rights Reserved | <a href="home.html">NEPTUNE STORE</a>
            </div>


        </div>
    </footer>
</div>

<script src="/js/customer.js"></script>
@stack('script')
</body>

</html>
