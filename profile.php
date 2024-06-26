<?php
include('connection.php');
include('sessioncheck.php');
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css\profile.css" />

</head>

<body>

<?php

    $sql = "SELECT * FROM usertable WHERE uname='" . $_SESSION['uname'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);


        if (count($_POST) > 0) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $sex = $_POST['sex'];
            $phone = $_POST['phone'];
            $username = $_POST['uname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $zip = $_POST['zip'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $image_file = $_POST['image_file'];

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($conn, "UPDATE usertable SET
            fname='$fname',
            lname='$lname',
            sex='$sex',
            phone='$phone',
            address='$address',
            city='$city',
            province='$province',
            zip='$zip',
            uname='$username',
            email='$email',
            image_file='$image_file',
            password='$hashed_password' WHERE id='" . $_POST['id'] . "'");
            echo "<script>
          alert('Record Successfully modified');
          window.location='profile.php';
          </script>";
        }
        ?>

        <div class="modal fade" id="change_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <form action="update_photo.php" method="post" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                <input type="file" class="form-control" id="image_file" name="image_file" accept=".jpg, .jpeg, .png">
                <label class="input-group-text" for="image_file">Upload</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_photo" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>

                </form>
            </div>
        </div>


    <nav class="nav_bar">

        <button id="offcanvas_focus" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
            aria-controls="offcanvasTop">
            <div class="logo_toggler"><i class='bx bx-menu'></i><img src="images\Logo.jpg" alt=""></div>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasTopLabel">Takozaki<img src="images\Logo.jpg" alt=""></h5>
                <button id="offcanvas_focus" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="tab">
                <a href="admin.php">Home</a>
                <a href="admin_product.php">Products</a>
                <a href="admin_order.php">Orders</a>
                <a href="user_table.php">Users</a>
                <a href="admin_report.php">Report</a>
                <a href="contact.php">Contact us</a>
                </div>
            </div>
        </div>

        <div class="right_body">
            <div class="user_tab">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user">
                            <div class="user_name">
                                <p> <?php echo $_SESSION['uname'] ?> </p>
                            </div>
                            <div class="user_photo">
                            </div>
                        </div>
                    </button>
                    <ul id="dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="dropdown_container">
                            <li>
                                <form action="logout.php" method="post"><button type="submit"
                                        name="logout">Logout</button></form>
                            </li>
                        </div>
                    </ul>
                    <!-- notification -->
                    <button class="btn btn-primary mt-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class='bx bxs-notification'></i></button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                         <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        ...
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main_body rounded p-2 my-3">
    <div class="cart_container rounded p-2 mt-2">
    <h2 class="ms-3"> <p class="card-text">Profile ID: <?php echo $row['id']; ?></p></h2>
    
        <div class="cart_item rounded p-2 my-2 mx-2">
            <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start " >
                <div class=" w-50 d-flex align-items-start flex-column" >
                    <div class="product_photo">
                    <img class="w-100 m-0" src="profile_picture/<?php echo $row['image_file'] ?>" alt="">
                    <button type="button" class="btn btn-primary p-0" data-bs-toggle="modal"
                                data-bs-target="#change_profile">
                                <h1 class="mt-2">+</h1>
                    </div>
                </div>

            <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start " >
            <div class="container ">
                <h2>User Details</h2>
                <form action="setting_update_details.php" method="POST">
                    <div class="row">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="fname" name="fname" required placeholder="First name:"
                                value="<?php echo $row['fname']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <div class="form-group">
                                <input type="text" id="name" name="lname" required placeholder="Last name:"
                                value="<?php echo $row['lname']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-select" id="sex" name="sex" value="<?php echo $row['sex']; ?>">
                                    <option selected><?php echo $row['sex']; ?></option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" required placeholder="Email:"
                        value="<?php echo $row['email']; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="number" id="phone" name="phone" required placeholder="Phone: 09"
                        value="<?php echo $row['phone']; ?>" />
                    </div>
                    <div class="submit_buttton">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>

    </div>
    </div>
    
    <div class="cart_container rounded p-2 mt-2">
    <h2 class="ms-2">Delivery Address</h2>
    <div class="cart_item rounded p-2 my-2 mx-2">
            <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start mt-3" >
                <div class="container">
                <form action="setting_update_delivery_details.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" id="blockLot" name="blockLot"  placeholder="House No./Block/Lot/Phase/Street"
                                value="<?php echo $row['blockLot']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <div class="form-group">
                                <input type="text" id="subdivision" name="subdivision"  placeholder="Subdivision"
                                value="<?php echo $row['subdivision']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="form-group">
                                <input type="text" id="barangay" name="barangay"  placeholder="Barangay"
                                value="<?php echo $row['barangay']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="city" name="city"  placeholder="City"
                                value="<?php echo $row['city']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <div class="form-group">
                                <input type="text" id="province" name="province"  placeholder="Province">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <div class="form-group">
                                <input type="number" id="zip" name="zip"  placeholder="Zip"
                                value="<?php echo $row['zip']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit_buttton">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            </div>





    <div class="cart_container rounded p-2 mt-2">
        <h2 class="ms-2">Username and Password</h2>
        <div class="cart_item rounded p-2 my-2 mx-2">
            <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start " >
            <div class="container">
                <form action="setting_update_account_details.php" method="POST">
                <div class="row">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="uname" name="uname"  placeholder="Username"
                                value="<?php echo $row['uname']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <div class="form-group">
                                <input type="password" id="password" name="password"  placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit_buttton">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

    <?php
    } else {
        echo "User not found.";
    }
    ?>
    

    
    


</body>

</html>