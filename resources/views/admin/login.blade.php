<!DOCTYPE html>
<html lang="en" class="">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Neptune</title>
    <!-- main layout -->
    <!-- <link rel="stylesheet" href="../CSS/dashboard.css"> -->
    <!-- main layout -->
    <link rel="stylesheet" href="/CSS/login.css">
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
            <div class="errors">
                <p class="error-message" id="errorMessage"></p>
            </div>
            <form action="" method="post" id="adminForm">
                @csrf
                <input type="email" name="email"  id="adminEmail" placeholder="E-mail">
                <input type="password" placeholder="Password" name="password"  id="adminPassword">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="login-form-image">

        </div>
    </div>
    <!-- Including Javascript -->
    <script src="../JS/dashboard.js"></script>
    <script>
        let form = document.getElementById('adminForm'),
            email = document.getElementById('adminEmail'),
            passowrd = document.getElementById('adminPassword'),
            errorMessage = document.getElementById('errorMessage');
        form.addEventListener('submit', function(e){
            if(email.value == ""){
                e.preventDefault();
                errorMessage.innerHTML = "Please Enter a valid email";
            }
            if(passowrd.value == ""){
                e.preventDefault();
                errorMessage.innerHTML = "Please Enter a valid Password";
                
            }
        })
    </script>
</body>

</html>