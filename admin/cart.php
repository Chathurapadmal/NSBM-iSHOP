<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle Add to Cart action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id; // Add product ID to the cart
    }
    header('Location: cart.php'); // Redirect to the cart page
    exit;
}

// Fetch product details for items in the cart
$cart_items = [];
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', $_SESSION['cart']);
    $cart_query = "SELECT * FROM products WHERE id IN ($ids)";
    $cart_result = $conn->query($cart_query);
    while ($row = $cart_result->fetch_assoc()) {
        $cart_items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="prd.css">
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>
    <div class="cart-container">
        <?php if (empty($cart_items)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <ul class="cart-list">
                <?php foreach ($cart_items as $item): ?>
                    <li class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Product Image">
                        <div>
                            <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                            <p>Price: LKR <?php echo htmlspecialchars($item['price']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
