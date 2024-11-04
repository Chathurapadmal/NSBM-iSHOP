<?php
include 'db.php';

$result = $conn->query("SELECT * FROM products");

echo "<h1>Product List</h1>";
echo "<a href='admin.php'>Admin Dashboard</a><br><br>";

while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. "<br>";
    echo "<a href='edit_product.php?id=" . $row["id"] . "'>Edit</a> | ";
    echo "<a href='delete_product.php?id=" . $row["id"] . "' onclick='return confirm("Are you sure?")'>Delete</a><br><br>";
}
?>