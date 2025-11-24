<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $result = $conn->query("SELECT * FROM sales WHERE id=$id");
  $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
  $name = $_POST['product_name'];
  $cat = $_POST['category'];
  $price = $_POST['price'];
  $qty_sold = $_POST['quantity_sold'];
  $cost = $_POST['cost'];
  $profit = $_POST['profit'];

  $sql = "UPDATE sales
          SET product_name='$name', category='$cat', price='$price', quantity_sold='$qty_sold', cost='$cost', profit='$profit'
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('✅ Product sales updated successfully!'); window.location='sales.php';</script>";
  } else {
    echo "<script>alert('❌ Error updating product sales!');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Update Product Sales| MiniMart Manager</title>
  <link rel="stylesheet" href="CSS/editsales.css">
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
    <h2>✏️ Edit Product Sales</h2>

    <form method="POST">
      <label>Product Sales Name:</label><br>
      <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>"><br><br>

      <label>Category:</label><br>
      <input type="text" name="category" value="<?php echo $row['category']; ?>"><br><br>

      <label>Price (RM):</label><br>
      <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>"><br><br>

      <label>Quantity Sold:</label><br>
      <input type="number" name="quantity_sold" value="<?php echo $row['quantity_sold']; ?>"><br><br>

      <label>Cost:</label><br>
      <input type="number" step="0.01" name="cost" value="<?php echo $row['cost']; ?>"><br><br>

      <label>Profit:</label><br>
      <input type="number" step="0.01" name="profit" value="<?php echo $row['profit']; ?>"><br><br>

      <button type="submit" name="update">Save Changes</button>
    </form>

    <br>
    <a href="sales.php">← Back to Product Sales</a>
  </main>
</body>
</html>