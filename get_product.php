<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        // Convert keyBenefits to array if it's stored as newline-separated
        $row['keyBenefits'] = explode("\n", $row['keyBenefits']);
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'No ID provided']);
}
$conn->close();
?>