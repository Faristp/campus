<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    
    <!-- Display success message if set in the session -->
    <?php if (isset($_SESSION["registration_success"])): ?>
        <p style="color: green;"><?php echo $_SESSION["registration_success"]; ?></p>
        <?php unset($_SESSION["registration_success"]); ?>
    <?php endif; ?>

    <form action="register.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        User Type: <input type="text" name="user_type" required><br>
        <input type="submit" value="Sign Up">
    </form>

    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>
