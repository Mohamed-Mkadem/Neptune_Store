<!DOCTYPE html>
<html lang="en" class=" boxed">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/dashboard.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/Assets/favicon.png" type="image/x-icon">
    <!-- FontAwesome Library -->
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">
    @stack('title')
    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
        @include('admin.components.sidebar')

        @yield('content')
    </div>
    <!-- Including Javascript -->
    <script src="/JS/dashboard.js"></script>
    @stack('script')
</body>

</html>
