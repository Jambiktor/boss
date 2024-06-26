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
    <link rel="stylesheet" href="css\admin_product9.css" />

</head>

<body>
    <nav class="nav_bar">

        <button id="offcanvas_focus" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
            aria-controls="offcanvasTop">
            <div class="logo_toggler"><i class='bx bx-menu'></i><img src="images\blacklogo.jpeg" alt=""></div>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasTopLabel">Takozaki<img src="images\blacklogo.jpeg" alt=""></h5>
                <button id="offcanvas_focus" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="tab">
                    <a href="admin.php">Home</a>
                    <a href="admin_about_us.php">About</a>
                    <a href="admin_product.php">Products</a>
                    <a href="admin_pendings_order.php">Orders</a>
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
                    <button class="btn btn-primary mt-0 me-2" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class='bx bxs-bell'></i>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            ...
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <div class="main_body p-2 ">

        <div class="title ps-5 mb-2 mt-2">
            <h4 class="mt-2">Takuzaki Products<i class="bx bxs-hot"></i></h4>
            <!-- Button trigger modal -->
            <button id="add_button" type="button" class="btn btn-primary p-2 ms-2" data-bs-toggle="modal"
                data-bs-target="#add_button_modal">
                <p>Add Product</p>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="add_button_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_product.php" method="POST" autocomplete="off"
                                enctype="multipart/form-data">
                                <label for="product_name">Product Name: </label>
                                <input type="text" name="product_name" id="product_name" required>
                                <label for="price">Price: </label>
                                <input type="number" name="price" id="price" required>
                                <input type="file" name="image_file" accept=".jpeg, .jpeg, .png">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Name</h1>
                        <button id="offcanvas_focus" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 ">
                        <div class="modal_photo">
                            <img src="images\5.png" alt="">
                        </div>
                        <div class="product_title p-2 ps-3">
                            <h5 class="fw-bolder">Product Title - variant</h5>
                            <p>₱ 00.00</p>
                        </div>

                        <div class="variation rounded mt-2 p-2">
                            <div class="variation_title d-flex justify-content-between">
                                <h5 class="fw-bolder ms-2 mt-2 mb-3">Variations</h5>
                                <p class="instruction rounded py-1 px-2 me-2 mt-2" style="font-size: 13px;">Select 1</p>
                            </div>

                            <div class="variation_option px-2">
                                <form>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation1">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation1" name="radios"
                                                value="variation1">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation2">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation2" name="radios"
                                                value="variation2">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation3">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation3" name="radios"
                                                value="variation3">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                            </div>

                        </div>
                        <div class="add_on rounded mt-2 p-2">
                            <div class="add_on_title">
                                <h5 class="fw-bolder ms-2 mt-2 mb-3">Add ons</h5>

                            </div>
                            <div class="add_on_option mt-2 px-2">
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on1">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on1" name="radios"
                                                value="add_on1">
                                            <p class="mt-3 ms-2">Add on 1</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on2">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on2" name="radios"
                                                value="add_on2">
                                            <p class="mt-3 ms-2">Add on 2</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on3">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on3" name="radios"
                                                value="add_on3">
                                            <p class="mt-3 ms-2">Add on 2</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                            </div>
                        </div>
                        <div class="special_instuctions rounded mt-2 p-2">
                            <div class="input-group">
                                <h5>Special Instructions</h5>
                                <textarea class="form-control rounded" aria-label="With textarea"
                                    placeholder="e.g. No mayo" style="width:100%;"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Name</h1>
                        <button id="offcanvas_focus" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 ">
                        <div class="modal_photo">
                            <img src="images\5.png" alt="">
                        </div>
                        <div class="product_title p-2 ps-3">
                            <h5 class="fw-bolder">Product Title - variant</h5>
                            <p>₱ 00.00</p>
                        </div>

                        <div class="variation rounded mt-2 p-2">
                            <div class="variation_title d-flex justify-content-between">
                                <h5 class="fw-bolder ms-2 mt-2 mb-3">Variations</h5>
                                <p class="instruction rounded py-1 px-2 me-2 mt-2" style="font-size: 13px;">Select 1</p>
                            </div>

                            <div class="variation_option px-2">
                                <form>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation1">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation1" name="radios"
                                                value="variation1">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation2">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation2" name="radios"
                                                value="variation2">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>

                                    <label class="variation_label d-flex justify-content-between m-0" for="variation3">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="radio" id="variation3" name="radios"
                                                value="variation3">
                                            <p class="mt-3 ms-2">Variation</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                            </div>

                        </div>
                        <div class="add_on rounded mt-2 p-2">
                            <div class="add_on_title">
                                <h5 class="fw-bolder ms-2 mt-2 mb-3">Add ons</h5>

                            </div>
                            <div class="add_on_option mt-2 px-2">
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on1">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on1" name="radios"
                                                value="add_on1">
                                            <p class="mt-3 ms-2">Add on 1</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on2">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on2" name="radios"
                                                value="add_on2">
                                            <p class="mt-3 ms-2">Add on 2</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                                <form action="">
                                    <label class="add_on_label d-flex justify-content-between m-0" for="add_on3">
                                        <div class="d-flex justify-content-start p-0">
                                            <input class="m-0" type="checkbox" id="add_on3" name="radios"
                                                value="add_on3">
                                            <p class="mt-3 ms-2">Add on 2</p>
                                        </div>
                                        <p class="product_price mt-3">₱ 00.00</p>
                                    </label><br>
                                </form>
                            </div>
                        </div>
                        <div class="special_instuctions rounded mt-2 p-2">
                            <div class="input-group">
                                <h5>Special Instructions</h5>
                                <textarea class="form-control rounded" aria-label="With textarea"
                                    placeholder="e.g. No mayo" style="width:100%;"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $res = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($res)){
        ?>
        <div class="product_container p-2 px-3">
            <div class="product_header rounded  p-2 mb-2">
                <div class="product_name">
                    <h4 class="m-0 ms-1"><?php echo $row['product_name']?> </h4>
                    <p class=" m-0 ms-2 mt-1">₱ <?php echo $row['price']?>.00 -
                        <?php echo $row['price']?>.00</p>
                </div>
                <div class="product_button">

                    <div class="remove_button">
                        <form action="delete-product.php" method="POST"
                            onsubmit="return confirm('Are you sure you want to remove this product?');">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                            <button class="rounded p-1 px-2" type="submit" name="remove">Remove</button>
                        </form>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="add_button_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="add_product.php" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        <label for="varient_name">Product Name: </label>
                                        <input type="text" name="varient_name" id="varient_name" required>
                                        <label for="varient_price">Price: </label>
                                        <input type="number" name="varient_price" id="varient_price" required>
                                        <input type="file" name="varient_image" accept=".jpeg, .jpeg, .png">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="product_item_container py-2">
                <!-- Button trigger modal -->
                <button id="product_modal_id" type="button" class="btn p-0 " data-bs-toggle="modal"
                    data-bs-target="#product_modal">
                    <div class="product_item rounded p-2 me-2 mb-2">
                        <div class="product_image ">
                            <img class="rounded " src="product-images\<?php echo $row['image_file']?>" alt="">
                        </div>
                        <div class="product_description pt-1">
                            <h5 class="m-0 ms-1 fw-bolder"><?php echo $row['product_name']?> - Variant</h5>
                            <p class="product_price m-0 ms-1">₱ <?php echo $row['price']?>.00</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <?php }?>
    </div>
</body>
<footer class="footer">
    <p>asdasdasdasd</p>
</footer>

</html>