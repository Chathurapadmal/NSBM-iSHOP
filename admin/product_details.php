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
$sql = $conn->prepare("SELECT name, description, price, specifications, colors, image_url FROM products WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$sql->bind_result($name, $description, $price, $specifications, $colors, $image_url);
$sql->fetch();

$colors = explode(',', $colors); 
?>
<html>
<head>
    <link rel="stylesheet" href="product_details.css">
</head>
<body>


<div class="container">
    <div class="product-info">
        <div class="left-column">
            <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Product Image">
        </div>
        <div class="right-column">
            <h2><?php echo htmlspecialchars($name); ?></h2>
            <div class="product-specs">
                <p><strong>Price:</strong> LKR <?php echo number_format($price, 2); ?></p>
                <p><strong>Specifications:</strong></p>
                <p><?php echo nl2br(htmlspecialchars($specifications)); ?></p>
                <p><strong>Colors:</strong></p>
                <div class="color-samples">
                    <?php foreach ($colors as $color): ?>
                        <span style="background-color: <?php echo htmlspecialchars($color); ?>;"></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="buttons">
                <form method="POST" action="order_page.php">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit">Buy Now</button>
                </form>

                <form method="POST" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($name); ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
        </div>
    </div><br>
    </div>
    <div class="description">
        <p><strong>Description:</strong></p>
        <p><?php echo nl2br(htmlspecialchars($description)); ?></p>
    </div>

</div>


</body>
</html>
<?php
$sql->close();
$conn->close();
?>
