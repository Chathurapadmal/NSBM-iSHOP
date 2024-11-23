<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$description = $_POST['description'];
$descriptionp = $_POST['descriptionp'];
$price = $_POST['price'];
$image_url = '';    
$category = $_POST['category'];



if (!empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    $image_url = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
}

$sql = "INSERT INTO products (name, description,descriptionp, price, image_url, category) 
        VALUES ('$name', '$description','$descriptionp','$price', '$image_url', '$category')";


if ($conn->query($sql) === TRUE) {
    echo "Product added successfully!";
    echo "<br><a href='add_product.php'>Add Another Product</a>";
    echo "<br><a href='index.php'>View Products</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
