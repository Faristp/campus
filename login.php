<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the user is a company representative
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_type = 'company_representative'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Valid login for a company representative
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_type"] = "company_representative";
        $_SESSION["company_id"] = $row["company_id"]; // Assuming you have a column like company_id in the users table
        header("Location: company_dashboard.php");
        exit();
    }

    // Check if the user is a student
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_type = 'student'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Valid login for a student
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_type"] = "student";
        header("Location: student_dashboard.php");
        exit();
    }

    // Invalid login
    $_SESSION["login_error"] = "Invalid username or password";
    header("Location: index.php");
    exit();
}

$conn->close();
?>
