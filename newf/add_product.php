<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form method="post">
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Price:</label><input type="text" name="price" required><br>
    <label>Description:</label><textarea name="description" required></textarea><br>
    <input type="submit" value="Add Product">
</form>