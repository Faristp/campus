<?php
session_start();

// Check if the user is a student
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "student") {
    header("Location: index.php");
    exit();
}

// Include your database configuration and connection code (config.php)
require_once("config.php");

// Fetch and display available jobs
$jobs = [];  // Initialize as an empty array

// Modify the query based on your actual database schema
$sql = "SELECT * FROM jobs WHERE posted_date >= NOW()"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;  // Add each row to the $jobs array
    }
}

// No need to close the connection here, as it will be used later in the script

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h2>Welcome, Student <?php echo $_SESSION["username"]; ?>!</h2>

    <!-- Display available jobs -->
    <h3>Available Jobs</h3>
    <ul>
        <?php if (!empty($jobs)): ?>
            <?php foreach ($jobs as $job): ?>
                <li>
                    <?php echo $job["title"]; ?>
                    
                    <?php
                    // Check if the student has applied for this job
                    $appliedSql = "SELECT * FROM applications WHERE job_id = '{$job["job_id"]}' AND student_id = '{$_SESSION["user_id"]}'";
                    $appliedResult = $conn->query($appliedSql);

                    if ($appliedResult->num_rows > 0) {
                        // Student has applied for this job
                        echo "<span style='color: green;'>Applied</span>";
                    } else {
                        // Student has not applied for this job
                        echo "<a href='apply.php?job_id={$job["job_id"]}'>Apply</a>";
                    }
                    ?>
                    
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No available jobs at the moment.</li>
        <?php endif; ?>
    </ul>

    <?php
    // Close the connection when you're done with it
    $conn->close();
    ?>

    <p><a href="index.php">Logout</a></p>
</body>
</html>
