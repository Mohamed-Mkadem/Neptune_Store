<header>
    <!-- Layout Toggler -->
    <i class="far fa-bars layout-toggler" id="layoutToggler"></i>


    <h3 class="date">{{ date('Y-m-d') }}</h3>



    <div class="top-menu-actions">
        <i class="fal fa-eclipse-alt mode-switcher"></i>
        <a href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
        </a>
    </div>

</header>
