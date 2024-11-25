<?php
session_start();




if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $_POST['product_id']) {
                $item['quantity'] = max(1, intval($_POST['quantity'])); 
                break;
            }
        }
    } elseif (isset($_POST['remove'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $_POST['product_id']) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']); 
    }
}

if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty!</p>";
    echo '<a href="index.php">Go back to shop</a>';
    exit;
}
?>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
<h1>Your Shopping Cart</h1>
<form method="POST" action="">
    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
<?php
// Display cart
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty!</p>";
    echo '<a href="index.php">Go back to shop</a>';
    exit;
}

$grand_total = 0;
foreach ($_SESSION['cart'] as $item) {
    // Ensure $item is an array with the correct keys
    if (isset($item['price'], $item['quantity'])) {
        $total = $item['price'] * $item['quantity'];
        $grand_total += $total;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td>LKR <?php echo number_format($item['price'], 2); ?></td>
            <td>
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
            </td>
            <td>LKR <?php echo number_format($total, 2); ?></td>
            <td>
                <button type="submit" name="update">Update</button>
                <button type="submit" name="remove">Remove</button>
            </td>
        </tr>
        <?php

}     } 

?>


        <tr>
            <td colspan="3" align="right"><strong>Grand Total:</strong></td>
            <td><strong>LKR <?php echo number_format($grand_total, 2); ?></strong></td>
            <td></td>
        </tr>
    </table>
</form>
<a href="checkout.php">Proceed to Checkout</a>
</body>
</html>
