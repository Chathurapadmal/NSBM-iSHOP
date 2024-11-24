<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, category, name, price, image_url FROM products ORDER BY category, name";
$result = $conn->query($sql);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[$row['category']][] = $row;
}
?>
<html>
<head>
    <title>Product Categories</title>
    <link rel="stylesheet" href="productst.css">
</head>
<body>

<?php foreach ($categories as $category => $products): ?>
    <h2><?php echo htmlspecialchars($category); ?></h2>
    <div class="product-category">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="max-width: 200px;">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p>Price: LKR <?php echo number_format($product['price'], 2); ?></p>
                <a href="product_details.php?id=<?php echo $product['id']; ?>" class="view-more-button">View More</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
</body>
</html>
