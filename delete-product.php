<?php
// Include session check if required
// include("sessioncheck.php");
include("connection.php");

if (isset($_POST['remove'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    
    // Step 1: Fetch and delete the main product image file
    $query = "SELECT image_file FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error fetching product information: " . mysqli_error($conn);
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Product with ID $product_id not found";
        exit();
    }

    $imageFileName = $row['image_file'];
    $imageFilePath = "product-images/" . $imageFileName;

    if (file_exists($imageFilePath)) {
        if (!unlink($imageFilePath)) {
            echo "Error deleting image file";
            exit();
        }
    }

    // Step 2: Delete the main product record
    $deleteProductsQuery = "DELETE FROM products WHERE product_id = '$product_id'";
    if (!mysqli_query($conn, $deleteProductsQuery)) {
        echo "Error deleting record from the products table: " . mysqli_error($conn);
        exit();
    }

    // Step 3: Delete associated add-ons
    $deleteAddOnQuery = "DELETE FROM add_on WHERE product_id = '$product_id'";
    if (!mysqli_query($conn, $deleteAddOnQuery)) {
        echo "Error deleting add-on records: " . mysqli_error($conn);
        // Proceed even if add-ons deletion fails
    }

    // Step 4: Fetch and delete variant image files
    $query = "SELECT image_file FROM variants WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $variantImageFileName = $row['image_file'];
            $variantImageFilePath = "product-images/variant_image/" . $variantImageFileName;

            if (file_exists($variantImageFilePath)) {
                unlink($variantImageFilePath);
            }
        }
    }

    // Step 5: Delete associated variants
    $deleteVariantsQuery = "DELETE FROM variants WHERE product_id = '$product_id'";
    if (!mysqli_query($conn, $deleteVariantsQuery)) {
        echo "Error deleting variant records: " . mysqli_error($conn);
        // Proceed even if variants deletion fails
    }

    // Redirect or display success message
    echo "<script>
          alert('Product deleted successfully.');
          window.location = 'admin_product.php';
          </script>";
    exit();
}
?>

<!-- Include the rest of the HTML and PHP code for handling product addition if necessary -->