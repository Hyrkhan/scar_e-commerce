<?php
include 'conn.php';

// Get and sanitize user input
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$username = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Prepare statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO users (email, fullname, password, username, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $email, $fullname, $password, $username, $phone, $address);

if ($stmt->execute()) {
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
