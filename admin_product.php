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
        <!-- adding product -->
        <div class="title ps-5 mb-2 mt-2">
            <h4 class="mt-2">Takuzaki Products<i class="bx bxs-hot"></i></h4>
            <!-- Button trigger modal -->
            <button id="add_button" type="button" class="btn btn-danger p-2 ms-2" data-bs-toggle="modal"
                data-bs-target="#add_button_modal">
                <p>Add Product</p>
            </button>
            <!-- Modal -->
            <?php 
                $products = mysqli_query($conn, "SELECT * FROM products");
                while($product = mysqli_fetch_assoc($products)){
                    $product_id = $product['product_id'];

                ?>
            <div class="modal fade" id="add_button_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="add_product.php" method="POST" autocomplete="off" enctype="multipart/form-data">

                            <div class="modal-body">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Product Name"
                                        name="product_name" id="product_name" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Product Price" type="number"
                                        name="price" id="price" required>
                                </div>
                                <!-- Variation  -->
                                <div class="w-100 border border-2 rounded p-3 mb-1">
                                    <h5>Variation</h5>

                                    <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray;">
                                        <button
                                            class="w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                            style="background-color:transparent;" type="button"
                                            data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                            data-bs-target="#add_variant_option">
                                            Add Variants
                                        </button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                        tabindex="-1" id="add_variant_option" aria-labelledby="offcanvasScrollingLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add
                                                variants
                                            </h5>
                                            <button type="button" class="btn-close text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">

                                            <input type="hidden" name="variant_id" id="variant_id"
                                                value="<?php echo $variant_id ?>">
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant1" id="variant1" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file1"
                                                        name="image_file1" accept=".jpeg, .jpeg, .png"
                                                        value="<?php echo $product['image_file']; ?>">
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant2" id="variant2" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file2"
                                                        name="image_file2" accept=".jpeg, .jpeg, .png"
                                                        value="<?php echo $product['image_file']; ?>">
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant3" id="variant3" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file3"
                                                        name="image_file3" accept=".jpeg, .jpeg, .png"
                                                        value="<?php echo $product['image_file']; ?>">
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 4</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant4" id="variant4" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file4"
                                                        name="image_file4" accept=".jpeg, .jpeg, .png"
                                                        value="<?php echo $product['image_file']; ?>">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- Option -->
                                <div class="w-100 border border-2 rounded p-3 mb-1">
                                    <h5>Option</h5>

                                    <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray;">
                                        <button
                                            class="w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                            style="background-color:transparent;" type="button"
                                            data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                            data-bs-target="#add_option">
                                            Add Option
                                        </button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                        tabindex="-1" id="add_option" aria-labelledby="offcanvasScrollingLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Option
                                            </h5>
                                            <button type="button" class="btn-close text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option1" id="option1" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price1" id="option_price1" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option2" id="option2" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price2" id="option_price2" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option3" id="option3" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price3" id="option_price3" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 4</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option4" id="option4" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price4" id="option_price4" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- Add-on  -->
                                <div class="w-100 border border-2 rounded p-3">
                                    <h5>Add-on</h5>

                                    <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray;">
                                        <button
                                            class="w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                            style="background-color:transparent;" type="button"
                                            data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                            data-bs-target="#add_add-on">
                                            Add Add-on
                                        </button>
                                    </div>
                                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                        tabindex="-1" id="add_add-on" aria-labelledby="offcanvasScrollingLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Add-on
                                            </h5>
                                            <button type="button" class="btn-close text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">


                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add-on1" id="Add-on1" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add-on-price1" id="Add-on-price1" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add-on2" id="Add-on2" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add-on-price2" id="Add-on-price2" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add-on3" id="Add-on3" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add-on-price3" id="Add-on-price3" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 4</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add-on4" id="Add-on4" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add-on-price4" id="Add-on-price4" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 mt-2 mb-1">
                                    <h5>Product Image</h5>

                                    <div class="mt-3 mb-1">
                                        <h5>Choose Product Thumbnail</h5>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file" name="image_file"
                                                accept=".jpeg, .jpeg, .png"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit product -->
        <div class="modal fade" id="editproduct<?php echo $product['product_id']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="add-product ">
                            <form action="admin_edit_product_details.php" method="POST" autocomplete="off"
                                enctype="multipart/form-data">
                                <div class="input-group mt-1 mb-1">
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="<?php echo $product['product_id']; ?>">
                                    <input class="form-control w-100 p-2" type="text" name="product_name"
                                        id="product_name" placeholder="<?php echo $product['product_name']; ?>"
                                        value="<?php echo $product['product_name']; ?>">
                                </div>
                                <div class="input-group  mt-1 mb-1">
                                    <input class="form-control w-100 p-2" type="number" name="price" id="price"
                                        placeholder="<?php echo $product['price']; ?>"
                                        value="<?php echo $product['price']; ?>">
                                </div>

                                <div class="mt-2 mb-1">
                                    <h5>Product Image</h5>

                                    <div class="mt-3 mb-1">
                                        <h5>Change Product Thumbnail</h5>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file" name="image_file"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>
                                        <div class="product_image"><img
                                                src="product-images/<?php echo $product['image_file'] ?>" alt=""
                                                class="m w-100"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editproduct" class="btn btn-primary">Edit
                            Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Variants and Add Ons -->
        <div class="modal fade" id="editvariant<?php echo $product['product_id']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- variants -->
                        <div class="w-100 border border-2 rounded p-3 mb-1 ">
                            <h5>Variation</h5>
                            <div class="d-flex gap-1 flex-wrap">
                                <?php
                                    $product_id = $product['product_id'];
                                    $variants = mysqli_query($conn, "SELECT * FROM variants WHERE product_id = $product_id");
                                    while ($variant = mysqli_fetch_assoc($variants)) { ?>
                                <div class="border border-2 rounded gap-2 p-1 d-flex align-items-center">
                                    <img src="product-images\variant_image\<?php echo $variant['image_file'] ?>"
                                        class="d-block rounded m-0" style="height: 30px;">
                                    <p class="m-0"><?php echo $variant['name'] ?></p>
                                    <div class=" remove_button" style="right: 0;">
                                        <form action="delete-variant.php" method="POST"
                                            onsubmit="return confirm('Are you sure you want to remove this variant?');">
                                            <input type="hidden" name="product_id"
                                                value="<?php echo $product['product_id'];?>">
                                            <input type="hidden" name="variant_id"
                                                value="<?php echo $variant['variant_id'];?>">
                                            <button class="rounded p-1 px-2" type="submit" name="remove">X</button>
                                        </form>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded">
                                    <button
                                        class="border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray; height: 40px; width: 40px;" type="button"
                                        data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                        data-bs-target="#add_variant<?php echo $product_id ?>">
                                        +
                                    </button>
                                </div>
                                <!-- adding_variant -->
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="add_variant<?php echo $product_id ?>"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Variant
                                        </h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="admin_add_variant.php" method="POST"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="<?php echo $product['product_id']; ?>">
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant1" id="variant1" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file1"
                                                        name="image_file1" accept=".jpeg, .jpeg, .png">
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant2" id="variant2" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file2"
                                                        name="image_file2" accept=".jpeg, .jpeg, .png">
                                                </div>
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Variant 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="variant3" id="variant3" placeholder="Variant Name"
                                                    aria-describedby="basic-addon1">
                                                <div class="input-group mb-1">
                                                    <input type="file" class="form-control" id="image_file3"
                                                        name="image_file3" accept=".jpeg, .jpeg, .png">
                                                </div>
                                            </div>
                                            <div><button class="btn w-100" type="submit" name="add_variant"
                                                    style="background-color: gray; color: white;">Add Variant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- option  -->
                        <div class="w-100 border border-2 rounded p-3 mb-1">
                            <h5>Option</h5>

                            <div class="d-flex gap-1 flex-wrap">
                                <?php
                                    $product_id = $product['product_id'];
                                    $options = mysqli_query($conn, "SELECT * FROM option WHERE product_id = $product_id ORDER BY price");
                                    while ($option = mysqli_fetch_assoc($options)) { ?>
                                <div class="border border-2 rounded gap-2 p-1 px-2 d-flex align-items-center">
                                    <p class="m-0"><?php echo $option['name'] ?> - ₱ <?php echo $option['price'] ?>.00
                                    </p>
                                    <div class=" remove_button" style="right: 0;">
                                        <form action="delete-option.php" method="POST"
                                            onsubmit="return confirm('Are you sure you want to remove this option?');">
                                            <input type="hidden" name="product_id"
                                                value="<?php echo $product['product_id'];?>">
                                            <input type="hidden" name="option_id"
                                                value="<?php echo $option['option_id'];?>">
                                            <button class="rounded p-1 px-2" type="submit" name="remove">X</button>
                                        </form>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded">
                                    <button
                                        class="border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray; height: 40px; width: 40px;" type="button"
                                        data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                        data-bs-target="#option<?php echo $product_id ?>">
                                        +
                                    </button>
                                </div>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="option<?php echo $product_id ?>"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Option
                                        </h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="admin_add_option.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="<?php echo $product['product_id']; ?>">
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option1" id="option1" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price1" id="option_price1" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option2" id="option2" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price2" id="option_price2" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Option 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="option3" id="option3" placeholder="Option Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="option_price3" id="option_price3" placeholder="Option Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div><button class="btn w-100" type="submit" name="option"
                                                    style="background-color: gray; color: white;">Add
                                                    Option</button></div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add-on -->
                        <div class="w-100 border border-2 rounded p-3 mb-1">
                            <h5>Add-On</h5>

                            <div class="d-flex gap-1 flex-wrap">
                                <?php
                                    $product_id = $product['product_id'];
                                    $add_ons = mysqli_query($conn, "SELECT * FROM add_on WHERE product_id = $product_id");
                                    while ($add_on = mysqli_fetch_assoc($add_ons)) { ?>
                                <div class="border border-2 rounded gap-2 p-1 px-2 d-flex align-items-center">
                                    <p class="m-0"><?php echo $add_on['name'] ?> - ₱ <?php echo $add_on['price'] ?>.00
                                    </p>
                                    <div class=" remove_button" style="right: 0;">
                                        <form action="delete-add-on.php" method="POST"
                                            onsubmit="return confirm('Are you sure you want to remove this add-on?');">
                                            <input type="hidden" name="product_id"
                                                value="<?php echo $product['product_id'];?>">
                                            <input type="hidden" name="add_on_id"
                                                value="<?php echo $add_on['add_on_id'];?>">
                                            <button class="rounded p-1 px-2" type="submit" name="remove">X</button>
                                        </form>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded">
                                    <button
                                        class="border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                        style="background-color: lightgray; height: 40px; width: 40px;" type="button"
                                        data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling"
                                        data-bs-target="#add_on<?php echo $product_id ?>">
                                        +
                                    </button>
                                </div>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="add_on<?php echo $product_id ?>"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Add-on
                                        </h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="admin_add_add-on.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" id="product_id"
                                                value="<?php echo $product['product_id']; ?>">
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 1</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add_on1" id="Add_on1" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add_on_price1" id="Add_on_price2" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 2</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add_on2" id="Add_on2" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add_on_price2" id="Add_on_price2" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div
                                                class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                                <h5>Add-on 3</h5>
                                                <input type="text" class="w-100 form-control rounded my-1"
                                                    name="Add_on3" id="Add_on3" placeholder="Add-on Name"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="w-100 form-control rounded my-1"
                                                    name="Add_on_price3" id="Add_on_price3" placeholder="Add-on Price"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div><button class="btn w-100" type="submit" name="add_on"
                                                    style="background-color: gray; color: white;">Add
                                                    Add-On</button></div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editproduct" class="btn btn-primary">Edit
                            Product</button>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>

        <?php }?>
        <div class="container rounded mb-3 d-flex justify-content-start flex-wrap p-3 gap-2"
            style="background-color: white; ">
            <?php 
            $products = mysqli_query($conn, "SELECT * FROM products");
            while($product = mysqli_fetch_assoc($products)){
        ?>
            <div class="card border border-1" style="width: 18rem;">
                <img src="product-images\<?php echo $product['image_file']?>" class="card-img-top" alt="...">
                <div class="w-100 position-absolute d-flex align-items-end flex-column gap-2 p-2" style=" height: 50%;">
                    <div class=" remove_button" style="right: 0;">
                        <form action="delete-product.php" method="POST"
                            onsubmit="return confirm('Are you sure you want to remove this product?');">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                            <button class="rounded p-1 px-2" type="submit" name="remove">X</button>
                        </form>
                    </div>
                    <div class="edit_button ">
                        <button id="edit_button" type="button" class="btn btn-light " data-bs-toggle="modal"
                            data-bs-target="#editproduct<?php echo $product['product_id']; ?>" style="font-size: 15px;">
                            Edit Product
                        </button>

                    </div>
                    <div class="remove">
                        <button id="edit_variant" type="button" class="btn btn-light text-end" data-bs-toggle="modal"
                            data-bs-target="#editvariant<?php echo $product['product_id']; ?>"
                            style="font-size: 15px;">Manage Variants,<br>
                            Add-Ons, Options</button>
                    </div>

                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bolder"><?php echo $product['product_name']?></h5>
                    <p class="card-text">₱ <?php echo $product['price']?></p>
                    <a href="admin_product_preview.php?product_id=<?php echo $product['product_id']?>">
                        <button class=" w-100
                    btn btn-danger">View Product</button>
                    </a>

                </div>
            </div>
            <?php }?>

        </div>
    </div>
</body>
<footer class="footer" style="">
    <p>asdasdasdasd</p>
</footer>

</html>