<?php
    // include("sessioncheck.php");
    include("connection.php");

    if(isset($_POST['remove'])) {
        // Sanitize input variables
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $variant_id = mysqli_real_escape_string($conn, $_POST['variant_id']);
        
        // Step 1: Fetch image file name
        $query = "SELECT image_file FROM variants WHERE variant_id = '$variant_id' AND product_id = '$product_id'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            echo "Error fetching product information: " . mysqli_error($conn);
            exit();
        }

        $row = mysqli_fetch_assoc($result);
        
        if(!$row) {
            echo "Product variant with ID $variant_id for product $product_id not found";
            exit();
        }

        $imageFileName = $row['image_file'];
        $imageFilePath = "product-images/variant_image/" . $imageFileName;

        // Step 2: Delete associated image file if it exists
        if(file_exists($imageFilePath)) {
            if(!unlink($imageFilePath)) {
                echo "Error deleting image file";
                exit();
            } else {
                // echo "Image file $imageFileName deleted successfully<br>";
            }
        } else {
            echo "Image file not found<br>";
        }

        // Step 3: Delete record from 'variants' table
        $deleteVariantsQuery = "DELETE FROM variants WHERE variant_id = '$variant_id' AND product_id = '$product_id'";
        if(!mysqli_query($conn, $deleteVariantsQuery)) {
            echo "Error deleting record from the variants table: " . mysqli_error($conn);
            exit();
        } else {
            // echo "Product variant with ID $variant_id deleted from database<br>";
        }

        // Display success message
        echo "<script>alert('Product variant deleted successfully');</script>";

        // Redirect to admin_product.php
        echo "<script>window.location = 'admin_product.php';</script>";
        exit();
    }
?>