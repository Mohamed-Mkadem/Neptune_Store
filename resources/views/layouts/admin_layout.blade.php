<!DOCTYPE html>
<html lang="en" class="">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Dashboard - Neptune</title> --}}
    <!-- main layout -->
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../Assets/favicon.png" type="image/x-icon">

    <!-- FontAwesome Library -->
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">
    @stack('title')
    @stack('styles')
</head>

<body>
    {{-- <div class="pop-up-holder">
        <form class="delete-modal" action=" {{route('deleteCategory')}} " method="post">
            @csrf
            @method('delete')
            <i class="fal fa-exclamation-circle"></i>
            <p class="deleteMessage"></p>
            <input type="hidden" name="id" value="1" id="category_id">
            <div class="buttons">
                <button class="deleteBtn" type="submit">Yes</button>
                <button class="cancel">Cancel</button>
            </div>
        </form>
    </div> --}}

    @yield('content')
    <!-- Including Javascript -->
    <script src="../JS/dashboard.js"></script>
    @stack('script')
</body>

</html>
