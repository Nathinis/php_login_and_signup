<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <form action="login.php" method="post">
        <div class="title">S³ TECH</div>
        <center>
            <div class="container">
                <div class="imgcontainer">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png?f=webp&w=256" alt="Avatar" class="Avatar">
                </div>
                <div class="customer-login">
                    <div class="input-box">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email address as a username" required><br>
                        <label for="password">Password :</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your password" required><br><br>
                </div>
                <button class="submit" type="submit"><b>Login</b></button>
                <br> No Account? <a href="signup.php"> Signup </a>
            </div>
        </center>
    </form>
</body>

</html>