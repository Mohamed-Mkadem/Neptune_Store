<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Neptune</title>
    <link rel="shortcut icon" href="/Assets/favicon.png" type="image/x-icon">
    <!-- Css  -->
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
    <!-- FontAwesome Library -->
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">
</head>

<body>
    <div class="main-wrapper">
        <div class="error-holder">
            <h1 class="error-number main ff-elmessiri">404</h1>
            <p class="error-message">URL Not Found</p>
            @auth
                @if (Auth::user()->role == 'admin')
                    <a href=" {{ route('dashboard') }} " class="cta">Dashboard</a>
                @else
                    <a href=" {{ route('home') }} " class="cta">Home Page</a>
                @endif
            @endauth
            @guest
                <a href=" {{ route('home') }} " class="cta">Home Page</a>
            @endguest

        </div>
    </div>
</body>

</html>
