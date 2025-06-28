
<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['product_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->bind_param('is', $user_id, $product_id);
$stmt->execute();

echo json_encode(['status' => 'success']);
?>