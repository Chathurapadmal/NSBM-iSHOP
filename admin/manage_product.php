<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete_sql->bind_param("i", $delete_id);
    if ($delete_sql->execute()) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $delete_sql->error;
    }
    $delete_sql->close();
}

$sql = "SELECT id, name, price, category FROM products ORDER BY id DESC";
$result = $conn->query($sql);
?>
<html>
<head>
<title>Manage Products</title>
<link rel="stylesheet" href="dashboard.css">
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





<div class="dashboard-container">
    <h1>Manage Products</h1>
    <a href="add_product.php" class="add-button">Add New Product</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>LKR <?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                        <a href="?delete=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
$conn->close();
?>
