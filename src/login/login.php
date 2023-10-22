<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login/style.css">
</head>

<body>
    <section>
        <div class="login-page">
            <h3>
                Login Page
            </h3>
            <form action="login/login_controller.php" method="post">
            <div class="input-box">
                <input type="text" title="Username">
                <label>Username</label>
            </div>
            <div class="input-box">
                <input type="password" title="Password">
                <label>Password</label>
            </div>
            <br>
            <input type="submit" value="Login" class= "loginButton">
            </form>
            <div class="register">
                <p>Don't have an account yet?<a href = "#"> Create account</a></p>
            </div>
        </div>
    </section>
</body>

</html>