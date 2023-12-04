<?php
session_start();
// Check if the user is a company representative
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "company_representative") {
    header("Location: index.php");
    exit();
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and perform database insertion
    // ...

    // Redirect back to the dashboard or display a success message
    // ...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a New Job</title>
</head>
<body>
    <h2>Post a New Job</h2>

    <!-- Job Posting Form -->
    <form action="post_job.php" method="post">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description" required></textarea><br>
        Requirements: <textarea name="requirements" required></textarea><br>
        <!-- Other job-related fields -->
        <input type="submit" value="Post Job">
    </form>

    <p><a href="company_dashboard.php">Back to Dashboard</a></p>
</body>
</html>
