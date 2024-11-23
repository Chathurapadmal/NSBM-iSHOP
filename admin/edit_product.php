<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_url = $product['image_url'];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_url = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
    }

    $update_sql = "UPDATE products SET 
        name = '$name', 
        description = '$description', 
        price = '$price', 
        category = '$category', 
        image_url = '$image_url'
        WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: manage_products.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="description">Description(specs):</label>
        <textarea name="description" id="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>

        <label for="descriptionp">Description (additional):</label>
        <textarea id="descriptionp" name="description" placeholder="Enter product description" rows="4" required></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" required><br><br>

        <label for="category">Category:</label>
        <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($product['category']); ?>" required><br><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image" id="image"><br>
        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Current Image" style="width: 100px;"><br><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
