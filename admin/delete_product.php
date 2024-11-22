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

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_products.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
