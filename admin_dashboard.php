<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

echo "Welcome, " . $_SESSION['admin_username'] . "!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <link rel="stylesheet" href="admin_dashboard.css">
    <nav>
        <ul>
            <li><a href="add_product.php" type="button">Add Product</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
