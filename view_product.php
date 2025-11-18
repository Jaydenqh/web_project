<?php
include 'db_connect.php'; // connect to database
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View Products | MiniMart Manager</title>
  <link rel="stylesheet" href="view.css">
</head>

<body>
  <header>
    <h1>🛒 MiniMart Manager</h1>
    <nav>
      <a href="landingpage.php">Home</a> |
      <a href="add_product.php">Add Product</a> |
      <a href="view_product.php">View Products</a> |
      <a href="sales.php">Product Sales</a> |
      <a href="about.php">About</a>
    </nav>
    <hr>
  </header>

  <main>
    <h2>📋 Product List</h2>

    <table border="1" cellpadding="8" cellspacing="0">
      <tr style="background:#ddd;">
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price (RM)</th>
        <th>Quantity</th>
        <th>Supplier</th>
        <th>Actions</th>
      </tr>

      <?php
      // Run SQL to get all products
      $result = $conn->query("SELECT * FROM products ORDER BY id ASC");

      // If there are rows, display them
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['product_name'] . "</td>";
          echo "<td>" . $row['category'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['quantity'] . "</td>";
          echo "<td>" . $row['supplier'] . "</td>";
          echo "<td>
                  <a href='update_product.php?id=" . $row['id'] . "'>Edit</a> | 
                  <a href='delete_product.php?id=" . $row['id'] . "' onclick='return confirm(\"Delete this product?\")'>Delete</a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='7'>No products found.</td></tr>";
      }
      ?>
    </table>

    <br>
    <a href="add_product.php">➕ Add New Product</a> | 
    <a href="landingpage.php">🏠 Back to Home</a>

  </main>
</body>
</html>
