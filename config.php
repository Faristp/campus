<?php
$host = "localhost";
$username = "root";
$password = "password";
$database = "campus_connect";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
