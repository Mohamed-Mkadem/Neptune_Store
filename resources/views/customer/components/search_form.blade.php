<form action=" {{ route('formSearch') }} " method="get" class="search-form" id="search-form">

    <i class="fal fa-window-close close pointer" id="close-search-form"></i>
    <div>
        <input type="text" name="target" id="" required placeholder="Type Your Dream">
        <button type="submit" name="search"><i class="fal fa-search pointer main"></i></button>
    </div>
</form>
