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
    <link rel="stylesheet" href="css\checkout_item8.css" />

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
                                <form action="profile.php" method="post"><button>Profile</button></form>
                            </li>
                            <li>
                                <form action="logout.php" method="post"><button type="submit"
                                        name="logout">Logout</button></form>
                            </li>
                        </div>
                    </ul>
                    <!-- notification -->
                    <button class="btn btn-primary mt-0 me-2" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                            class='bx bxs-notification'></i></button>
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

    <div class="main_body rounded p-2 my-3">



        <div class="cart_container rounded p-2 mt-2">
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start ">
                    <div class="w-100 d-flex align-items-start flex-column">
                        <div class="product_details">
                            <div class="ms-2">
                                <h5>Address Details</h5>
                            </div>
                        </div>
                        <div class="product_description ms-2 mt-1" style="">
                            <p class="m-0">Customer name: </p>
                            <p class="m-0">Phone Number: </p>
                            <p class="m-0">Address: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="cart_container rounded p-2 mt-2">
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start ">
                    <div class="w-100 d-flex align-items-start flex-column">
                        <div class="product_details">
                            <div>
                                <h5>Order ID</h5>
                            </div>
                            <div>
                                <p class="mt-0" style="color: gray;">Completed</p>
                            </div>
                        </div>
                        <div class="product_photo">
                            <img class="rounded" src="images\3.png" alt="">
                            <div class="product_description ms-2 mt-1" style="">
                                <h5>Product Name</h5>
                                <p class="m-0">₱ 00.00</p>
                                <p class="m-0 mt-2">Quantity: 00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start ">
                    <div class="w-100 d-flex align-items-start flex-column">
                        <div class="product_details">
                            <div>
                                <h5>Order ID</h5>
                            </div>
                            <div>
                                <p class="mt-0" style="color: gray;">Completed</p>
                            </div>
                        </div>
                        <div class="product_photo">
                            <img class="rounded" src="images\3.png" alt="">
                            <div class="product_description ms-2 mt-1" style="">
                                <h5>Product Name</h5>
                                <p class="m-0">₱ 00.00</p>
                                <p class="m-0 mt-2">Quantity: 00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart_container rounded p-2 mt-2">
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start ">
                    <div class="w-100 d-flex align-items-start flex-column">
                        <div class="product_details">
                            <div class="ms-2">
                                <h5>Payment</h5>
                            </div>
                        </div>
                        <div class="product_description ms-2 mt-1" style="">
                            <div class="product_total rounded mt-2 p-2">
                                <h4 class="m-0">Total: </h4>
                                <p class=" m-0">Subtotal</p>
                                <p class="price m-0">₱ 00.00</p>
                                <p class=" m-0" style="font-size:14px; color:gray;">Product Name</p>
                                <p class=" m-0" style="font-size:14px; color:gray;">₱ 00.00</p>
                                <p class=" m-0" style="font-size:14px; color:gray;">Product Name</p>
                                <p class=" m-0" style="font-size:14px; color:gray;">₱ 00.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="confirm_buttton">
        <button>Confirm</button>
    </div>
    </div>






</body>

</html>