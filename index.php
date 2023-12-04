<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <!-- Display error message if set in the session -->
    <?php if (isset($_SESSION["login_error"])): ?>
        <p style="color: red;"><?php echo $_SESSION["login_error"]; ?></p>
        <?php unset($_SESSION["login_error"]); ?>
        <script>
            // Show an alert using JavaScript
            alert("<?php echo $_SESSION["login_error"]; ?>");
        </script>
    <?php endif; ?>

    <form action="login.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</body>
</html>
