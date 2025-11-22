<?php
include 'db_connect.php'; // connect to database
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Product Sales | MiniMart Manager</title>
  <link rel="stylesheet" href="sales.css">
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
    <h2>📋 Product Sales</h2>

    <table border="1" cellpadding="8" cellspacing="0">
      <tr style="background:#ddd;">
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price (RM)</th>
        <th>Quantity Sold</th>
        <th>Cost</th>
        <th>Profit</th>
        <th>Action</th>
      </tr>

      <?php
      // Run SQL to get all products
      $result = $conn->query("SELECT * FROM sales ORDER BY id ASC");
      // If there are rows, display them
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['product_name'] . "</td>";
          echo "<td>" . $row['category'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['quantity_sold'] . "</td>";
          echo "<td>" . $row['cost'] . "</td>";
          echo "<td>" . $row['profit'] . "</td>";
          echo "<td>
                  <a href='editsales.php?id=" . $row['id'] . "'>Edit</a>
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
