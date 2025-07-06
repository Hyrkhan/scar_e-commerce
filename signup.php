<?php
include 'conn.php';

// ✅ Create users table if it doesn't exist
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createUsersTable);

// ✅ Get and sanitize user input
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$username = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// ✅ Prepare statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO users (email, fullname, password, username, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $email, $fullname, $password, $username, $phone, $address);

if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
