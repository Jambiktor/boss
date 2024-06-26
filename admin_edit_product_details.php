<?php
include("connection.php");

if (isset($_POST['editproduct'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image_file = $_FILES['image_file']['name'];

    // Validate input
    if (!empty($product_id) && !empty($product_name) && !empty($price)) {
        $product_image = '';

        // Handle image upload if there is a new image file
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image_file']['name'];
            $file_size = $_FILES['image_file']['size'];
            $tmpname = $_FILES["image_file"]["tmp_name"];

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
                $uploadPath = 'product-images/' . $newImageName;

                if (!file_exists('product-images')) {
                    mkdir('product-images', 0777, true);
                }

                if (move_uploaded_file($tmpname, $uploadPath)) {
                    $product_image = $newImageName;

                    // Retrieve current image file path
                    $current_image_sql = "SELECT image_file FROM products WHERE product_id=?";
                    if ($current_stmt = $conn->prepare($current_image_sql)) {
                        $current_stmt->bind_param("i", $product_id);
                        $current_stmt->execute();
                        $current_stmt->bind_result($current_image_file);
                        $current_stmt->fetch();
                        $current_stmt->close();

                        // Remove the previous image file from the directory
                        if ($current_image_file && file_exists('product-images/' . $current_image_file)) {
                            unlink('product-images/' . $current_image_file);
                        }
                    }
                } else {
                    echo "<script>alert('Failed to upload new image.');
                    window.location='admin_product.php';
                    </script>";
                    exit();
                }
            }
        }

        // Update product details in the products table
        if ($product_image) {
            $sql = "UPDATE products SET product_name=?, price=?, image_file=? WHERE product_id=?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sdsi", $product_name, $price, $product_image, $product_id);
            }
        } else {
            $sql = "UPDATE products SET product_name=?, price=? WHERE product_id=?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sdi", $product_name, $price, $product_id);
            }
        }

        if ($stmt->execute()) {
            echo "<script>
                  alert('Product details updated successfully.');
                  window.location = 'admin_product.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                  alert('Error: Could not update product details.');
                  window.location = 'admin_product.php';
                  </script>";
            exit();
        }
        $stmt->close();
    } else {
        echo "<script>
              alert('Error: Product Name and Price cannot be empty.');
              window.location = 'admin_product.php';
              </script>";
        exit();
    }
}
$conn->close();
?>