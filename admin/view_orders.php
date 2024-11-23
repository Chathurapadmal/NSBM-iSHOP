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

// Fetch all orders
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$orders_result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body style="background-color:white;">
    <h1 style="color:black;">View Orders</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Order Date</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($orders_result->num_rows > 0) {
                while ($order = $orders_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($order['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($order['customer_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($order['customer_email']) . "</td>";
                    echo "<td>" . htmlspecialchars($order['customer_phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($order['order_date']) . "</td>";
                    echo "<td><a href='view_order_details.php?id=" . $order['id'] . "'>View Details</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
