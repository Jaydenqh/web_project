<?php

include 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Product | MiniMart Manager</title>
  <link rel="stylesheet" href="add_product.css">
  <script src="js/script.js"></script> 

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
    <h2>Add New Product</h2>

    <!-- HTML Form -->
    <form action="" method="POST" onsubmit="return validateForm()">
      <label>Product Name:</label><br>
      <input type="text" name="product_name" required><br><br>

      <label>Category:</label><br>
      <input type="text" name="category" required><br><br>

      <label>Price (RM):</label><br>
      <input type="number" step="0.01" name="price" required><br><br>

      <label>Quantity:</label><br>
      <input type="number" name="quantity" required><br><br>

      <label>Supplier:</label><br>
      <input type="text" name="supplier" required><br><br>

      <button type="submit" name="submit">Add Product</button>
    </form>

    <br>
    <a href="landingpage.php">← Back to Home</a>
  </main>
</body>
</html>

<?php
if (isset($_POST['submit'])) {

  $name = $_POST['product_name'];
  $cat = $_POST['category'];
  $price = $_POST['price'];
  $qty = $_POST['quantity'];
  $supplier = $_POST['supplier'];

  $sql = "INSERT INTO products (product_name, category, price, quantity, supplier)
          VALUES ('$name','$cat','$price','$qty','$supplier')";

  if ($conn->query($sql) === TRUE) {
    $quantity_sold = 0;
    $cost          = 100.00;
    $profit        = 0.00;

    
    $sql2 = "INSERT INTO sales (product_name, category, price, quantity_sold, cost, profit)
             VALUES ('$name', '$cat', $price, $quantity_sold, $cost, $profit)";
  }
  
  if ($conn->query($sql2) === TRUE) {
    echo "<script>alert('✅ Product added and sales recorded succesfully!');</script>";
} else { echo "<script>alert('⚠️ Error creating sales record: " . $conn->error . "');</script>"; 
}

}

?>
