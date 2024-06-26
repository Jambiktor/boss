<?php
include("connection.php");

if (isset($_POST['option'])) {
    $product_id = $_POST['product_id'];
    $name1 = $_POST['option1'];
    $name2 = $_POST['option2'];
    $name3 = $_POST['option3'];
    $price1 = $_POST['option_price1'];
    $price2 = $_POST['option_price2'];
    $price3 = $_POST['option_price3'];

    // Validate and process each add-on
    $addons = [
        ['name' => $name1, 'price' => $price1],
        ['name' => $name2, 'price' => $price2],
        ['name' => $name3, 'price' => $price3],
    ];

    foreach ($addons as $addon) {
        $addon_name = $addon['name'];
        $addon_price = $addon['price'];

        if (!empty($addon_name) && !empty($addon_price)) {
            // Insert add-on into database
            $sql = "INSERT INTO option (product_id, name, price) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("iss", $product_id, $addon_name, $addon_price);
                if (!$stmt->execute()) {
                    echo "<script>alert('Failed to add add-on $addon_name.');
                          window.location='admin_product.php';
                          </script>";
                    exit();
                }
                $stmt->close();
            } else {
                echo "<script>alert('Failed to prepare SQL for $addon_name.');
                      window.location='admin_product.php';
                      </script>";
                exit();
            }
        }
    }

    echo "<script>
          alert('Option added successfully.');
          window.location = 'admin_product.php';
          </script>";
    exit();
}

$conn->close();
?>