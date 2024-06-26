<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $order_ids = $_POST['order_id'];
    $payment_option = $_POST['payment_option'];
    $total = $_POST['total'];

    // Validate form data
    if (empty($order_ids) || empty($payment_option)) {
        echo "<script>
        alert('Invalid input');
        window.location = 'user_cart.php';
        </script>";
        exit();
    }

    // Get the current time
    $current_time = date('Y-m-d H:i:s');
    $status = "placed";
    $order_number = mt_rand(1000000, 9999999);

    // Prepare the database update statement
    $stmt = $conn->prepare("UPDATE order_table SET status = ?, order_time = ?, payment_option = ?, order_number = ?, total = ? WHERE order_id = ?");

    if (!$stmt) {
        echo "<script>
        alert('Database error');
        window.location = 'user_cart.php';
        </script>";
        exit();
    }

    // Bind parameters and execute for each order
    foreach ($order_ids as $order_id) {
        $stmt->bind_param("sssidi", $status, $current_time, $payment_option, $order_number, $total, $order_id);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "<script>
    alert('Orders updated successfully');
    window.location = 'user_pending_order.php';
    </script>";
    exit();
} else {
    header("Location: user_products.php");
    exit();
}
?>