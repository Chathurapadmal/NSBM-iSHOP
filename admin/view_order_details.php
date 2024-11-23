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

// Get order ID
$order_id = $_GET['id'];

// Fetch order details
$order_sql = "SELECT * FROM orders WHERE id = $order_id";
$order_result = $conn->query($order_sql);
$order = $order_result->fetch_assoc();

// Fetch order items
$items_sql = "SELECT products.name, order_items.quantity 
              FROM order_items 
              JOIN products ON order_items.product_id = products.id 
              WHERE order_items.order_id = $order_id";
$items_result = $conn->query($items_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablestyle.css">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($order['customer_email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['customer_phone']); ?></p>
    <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>

    <h2>Products</h2>
    <ul>
        <?php
        while ($item = $items_result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($item['name']) . " (Quantity: " . htmlspecialchars($item['quantity']) . ")</li>";
        }
        ?>
    </ul>
</body>
</html>
