<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$categories_query = "SELECT DISTINCT category FROM products";
$categories_result = $conn->query($categories_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products by Category</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
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
    <a href="cart.php" class="icon">🛒</a>
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


    <?php
    if ($categories_result->num_rows > 0) {
        while ($category_row = $categories_result->fetch_assoc()) {
            $category = $category_row['category'];

            $products_query = "SELECT * FROM products WHERE category = '$category'";
            $products_result = $conn->query($products_query);

            echo "<h2>" . htmlspecialchars($category) . "</h2>";
            echo "<div class='product-container'>";
            if ($products_result->num_rows > 0) {
                while ($product_row = $products_result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    if (!empty($product_row['image_url'])) {
                        echo "<img src='" . htmlspecialchars($product_row['image_url']) . "' alt='Product Image'>";
                    }
                    echo "<h2>" . htmlspecialchars($product_row['name']) . "</h2>";
                    echo "<p>" . htmlspecialchars($product_row['description']) . "</p>";
                    echo "<p class='price'>Price: LKR " . htmlspecialchars($product_row['price']) . "</p>";
                    echo "<a href='product.php?id=" . htmlspecialchars($product_row['id']) . "' class='btn'>View Product</a>";

                    echo "</form>";
                    echo "</div>";
                }
                
                    
                }
            } 
          
            echo "</div>";
        }
    else {
        echo "<p>No categories found.</p>";
    }
    ?>

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
