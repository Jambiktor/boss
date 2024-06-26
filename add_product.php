<?php
// Include database connection
include('connection.php');

if (isset($_POST['submit'])) {
    // Get product data
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);

    // Handle product image upload
    $product_image = '';
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $product_image = uploadImage($_FILES['image_file'], 'product-images');
    }

    // Insert product into products table
    $stmt = $conn->prepare("INSERT INTO products (product_name, price, image_file) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $product_name, $product_price, $product_image);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    // Insert variants into variants table
    for ($i = 1; $i <= 4; $i++) {
        $variant_name = mysqli_real_escape_string($conn, $_POST["variant$i"]);
        if (!empty($variant_name)) {
            $variant_image = '';
            if (isset($_FILES["image_file$i"]) && $_FILES["image_file$i"]['error'] === UPLOAD_ERR_OK) {
                $variant_image = uploadImage($_FILES["image_file$i"], 'product-images/variant_image');
            }

            $stmt = $conn->prepare("INSERT INTO variants (product_id, name, image_file) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $product_id, $variant_name, $variant_image);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Insert add-ons into add-ons table
    for ($i = 1; $i <= 4; $i++) {
        $add_on_name = mysqli_real_escape_string($conn, $_POST["Add-on$i"]);
        $add_on_price = mysqli_real_escape_string($conn, $_POST["Add-on-price$i"]);
        if (!empty($add_on_name) && !empty($add_on_price)) {
            $stmt = $conn->prepare("INSERT INTO add_on (product_id, name, price) VALUES (?, ?, ?)");
            $stmt->bind_param("isd", $product_id, $add_on_name, $add_on_price);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Insert options into options table
    for ($i = 1; $i <= 4; $i++) {
        $name = mysqli_real_escape_string($conn, $_POST["option$i"]);
        $price = mysqli_real_escape_string($conn, $_POST["option_price$i"]);
        if (!empty($name) && !empty($price)) {
            $stmt = $conn->prepare("INSERT INTO `option` (product_id, name, price) VALUES (?, ?, ?)");
            $stmt->bind_param("isd", $product_id, $name, $price);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Redirect or display success message
    echo "<script>
          alert('Product added successfully.');
          window.location = 'admin_product.php';
          </script>";
}

function uploadImage($file, $folder) {
    $file_name = $file['name'];
    $file_size = $file['size'];
    $tmpname = $file["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $file_name);
    $imageExtension = strtolower(end($imageExtension));

    if (!in_array($imageExtension, $validImageExtension)) {
        echo "<script>alert('Invalid image extension.');
        window.location='admin_product.php';
        </script>";
        exit();
    } elseif ($file_size > 2000000) {
        echo "<script>alert('Image size is too large.');
        window.location='admin_product.php';
        </script>";
        exit();
    } else {
        $newImageName = uniqid() . '.' . $imageExtension;
        $uploadPath = $folder . '/' . $newImageName;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        if (move_uploaded_file($tmpname, $uploadPath)) {
            return $newImageName;
        } else {
            echo "<script>alert('Failed to upload new image.');
            window.location='admin_product.php';
            </script>";
            exit();
        }
    }
}
?>