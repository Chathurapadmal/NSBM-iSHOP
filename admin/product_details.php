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
    <link rel="stylesheet" href="nav_footer.css">
    <link rel="stylesheet" href="nav.css">

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
          <a href="admin/cart.php" class="icon">🛒</a>
          <span class="icon">👤</span>
        </div>
		<div class="right-sectionb">
			
			  <div class="navbar1">
        <a href="index.html">Home</a>
        <a href="admin/index.php">Product</a>
        <a href="contact.html">Contact us</a>
    </div>
        </div>
      </div>
    </div>
</header>



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
</html>
<?php
$sql->close();
$conn->close();
?>
