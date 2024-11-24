<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    echo "No order ID provided!";
    exit;
}

$order_id = intval($_GET['id']);

$sql = $conn->prepare("
    SELECT 
        orders.id AS order_id, 
        customers.name AS customer_name, 
        customers.phone AS customer_phone, 
        customers.address AS customer_address, 
        customers.email AS customer_email, 
        products.name AS product_name, 
        products.description AS product_description, 
        products.price AS product_price, 
        orders.quantity AS order_quantity, 
        orders.status AS order_status, 
        orders.order_date AS order_date
    FROM orders 
    JOIN customers ON orders.customer_id = customers.id 
    JOIN products ON orders.product_id = products.id 
    WHERE orders.id = ?
");
$sql->bind_param("i", $order_id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows === 0) {
    echo "Order not found!";
    exit;
}

$order = $result->fetch_assoc();
?>

<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="order_details.css"> 
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


    <h1>Order Details</h1>
    <div class="order-details">
        <h2>Order Information</h2>
        <p><strong>Order ID:</strong> <?php echo htmlspecialchars($order['order_id']); ?></p>
        <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($order['order_status']); ?></p>
        
        <h2>Customer Information</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['customer_phone']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($order['customer_address']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($order['customer_email']); ?></p>
        
        <h2>Product Information</h2>
        <p><strong>Product Name:</strong> <?php echo htmlspecialchars($order['product_name']); ?></p>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($order['product_description'])); ?></p>
        <p><strong>Price (per unit):</strong> LKR <?php echo number_format($order['product_price'], 2); ?></p>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($order['order_quantity']); ?></p>
        <p><strong>Total Price:</strong> LKR <?php echo number_format($order['product_price'] * $order['order_quantity'], 2); ?></p>
    </div>
</body>
</html>
<?php
$sql->close();
$conn->close();
?>
