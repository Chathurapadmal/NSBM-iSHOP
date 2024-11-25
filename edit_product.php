<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();
    $product = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $specifications = $_POST['specifications'];
        $colors = implode(',', $_POST['colors']);
        $category = $_POST['category'];

        $update_sql = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, specifications = ?, colors = ?, category = ? WHERE id = ?");
        $update_sql->bind_param("ssdsssi", $name, $description, $price, $specifications, $colors, $category, $id);

        if ($update_sql->execute()) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $update_sql->error;
        }
    }
}
?>
<html>
<head>
<title>Edit Product</title>
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
    <h1>Edit Product</h1>
    <form action="" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br>
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br>
        <label for="specifications">Specifications:</label>
        <textarea name="specifications" required><?php echo htmlspecialchars($product['specifications']); ?></textarea><br>
        <label for="colors">Colors:</label>
        <input type="text" name="colors[]" value="Red"><br>
        <label for="category">Category:</label>
        <select name="category" required>
            <option value="iPhones" <?php if ($product['category'] === 'iPhones') echo 'selected'; ?>>iPhones</option>
            <option value="MacBooks" <?php if ($product['category'] === 'MacBooks') echo 'selected'; ?>>MacBooks</option>
        </select><br>
        <button type="submit">Update Product</button>
    </form>
</div>
</body>
</html>
