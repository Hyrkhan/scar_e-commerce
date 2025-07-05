
<?php
include 'conn.php';
$sql = "SELECT * FROM products WHERE id BETWEEN 2 AND 9 ORDER BY id ASC";
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
header('Content-Type: application/json');
echo json_encode($products);
?>