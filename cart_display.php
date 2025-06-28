<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user_id'])) {
    echo '<div class="cart-item"><div class="item-info"><span class="item-name">You must be logged in to view your cart.</span></div></div>';
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
$cart_html = '';

if ($result->num_rows > 0) {
    while ($item = $result->fetch_assoc()) {
        $price = floatval(preg_replace('/[^\d.]/', '', $item['price']));
        $item_total = $price * $item['quantity'];
        $total += $item_total;
        $cart_html .= '
        <div class="cart-item">
            <div class="item-image-container">
                <img src="'.htmlspecialchars($item['image']).'" alt="'.htmlspecialchars($item['product_name']).'" class="item-image">
            </div>
            <div class="item-info">
                <span class="item-name">'.htmlspecialchars($item['product_name']).'</span>
                <a href="product.html?id='.htmlspecialchars($item['product_id']).'" class="view-details">View Details</a>
            </div>
            <div class="item-price">P '.number_format($price, 2).'</div>
            <div class="item-quantity">
                <span class="quantity">'.intval($item['quantity']).'</span>
            </div>
            <div class="item-actions">
                <button class="remove-item" data-id="'.htmlspecialchars($item['product_id']).'">×</button>
            </div>
        </div>';
    }
} else {
    $cart_html = '<div class="cart-item"><div class="item-info"><span class="item-name">Your cart is empty.</span></div></div>';
}

echo $cart_html;
?>