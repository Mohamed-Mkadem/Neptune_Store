<aside id="aside" class="">
    <i class="far fa-times-circle light aside-margin-toggler"></i>
    <a class="logo" href="{{ route('dashboard') }}"> <span class="word-logo">NEPTUNE</span> <span
            class="letter-logo">N</span></a>
    <div class="aside-links">
        <a href="{{ route('dashboard') }}" class=" {{ request()->is('dashboard') ? 'active' : '' }} "> <i
                class="fal fa-flag"></i> <span>Overview</span></a>


        <a href="{{ route('orders') }}" class=" {{ request()->is('order*') ? 'active' : '' }} "> <i
                class="fal fa-cart-arrow-down"></i>
            <span>Orders</span></a>


        <a href="{{ route('categories') }}" class=" {{ request()->is('categor*') ? 'active' : '' }} "> <i
                class="fal fa-list"></i> <span>Categories</span></a>




        <a href=" {{ route('products') }} " class=" {{ request()->is('product*') ? 'active' : '' }} ">



            <i class="fal fa-tshirt"></i> <span>Products</span></a>




        <a href="statistics.html"> <i class="fal fa-chart-bar"></i> <span>Statistics</span></a>
        <a href="cutomers.html"> <i class="fal fa-user"></i> <span>Customers</span></a>
        <a href="tickets.html"> <i class="fal fa-user-headset"></i> <span>Tickets</span></a>
        <a href="tasks.html"> <i class="fal fa-tasks"></i> <span>Tasks</span></a>
        <a href="settings.html"> <i class="fal fa-cog"></i> <span>Settings</span></a>
        {{-- For styling purposes i created a logout route that support the get method --}}
        <a href=" {{ route('logout') }} "> <i class="fal fa-sign-out"></i> <span>Logout</span></a>
    </div>

</aside>
