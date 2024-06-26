<?php
    // include("sessioncheck.php");
    include("connection.php");

    if(isset($_POST['remove'])) {
        // Sanitize input variables
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $option_id = mysqli_real_escape_string($conn, $_POST['option_id']);
        
        // Step 1: Fetch image file name (if needed)
        // Since you're not deleting image files in this scenario, fetching image_file is omitted

        // Step 2: Delete record from 'variants' table
        $deleteOptionQuery = "DELETE FROM option WHERE option_id = '$option_id' AND product_id = '$product_id'";
        
        if(mysqli_query($conn, $deleteOptionQuery)) {
            // Display success message
            echo "<script>alert('Product Option deleted successfully');</script>";

            // Redirect to admin_product.php
            echo "<script>window.location = 'admin_product.php';</script>";
            exit();
        } else {
            // Display error message if deletion fails
            echo "Error deleting record: " . mysqli_error($conn);
            exit();
        }
    }
?>