<?php
include 'db.php';

$id = $_GET['id'] ?? 0;
if ($id) {
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    $product = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

?>

<form method="post">
    <label>Name:</label><input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    <label>Price:</label><input type="text" name="price" value="<?= $product['price'] ?>" required><br>
    <label>Description:</label><textarea name="description" required><?= $product['description'] ?></textarea><br>
    <input type="submit" value="Update Product">
</form>