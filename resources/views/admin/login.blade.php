<!DOCTYPE html>
<html lang="en" class="">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Neptune</title>
    <!-- main layout -->
    <!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
    <!-- main layout -->
    <link rel="stylesheet" href="/css/login.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../Assets/favicon.png" type="image/x-icon">
    <!-- FontAwesome Library -->
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-form">
            <h2 class="logo">NEPTUNE</h2>
            <div class="errors" id="errors">

            </div>
            @if ($errors->any())
                <div class="errors mb-10">
                    @foreach ($errors->all() as $error)
                        <p class="error-message" id="errorMessage"> {{ $error }} </p>
                    @endforeach
                </div>
            @endif
            <form action=" {{ route('login') }} " method="post" id="adminForm">
                @csrf
                <input type="email" name="email" id="adminEmail" placeholder="E-mail" required>
                <input type="password" placeholder="Password" name="password" id="adminPassword" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="login-form-image">

        </div>
    </div>
    <!-- Including Javascript -->
    <script src="/js/dashboard.js"></script>
    <script>
        let form = document.getElementById('adminForm'),
            email = document.getElementById('adminEmail'),
            passowrd = document.getElementById('adminPassword'),
            errorsHolder = document.getElementById('errors');
        form.addEventListener('submit', function(e) {
            if (email.value == "") {
                e.preventDefault();
                let mailMessage = document.createElement('p');
                mailMessage.setAttribute('class', 'error-message');
                mailMessage.innerHTML = "Please Enter a valid email";
                errorsHolder.appendChild(mailMessage)
            }
            if (passowrd.value == "") {
                e.preventDefault();
                let passwordMessage = document.createElement('p');
                passwordMessage.setAttribute('class', 'error-message');
                passwordMessage.innerHTML = "Please Enter a Password";
                errorsHolder.appendChild(passwordMessage)
            }
        })
    </script>
</body>

</html>
