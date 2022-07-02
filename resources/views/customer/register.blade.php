<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Neptune</title>
    <link rel="shortcut icon" href="/Assets/favicon.png" type="image/x-icon">
    <!-- Css  -->
    <link rel="stylesheet" href="/css/customer/home.css">
    <!-- FontAwesome Library -->
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">

</head>

<body>
    <div class="register-wrapper">
        <div class="register-holder">
            <h2 class="main ff-elmessiri pointer">NEPTUNE</h2>
            @if ($errors->any())
                <div class="errors fail mb-10">
                    @foreach ($errors->all() as $error)
                        {{-- <p> {{ $error }} </p> --}}
                        <p id="error-message" class="error-message"> {{ $error }} </p>
                    @endforeach
                </div>
            @endif
            <div class="errors">
                <p id="error-message" class="error-message"></p>
            </div>
            <form action=" {{ route('newAccount') }} " method="post" id="sign-up-form">
                @csrf
                <div class="input-field">
                    <i class="fal fa-user"></i>
                    <input type="text" class="input" name="first_name" id="first_name" placeholder="First Name" required >
                </div>
                <div class="input-field">
                    <i class="fal fa-user"></i>
                    <input type="text" class="input" name="last_name" id="last_name" placeholder="Last Name"  required>
                </div>
                <div class="input-field">
                    <i class="fal fa-envelope"></i>
                    <input type="email" class="input" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fal fa-lock"></i>
                    <input type="password" class="input" name="password" id="password" placeholder="Password" required>
                    <i class="fal fa-eye show-password-btn pointer"></i>
                </div>
                <div class="input-field">
                    <i class="fal fa-lock"></i>
                    <input type="password" class="input" name="password_confirmation" id="confirm_password"
                        placeholder="Confirm Password" required>
                    <i class="fal fa-eye show-password-btn pointer"></i>
                </div>
                <button type="submit" class="mb-10">SIGN UP</button>
                <a href="{{ route('login') }}" class="main d-block">Already Have An Account?</a>
            </form>
        </div>
    </div>

    <script src="../js/customer.js"></script>
</body>

</html>
