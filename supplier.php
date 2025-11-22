<?php
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="supplier.css">
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
    <h2>🏭 Supplier List</h2>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr style="background:#ddd;">
      <th>ID</th>
      <th>Supplier Name</th>
      <th>Contact Number</th>
      <th>Email</th>
      <th>Address</th>
    </tr>

    <?php
    $supplier_result = $conn->query("SELECT * FROM suppliers ORDER BY id ASC");

    if ($supplier_result->num_rows > 0) {
      while ($s = $supplier_result->fetch_assoc()) {
        echo "<tr>
          <td>{$s['id']}</td>
          <td>{$s['supplier_name']}</td>
          <td>{$s['contact_number']}</td>
          <td>{$s['email']}</td>
          <td>{$s['address']}</td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No suppliers found.</td></tr>";
    }
    ?>
  </table>
    <a href="view_product.php"> View Product</a> | 
    <a href="landingpage.php">🏠 Back to Home</a>

</body>
</html>