<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productde_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$productde = null;
if ($productde_id > 0) {
    $sql = "SELECT * FROM products WHERE id = $productde_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $productde = $result->fetch_assoc();
    }
}

if (!$productde) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($productde['name']); ?></title>
    <link rel="stylesheet" href="prd.css">
</head>
<body>



<header>
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-section">
          <img src="../images/logo.png" alt="NSBM iShop Logo" class="logo">
        </div>
        
        <div class="search-section">
          <input type="text" placeholder="Search your product..." class="search-input">
			<button class="search-btn"><img width="15px"; src="../images/search.png"></img></button>
        </div>

        <div class="right-sectiont">
          <span class="nsbm-text">NSBM iSHOP</span>
          <span class="icon">🛒</span>
          <span class="icon">👤</span>
        </div>
		<div class="right-sectionb">
			
			  <div class="navbar1">
        <a href="../index.html">Home</a>
        <a href="index.php">Product</a>
        <a href="../contact.html">Contact us</a>
    </div>
        </div>
      </div>
    </div>
  </header>



    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($productde['image_url']); ?>" alt="<?php echo htmlspecialchars($productde['name']); ?>">
        </div>
        <div class="product-details">
            <h1><?php echo htmlspecialchars($productde['name']); ?></h1>
            <p><?php echo htmlspecialchars($productde['description']); ?></p>
            <p>Price: $<?php echo htmlspecialchars($productde['price']); ?></p>
            <div class="product-options">
            </div>
            <div class="product-actions">
                <a href="order.php?product_id=<?php echo $productde_id; ?>" class="btn buy-now">Buy Now</a>
                <button class="btn add-to-cart">Add to Cart</button>
            <p><?php echo htmlspecialchars($productde['$descriptionp']); ?></p>

            </div>
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
