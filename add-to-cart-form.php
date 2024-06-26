<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $product_id = intval($_POST['product_id']);
    $product_name = trim($_POST['product_name']);
    $image_file = trim($_POST['image_file']);
    $quantity = intval($_POST['quantity']);
    
    // Get the total price from the hidden input
    $sub_total = floatval($_POST['sub_total']);

    // Combine the names into a single variation string
    $variant_name = isset($_POST['variant']) ? $_POST['variant'] : '';
    $option_name = isset($_POST['option']) ? $_POST['option'] : '';
    $add_on_name = isset($_POST['add_on']) ? $_POST['add_on'] : '';
    $variation = trim($variant_name . ', ' . $option_name . ', ' . $add_on_name);

    // Calculate the total price
    $total_price = $sub_total * $quantity;
    $status = 'cart';

    // Prepare and execute the database insert statement
    $stmt = $conn->prepare("INSERT INTO order_table (user_id, product_id, product_name, image_file, total_price, price, quantity, variation, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissddiss", $user_id, $product_id, $product_name, $image_file, $total_price, $sub_total, $quantity, $variation, $status);
    $stmt->execute();
    $stmt->close();

    echo "<script>
    alert('Product added to cart');
    window.location = 'user_cart.php';
    </script>";
    exit();
} else {
    header("Location: user_products.php");
    exit();
}
?>