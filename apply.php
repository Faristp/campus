<?php
session_start();

// Check if the user is a student
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "student") {
    header("Location: index.php");
    exit();
}

// Include your database configuration and connection code (config.php)
require_once("config.php");

// Process the application submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $jobId = $_POST["job_id"];
    $studentId = $_SESSION["user_id"];
    $applicationDate = date("Y-m-d H:i:s");  // Current date and time
    $status = "not_reviewed";  // Initial status

    // Insert the application into the applications table
    $sql = "INSERT INTO applications (job_id, student_id, application_date, status) 
            VALUES ('$jobId', '$studentId', '$applicationDate', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Application successful
        // You can redirect to a success page or display a success message
        // ...

        // Redirect back to the student dashboard
        header("Location: student_dashboard.php");
        exit();
    } else {
        // Application failed
        // You can redirect to an error page or display an error message
        // ...

        // Redirect back to the student dashboard
        header("Location: student_dashboard.php");
        exit();
    }
}

// If the form was not submitted properly, redirect back to the student dashboard
header("Location: student_dashboard.php");
exit();
?>
