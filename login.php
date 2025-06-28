<?php
include 'conn.php';

session_start(); // Optional: if you want to store session info

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Look up the user
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Check password
    if (password_verify($password, $user['password'])) {
        // Password is correct ✅

        // Optional: store user info in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to home/dashboard
        header("Location: index.html"); // or dashboard.php
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ No user found with that email.";
}

$stmt->close();
$conn->close();
?>
