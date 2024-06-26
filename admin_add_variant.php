<?php
include("connection.php");

if (isset($_POST['add_variant'])) {
    $product_id = $_POST['product_id'];
    
    // Validate and process each variant
    $variants = [
        ['name' => $_POST['variant1'], 'image' => $_FILES['image_file1']],
        ['name' => $_POST['variant2'], 'image' => $_FILES['image_file2']],
        ['name' => $_POST['variant3'], 'image' => $_FILES['image_file3']],
    ];
    
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $uploadDir = 'product-images/variant_image/';
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($variants as $variant) {
        $variant_name = $variant['name'];
        $image_file = $variant['image']['name'];
        $image_temp = $variant['image']['tmp_name'];
        $image_error = $variant['image']['error'];
        $image_size = $variant['image']['size'];
        
        if (!empty($variant_name)) {
            $product_image = '';

            if ($image_error === UPLOAD_ERR_OK) {
                $imageExtension = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
                
                if (!in_array($imageExtension, $validImageExtension)) {
                    echo "<script>alert('Invalid image extension for $variant_name.');
                    window.location='admin_product.php';
                    </script>";
                    exit();
                } elseif ($image_size > 2000000) {
                    echo "<script>alert('Image size is too large for $variant_name.');
                    window.location='admin_product.php';
                    </script>";
                    exit();
                } else {
                    $newImageName = uniqid() . '.' . $imageExtension;
                    $uploadPath = $uploadDir . $newImageName;

                    if (move_uploaded_file($image_temp, $uploadPath)) {
                        $product_image = $newImageName;
                    } else {
                        echo "<script>alert('Failed to upload image for $variant_name.');
                        window.location='admin_product.php';
                        </script>";
                        exit();
                    }
                }
            }

            // Insert variant into database
            $sql = "INSERT INTO variants (product_id, name, image_file) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("iss", $product_id, $variant_name, $product_image);
                if (!$stmt->execute()) {
                    echo "<script>alert('Failed to add variant $variant_name.');
                    window.location='admin_product.php';
                    </script>";
                    exit();
                }
                $stmt->close();
            } else {
                echo "<script>alert('Failed to prepare SQL for $variant_name.');
                window.location='admin_product.php';
                </script>";
                exit();
            }
        }
    }

    echo "<script>
          alert('Variants added successfully.');
          window.location = 'admin_product.php';
          </script>";
    exit();
}

$conn->close();
?>