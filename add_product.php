<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $specifications = $_POST['specifications'];
    $colors = implode(',', $_POST['colors']); 
    $category = $_POST['category'];
    $image_url = '';

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_url = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
    }

    $sql = $conn->prepare("INSERT INTO products (name, description, price, specifications, colors, image_url, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssdssss", $name, $description, $price, $specifications, $colors, $image_url, $category);

    if ($sql->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $sql->error;
    }
}
?>
<html>
<head>
<title>Add Product</title>
<link rel="stylesheet" href="productst.css">
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




<center>
<form action="" method="POST" enctype="multipart/form-data" class="cont">
<br><br>
    <h1>Adding New Products</h1>
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br>
    <label for="description" >Description:</label>
    <textarea name="description" required></textarea><br>
    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" required><br>
    <label for="specifications">Specifications:</label>
    <textarea name="specifications" required></textarea><br>
    <label for="colors">Colors:</label>
    <input type="text" name="colors[]" placeholder="e.g., Red" required>
    <input type="text" name="colors[]" placeholder="e.g., Blue">
    <input type="text" name="colors[]" placeholder="e.g., Green"><br>
    <label for="category">Category:</label>
    <select name="category" required>
        <option value="iPhones">iPhones</option>
        <option value="MacBooks">MacBooks</option>
        <option value="iPads">iPads</option>
        <option value="AirPods">AirPods</option>
    </select><br>
    <label for="image">Product Image:</label>
    <input type="file" name="image" required><br>
    <button type="submit">Add Product</button>
    <button> <a href="manage_product.php">Return Dashboard</a> </button>
</form>
</center>
</body>
</html>
