<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product details based on product_id
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$product = null;

if ($product_id > 0) {
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save the order
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $quantity = intval($_POST['quantity']);

    if ($product) {
        // Insert order
        $order_sql = "INSERT INTO orders (customer_name, customer_email, customer_phone) 
                      VALUES ('$customer_name', '$customer_email', '$customer_phone')";
        if ($conn->query($order_sql) === TRUE) {
            $order_id = $conn->insert_id; // Get the inserted order ID

            // Insert order item
            $order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity) 
                               VALUES ($order_id, $product_id, $quantity)";
            $conn->query($order_item_sql);

            echo "Order placed successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Product</title>
</head>
<body>
    <h1>Order Product</h1>
    <?php if ($product): ?>
        <form action="order.php?product_id=<?php echo htmlspecialchars($product_id); ?>" method="POST">
            <h2>Product: <?php echo htmlspecialchars($product['name']); ?></h2>
            <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>

            <label for="customer_name">Name:</label>
            <input type="text" name="customer_name" id="customer_name" required><br><br>

            <label for="customer_email">Email:</label>
            <input type="email" name="customer_email" id="customer_email" required><br><br>

            <label for="customer_phone">Phone:</label>
            <input type="text" name="customer_phone" id="customer_phone" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" required><br><br>

            <button type="submit">Place Order</button>
        </form>
    <?php else: ?>
        <p>Invalid product selected.</p>
    <?php endif; ?>
</body>
</html>
