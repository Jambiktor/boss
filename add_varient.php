<?php 
include("connection.php");

if(isset($_POST['submit'])) {
    $varient_name = mysqli_real_escape_string($conn, $_POST['varient_name']);
    $varient_price = mysqli_real_escape_string($conn, $_POST['varient_price']);
    
    if($_FILES['varient_image']['error'] === 4) {
        echo "<script>alert('Image does not exist.');
        window.location='admin_product.php';
        </script>";
    } else {
        $file_name = $_FILES['varient_image']['name'];
        $file_size = $_FILES['varient_image']['size'];
        $tmpname = $_FILES["varient_image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $file_name);
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension.');
            window.location='admin_product.php';
            </script>";
        } else if($file_size > 2000000) { // 2MB limit
            echo "<script>alert('Image size is too large.');
            window.location='admin_product.php';
            </script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;

            if(move_uploaded_file($tmpname, 'product-images/' . $newImageName)) {
                $query = "INSERT INTO product_variants (varient_name, varient_image, varient_price) VALUES ('$varient_name', '$newImageName', '$varient_price')";
                
                if(mysqli_query($conn, $query)) {
                    echo "<script>
                        alert('Product uploaded successfully.');
                        window.location='admin_product.php';
                        </script>";
                } else {
                    echo "<script>
                        alert('Failed to upload product.');
                        window.location='admin_product.php';
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Failed to move uploaded file.');
                    window.location='admin_product.php';
                    </script>";
            }
        }
    }
}

$conn->close();
?>
