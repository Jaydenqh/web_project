<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $result = $conn->query("SELECT * FROM products WHERE id=$id");
  $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
  $name = $_POST['product_name'];
  $cat = $_POST['category'];
  $price = $_POST['price'];
  $qty = $_POST['quantity'];
  $supplier = $_POST['supplier'];

  $sql = "UPDATE products 
          SET product_name='$name', category='$cat', price='$price', quantity='$qty', supplier='$supplier' 
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('✅ Product updated successfully!'); window.location='view_products.php';</script>";
  } else {
    echo "<script>alert('❌ Error updating product!');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Update Product | MiniMart Manager</title>
  <link rel="stylesheet" href="update.css">
</head>
<body>
  <header>
    <h1>🛒 MiniMart Manager</h1>
    <nav>
      <a href="landingpage.php">Home</a> |
      <a href="add_product.php">Add Product</a> |
      <a href="view_product.php">View Products</a> |
      <a href="sales.php">Product Sales</a> |
      <a href="supplier.php">Suppliers</a> |
      <a href="about.php">About</a>
    </nav>
    <hr>
  </header>

  <main>
    <h2>✏️ Edit Product</h2>

    <form method="POST">
      <label>Product Name:</label><br>
      <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>"><br><br>

      <label>Category:</label><br>
      <input type="text" name="category" value="<?php echo $row['category']; ?>"><br><br>

      <label>Price (RM):</label><br>
      <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>"><br><br>

      <label>Quantity:</label><br>
      <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br><br>

      <label>Supplier:</label><br>
      <input type="text" name="supplier" value="<?php echo $row['supplier']; ?>"><br><br>

      <button type="submit" name="update">Save Changes</button>
    </form>

    <br>
    <a href="view_product.php">← Back to Product List</a>
  </main>
</body>
</html>