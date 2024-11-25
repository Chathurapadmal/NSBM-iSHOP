<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT orders.id, customers.name AS customer_name, products.name AS product_name, orders.quantity, orders.status 
        FROM orders 
        JOIN customers ON orders.customer_id = customers.id 
        JOIN products ON orders.product_id = products.id";
$result = $conn->query($sql);
?>

<html>
<head>
    <title>Order Management</title>
    <link rel="stylesheet" href="nav.css">

</head>
<body>



<header>
  <div class="navbar">
    <div class="logo">
      <h2>NSBM <span>iSHOP</span> ADMIN</h2>
    </div>

    <div class="menu-icon">
      <button class="menu-button">
        <i class="menu-icon">☰</i>
      </button>
    
    </div>

    <div class="search-section">
      <input type="text" placeholder="Search your product..." class="search-input">
  <button class="search-btn"><img width="15px"; src="search.png"></img></button>
    </div>

    <nav class="menu-links">
      <ul>
        <li><a href="manage_product.php">Home</a></li>
        <li><a href="add_product.php">Add Products</a></li>
        <li><a href="view_orders.php">Orders</a></li>
        <li><a href="admin_list.php">Admins</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>




    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <a href="view_order_details.php?id=<?php echo $row['id']; ?>">View</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
