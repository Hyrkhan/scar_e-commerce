<?php
include 'conn.php';

// Get and sanitize user input
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hash

// Prepare statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("ssss", $email, $username, $password);

if ($stmt->execute()) {
    header("Location: index.html"); // or index.php
    exit(); // always use exit after redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
