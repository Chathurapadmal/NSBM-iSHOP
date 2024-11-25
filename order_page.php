<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id']; 

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_SESSION['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = $conn->prepare("INSERT INTO orders (customer_id, product_id, quantity) VALUES (?, ?, ?)");
    $sql->bind_param("iii", $customer_id, $product_id, $quantity);

    if ($sql->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql->error;
    }
}
?>

<html>
<head>
    <title>Place Order</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="1" min="1" required><br>
        <button type="submit">Submit Order</button>
    </form>
</body>
</html>
