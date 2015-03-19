<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div class="loginForm">
        <h3>Login</h3>
        <form action= "./php/validate_login.php" method="post">
            Email: <input type="text" name="email" value="rbierman@trinity.edu"><br>
            Password: <input type="password" name="password" value="lolol"><br>
            <input type="submit" value="Login">
        </form>
    </div>

    <a href="register.php"> Register</a>

</body>
</html>