<header class="nav-bar">
    <div class="container">
        <div class="top-menu">
            <div class="c-info">
                <span> <i class="fal fa-user-headset"></i> support@neptune.com</span>
                <span> <i class="fal fa-phone-alt"></i> +216 20 000 000</span>
            </div>
            <div class="login-register">
                <a href="" class="main">Login</a>
                <a href="" class="main">Register</a>
            </div>
        </div>
        <a href="home.html">
            <h2 class="logo pointer ff-elmessiri main">NEPTUNE</h2>
        </a>

        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class=" {{ request()->is('/') ? 'active' : '' }} "> <i
                            class="fal fa-home"></i> <span>Home</span>
                    </a></li>
                <li><a href=" {{ route('collection') }} " class=" {{ request()->is('collection*') ? 'active' : '' }} ">
                        <i class="fal fa-tshirt"></i> <span>Collection</span> </a></li>
                <li><a href=""> <i class="fal fa-tshirt"></i> <span>About</span> </a></li>
                <li><a href=""> <i class="fal fa-envelope"></i> <span>Contact</span> </a></li>
                <li><a href=""> <i class="fal fa-shopping-cart"></i> <span>Cart</span> </a></li>
            </ul>
        </nav>
    </div>
</header>
