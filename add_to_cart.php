<?php
header('Content-Type: application/json'); // ✅ Important for correct JS parsing
session_start();
include 'conn.php';

// ✅ Create cart table if it doesn't exist
$createTableSql = "
CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    image VARCHAR(255),
    quantity INT NOT NULL
)";
$conn->query($createTableSql);

// ✅ Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// ✅ Check if all POST variables are set
if (!isset($_POST['product_id'], $_POST['name'], $_POST['price'], $_POST['image'], $_POST['quantity'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing POST data']);
    exit;
}

$product_id = $_POST['product_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$quantity = (int)$_POST['quantity']; // make sure it's an integer

// ✅ Check if product is already in cart
$sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update quantity
    $row = $result->fetch_assoc();
    $newQty = $row['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
    $update->bind_param('iis', $newQty, $user_id, $product_id);
    $update->execute();
} else {
    // Insert new item
    $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, product_name, price, image, quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $insert->bind_param('issssi', $user_id, $product_id, $name, $price, $image, $quantity);
    $insert->execute();
}

echo json_encode(['status' => 'success']);
?>
