<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="styles.css">
</head>


<body>

<header>
  <div class="navbar">
    <div class="logo">
      <h1>NSBM <span>iSHOP</span> ADMIN</h1>
    </div>

    <div class="menu-icon">
      <button class="menu-button">
        <i class="menu-icon">☰</i>
      </button>
    
    </div>

    <div class="search-section">
      <input type="text" placeholder="Search your product..." class="search-input">
  <button class="search-btn"><img width="15px"; src="uploads/search.png"></img></button>
    </div>

    <nav class="menu-links">
      <ul>
        <li><a href="add_product.php">Home</a></li>
        <li><a href="manage_products.php">Products</a></li>
        <li><a href="">Orders</a></li>
      </ul>
    </nav>
  </div>
</header>



  <br><br<br><br><br><br><br>
  <div class="form-container">
    <h1>Add Product</h1>
    <form>
      <label for="productName">Product Name:</label>
      <input type="text" id="productName" name="productName" placeholder="Enter product name" required><br>

      <label for="category">Category:</label>
        <select id="category" name="category" required>
          <option value="" disabled selected>Select a category</option>
          <option value="iphone">iPhone</option>
          <option value="macbook">MacBook</option>
          <option value="watch">Watch</option>
          <option value="airpods">AirPods</option>
        </select>
      
      <label for="description">Description:</label>
      <textarea id="description" name="description" placeholder="Enter product description" rows="4" required></textarea>
      
      <label for="price">Price:</label>
      <input type="number" id="price" name="price" placeholder="Enter price" required><br>
      
      <label for="productImage">Product Image:</label>
      <input type="file" id="productImage" name="productImage" accept="image/*"><br>
      
      <button type="submit">Add Product</button>
    </form>
  </div>
</body>
</html>
