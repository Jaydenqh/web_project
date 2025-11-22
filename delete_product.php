<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
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