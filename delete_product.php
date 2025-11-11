<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

// Check if ID is in the link
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Run DELETE query
    $sql = "DELETE FROM products WHERE id = $id";

    //  Check result
    if ($conn->query($sql) === TRUE) {
        // Success message + redirect
        echo "<script>alert('🗑️ Product deleted successfully!'); window.location='view_product.php';</script>";
        exit();
    } else {
        echo "<script>alert('❌ Error deleting product: " . $conn->error . "'); window.location='view_product.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('⚠️ No product ID provided.'); window.location='view_product.php';</script>";
    exit();
}
?>