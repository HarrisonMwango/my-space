<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySpace | Login</title>
    <link rel="stylesheet" href="index.css">
</head>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
</script>


<body>

    <div class="container">
        <div class="login-box">
            <h1>MySpace</h1>
            <p>Your personal cloud space</p>

            <form>
                <div class="input-group">
                    <input type="email" placeholder="Email" required>
                </div>

               <div class="input-group password-group">
                    <input type="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>


                <div class="links">
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit">Login</button>
            </form>

            <div class="register">
                <p>Don't have an account?
                    <a href="registration.html">Register</a>
                </p>
            </div>

            <small>Access your files anywhere, anytime</small>
        </div>
    </div>

</body>
</html>
