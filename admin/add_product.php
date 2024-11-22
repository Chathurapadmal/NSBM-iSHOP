<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="category">Category:</label>
        <input type="text" name="category" id="category" required><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required><br><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image" id="image"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
