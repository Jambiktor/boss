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
    <link rel="stylesheet" href="css\user_products.css" />
    <style>
    body {
        background-color: lightgray;
    }
    </style>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="place_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Option</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionExample">



                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#cod" aria-expanded="false" aria-controls="cod">
                                    <input type="radio" id="CoD" name="payment_option" value="cod">
                                    <label for="CoD" class="m-0 ms-2">Cash on Delivery(CoD)</label><br>

                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#online" aria-expanded="false" aria-controls="online">
                                    <input type="radio" id="Gcash" name="payment_option" value="Gcash">
                                    <label for="Gcash" class="m-0 ms-2">Online Payment(Gcash)</label><br>

                                </button>
                            </h2>
                            <div id="online" class="accordion-collapse collapse w-100"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body w-100">
                                    <img src="images\gcash_qr.jpg" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="order.php"><button type="button" class="btn btn-primary">Save changes</button></a>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="user_homepage.php">Home</a>
                    <a href="user_about_us.php">About</a>
                    <a href="user_product.php">Products</a>
                    <a href="user_pendings_order.php">Orders</a>
                    <a href="user_cart _pickup.php">Cart</a>
                    <a href="user_contact.php">Contact us</a>
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
                            <li><a class="dropdown-item" href="user_table.php">Users</a></li>
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
        <div class="cart_header rounded p-2 gap-1">
            <a class="rounded py-2 active" href="user_pendings_order.php">
                <p class="m-0 fw-bolder">Pending</p>
            </a>
            <a class="rounded py-2 " href="user_prepairing_order.php">
                <p class="m-0 fw-bolder">Prepairing</p>
            </a>
            <a class="rounded py-2 " href="user_completed_order.php">
                <p class="m-0 fw-bolder">Completed</p>
            </a>
        </div>

        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['id'];
        $sql = "SELECT * FROM order_table WHERE status = 'placed' AND user_id = $user_id GROUP BY order_number ORDER BY order_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
        ?>
        <?php
        $quantity = 0;
        $result->data_seek(0);
        while ($item = $result->fetch_assoc()): 
        $quantity += $item["quantity"];
        ?>
        <?php endwhile; ?>

        <?php
        $result->data_seek(0);
        while ($item = $result->fetch_assoc()): 
        ?>
        <a class="Atags" href="admin_address_payment.php">
            <div class="cart_container rounded p-2 mt-2">
                <div class="cart_item rounded p-2 my-2 mx-2">
                    <div class="w-100 pro duct_id_container justify-content-space-between d-flex align-items-start ">
                        <div class="w-100 d-flex align-items-start flex-column">
                            <div class="product_details d-flex align-items-center" style="background-color: ;">
                                <div>
                                    <h5 class="m-0">Product ID: <?php echo $item['order_number']; ?></h5>
                                </div>
                                <div>
                                    <p class="m-0" style="color: gray;">Waiting for response</p>
                                </div>
                            </div>
                            <div class="product_photo">
                                <img class="rounded" src="product-images/<?php echo $item['image_file']; ?>" alt="">
                                <div class="product_description ms-2 mt-1" style="">
                                    <h5><?php echo $item['product_name'] ?></h5>
                                    <p class="m-0">Total: ₱ <?php echo $item['total']; ?>.00</p>
                                    <p class="m-0 mt-2">Quantity: <?php echo $quantity ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php endwhile; ?>

    </div>
    <?php else: ?>
    <div id="select_all" class="container rounded p-2 mb-2 ps-2 d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center ps-2">
            <input type="checkbox" id="selectAllCheckbox">
            <p class="ms-2 mt-3">Select All</p>
        </div>
        <div class="d-flex align-items-center">
            <div class="me-3 d-flex flex-column align-items-end justify-content-start">
                <p class="m-0">Total</p>
                <h5 id="price" class="m-0">₱ 0.00</h5>
            </div>
            <a href="user_check_out.php"><button id="check_out" class="py-3 p-2 rounded">Check Out</button></a>
        </div>
    </div>
    <div id="empty_cart" class="container rounded p-2">
        <h5>Your cart is empty. Order <a href="user_products.php">here</a>.</h5>
    </div>
    <?php endif; ?>
    <footer class="footer">
        <div class="footer_content">
            <a href="contact.php">Contact us</a>
            <p>1234 Takoyaki Street, Osaka, Japan</p>
            <p>Email: info@takoyaki.jp | Phone: +81 123-456-7890</p>
            <p>&copy; 2024 Takozaki. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>