<html>
<head>
    <title>Product Categories</title>
    <link rel="stylesheet" href="productst.css">
    <link rel="stylesheet" href="nav_footer.css">

</head>
<body>


<header>
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-section">
          <img src="images/logo.png" alt="NSBM iShop Logo" class="logo">
        </div>
        
        <div class="search-section">
          <input type="text" placeholder="Search your product..." class="search-input">
			<button class="search-btn"><img width="15px"; src="images/search.png"></img></button>
        </div>

        <div class="right-sectiont">
          <span class="nsbm-text">NSBM iSHOP</span>
          <a href="cart.php" class="icon">🛒</a>
          <span class="icon">👤</span>
        </div>
		<div class="right-sectionb">
			
			  <div class="navbar1">
        <a href="index.html">Home</a>
        <a href="product.html">Product</a>
        <a href="contact.html">Contact us</a>
    </div>
        </div>
      </div>
    </div>
  </header>

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



<div class="bottomdown">
        <table width="100%">
            <tr >
                <th>Store Location</th>
                <th>Mail Us</th>
                <th>Hotline</th>
            </tr>
            <tr>
                <td>
                    Mahenwaththa,<br>
                    Pitipana,<br>
                    Homagama, Sri Lanka.
                </td>
                <td>
                   contact.nsbmishop@gmail.com
                </td>
                <td>
                 0712365464
                </td>
            </tr> 
            <tr>
                <th>Categories</th>
                <th class="middletc">Useful Links</th>
                <th>Useful Link</th>
                
            </tr>
            <tr>
                <td>
                    Iphones<br>
                    MacBooks<br>
                    IPads<br>
                    Iwatch<br>
                    Airpods<br>
                </td>
                <td class="middletc">
                    Terms & Conditions<br>
                        Privacy Policy<br>
                        Delivery
                </td>
                <td>
                    
                        > Contact us<br>
                        > Promotion
                    
                </td>
              
            </tr>
     <tr><td></td>
        <td><div class="smicons"> 
            follow us:<br>
            <a><img src="images/5296499_fb_facebook_facebook logo_icon.png"></a>
            <a><img src="images/5296765_camera_instagram_instagram logo_icon.png"></a>
            <a><img src="images/5296520_bubble_chat_mobile_whatsapp_whatsapp logo_icon.png"></a></div>
        </td>
    <td></td>
    </tr></table>
    <div class="footer"
<footer>

    <p class="copyright">NSBM iSHOP All Rights Reserved</p></div></footer>

</body>



</body>
</html>
