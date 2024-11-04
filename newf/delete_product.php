<?php
include 'db.php';

$id = $_GET['id'] ?? 0;
if ($id) {
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}
?>