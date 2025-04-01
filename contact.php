<?php

// DB connection
$host = "localhost";
$username = "root"; // Default XAMPP user
$password = "";     // Default is blank
$dbname = "gillania_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $inquiry = $_POST['inquiry'];
    $message = $_POST['message'];

    // Save to DB
    $stmt = $conn->prepare("INSERT INTO submissions (full_name, email, phone, inquiry_type, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $inquiry, $message);

    if ($stmt->execute()) {
        echo "Submission saved successfully!";
    } else {
        echo "Error saving submission: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
