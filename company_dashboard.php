<?php
session_start();
// Check if the user is a company representative
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "company_representative") {
    header("Location: index.php");
    exit();
}

// Fetch and display jobs posted by the company
// You would typically retrieve this information from your database
$companyId = $_SESSION["company_id"];
// Fetch jobs from the database where company_id matches
// ...

// Fetch and display applicants for each job
// You would typically retrieve this information from your database
// Fetch applicants from the database where job_id matches
// ...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Representative Dashboard</title>
</head>
<body>
    <h2>Welcome, Company Representative <?php echo $_SESSION["username"]; ?>!</h2>

    <!-- Display jobs posted by the company -->
    <h3>Your Posted Jobs</h3>
    <ul>
        <?php foreach ($jobs as $job): ?>
            <li>
                <?php echo $job["title"]; ?>
                <a href="applicants.php?job_id=<?php echo $job["job_id"]; ?>">View Applicants</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Display applicants for each job -->
    <!-- This part would typically be on a separate "applicants.php" page -->

    <p><a href="post_job.php">Post a New Job</a></p>
    <p><a href="index.php">Logout</a></p>
</body>
</html>
