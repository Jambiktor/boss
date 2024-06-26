<?php
include("sessioncheck.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['index']) && filter_var($_POST['index'], FILTER_VALIDATE_INT) !== false) {
        $index = $_POST['index'];
        $order_id = $_POST['order_id'];

        if (isset($_SESSION['cart'][$index])) {
            if (!empty($order_id)) {
                include("connection.php");

                $stmt = $conn->prepare("DELETE FROM order_table WHERE order_id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $order_id);
                    if ($stmt->execute()) {
                        // Successfully deleted from database
                        $stmt->close();
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    } else {
                        // Error executing statement
                        echo "Error: Could not execute statement. " . $stmt->error;
                        exit();
                    }
                } else {
                    // Error preparing statement
                    echo "Error: Could not prepare statement. " . $conn->error;
                    exit();
                }
                $conn->close();
            } else {
                echo "Error: order_id is missing.";
                exit();
            }
        } else {
            echo "Error: Cart index not found.";
            exit();
        }
    } else {
        echo "Error: Invalid index.";
        exit();
    }
    header("Location: user_cart.php");
    exit();
} else {
    header("Location: user_cart.php");
    exit();
}
