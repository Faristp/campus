<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");  // Redirect to login page if not logged in
    exit();
}

// Retrieve user details from the session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
$user_type = $_SESSION["user_type"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Campus Connect, <?php echo $username; ?>!</h2>
    <p>User ID: <?php echo $user_id; ?></p>
    <p>User Type: <?php echo $user_type; ?></p>

    <!-- Add more content based on your requirements -->

    <p><a href="index.php">Logout</a></p>
</body>
</html>
