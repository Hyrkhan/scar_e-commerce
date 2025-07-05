
<?php
include 'conn.php';

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP - BLUE CHERRY</title>
    <link rel="stylesheet" href="indexStyles.css">
    <link rel="stylesheet" href="shopStyles.css">
</head>
<body>
    <nav>
        <div>
            <img src="./media/icons and logo/logo.png" alt="Logo">
            <p>BLUE CHERRY</p>
        </div>
        <div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="sell.html">Sell</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="cart.html"><img src="./media//icons and logo/shopping bag.png" alt="Cart"></a></li>
            </ul>
        </div>
    </nav>

    <div class="shop-header">
        <h1>SHOP</h1>
        <p>Enjoy your shopping experience!</p>
    </div>

    <div class="product-grid">
        
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <a href="product.html?id=<?php echo $row['id']; ?>">
                    <!-- <a href="product.html?id=fabric"> -->

                        <img src="<?php echo htmlspecialchars($row['productImage']); ?>" alt="<?php echo htmlspecialchars($row['productName']); ?>">
                        <span><?php echo htmlspecialchars($row['productName']); ?></span>
                        <p>₱ <?php echo number_format($row['productPrice'], 2); ?></p>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <div>
            <ul>
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li>
                    <a href="about.html">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <span>2025 Blue Cherry. All Rights Reserved.</span>
        </div>

        <div>
            <ul>
                <li>
                    <a href="">
                        <img src="./media/icons and logo/fb.png">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="./media/icons and logo/instagram.png">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="./media/icons and logo/twt.png">
                    </a>
                </li>
            </ul>
        </div>
        
    </footer>
</body>
</html>
<?php $conn->close(); ?>