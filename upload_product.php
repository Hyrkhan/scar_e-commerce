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

// Insert default data only if table is empty
$checkTable = $conn->query("SELECT COUNT(*) as count FROM products");
$row = $checkTable->fetch_assoc();
if ($row['count'] == 0) {
    $insertSQL = "
    INSERT INTO products (productName, productImage, productPrice, productDescription, keyBenefits)
    VALUES
    ('Sky Blue Solid Polyester Satin', './media/img/fabric.jpg', 40.00, 'Elevate your sewing projects with the Sky Blue Solid Polyester Satin.', 'Smooth & Easy to Sew: Glides easily under the machine.'),
    ('Cabana Striped Dinner Plates', './media/img/plate.png', 135.00, 'Crafted from durable, food-safe ceramic or porcelain.', 'Easy to Clean: Dishwasher-safe material makes post-meal cleanup a breeze.'),
    ('Summer Beach Collage Matte Print', './media/img/wall poster.png', 89.00, 'Printed on high-quality matte paper, the artwork delivers soft, beach-inspired vibes.', 'Aesthetic Appeal: The soft summer tones and curated design elevate any space.'),
    ('Stationery Blue Gel Pen (4 pcs)', './media/img/pen.png', 116.00, 'Each pen features a fine-tip point for precision writing and sketching.', 'Smooth Writing: Gel ink glides effortlessly across the page.'),
    ('Three-Sided Ruler (3 pcs)', './media/img/three sided ruler.png', 94.00, 'Made from durable, lightweight plastic or aluminum for long-lasting use.', 'Multi-Angle Design: Each ruler features three sides with distinct measurements.'),
    ('Transparent Sakura Umbrella', './media/img/umbrella 2.webp', 203.00, 'Step into elegance and serenity with the Blue Shade Transparent Sakura Umbrella.', 'UV Protection: Blocks harmful UV rays, making it perfect for sunny days.'),
    ('Shade Blue Highlighter (8 pcs)', './media/img/markers.png', 158.00, 'Highlight with style and clarity using the Shade Blue Highlighter set.', '8 Unique Shades of Blue: Great for organizing notes and boosting creativity.'),
    ('Acrylic Pen Shelf Three Slots', './media/img/acrylic shelf.png', 139.00, 'Keep your workspace clean, stylish, and organized with this acrylic pen shelf.', 'Organized & Accessible: Keeps your most-used tools within easy reach.');
    ";

    $conn->query($insertSQL);
}

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