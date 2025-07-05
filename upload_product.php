<?php
include 'conn.php';

// Create products table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    productImage VARCHAR(255) NOT NULL,
    productPrice DECIMAL(10,2) NOT NULL,
    productDescription TEXT NOT NULL,
    keyBenefits TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createTableSQL);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $productName = htmlspecialchars($_POST['productName']);
    $productPrice = floatval($_POST['productPrice']);
    $productDescription = htmlspecialchars($_POST['productDescription']);
    $keyBenefits = htmlspecialchars($_POST['keyBenefits']);

    // Handle file upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imageName = basename($_FILES["productImage"]["name"]);
    $targetFile = $targetDir . uniqid() . "_" . $imageName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a real image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO products (productName, productImage, productPrice, productDescription, keyBenefits) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $productName, $targetFile, $productPrice, $productDescription, $keyBenefits);

        if ($stmt->execute()) {
            header("Location: shop.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>