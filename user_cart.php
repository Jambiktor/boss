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
    <link rel="stylesheet" href="css\cartt.css" />

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
                            <li>
                                <form action="user_profile.php" method="post"><button>Profile</button></form>
                            </li>
                            <li>
                                <form action="logout.php" method="post"><button type="submit"
                                        name="logout">Logout</button></form>
                            </li>
                        </div>

                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <div id="container" class="rounded container-fluid-sm container-md d-flex flex-column mb-3 mt-3 p-3"
        style="background-color: white;">
        <?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM order_table WHERE status = 'cart' AND user_id = $user_id ORDER BY order_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0):
    ?>
        <div id="select_all"
            class="container rounded border p-2 mb-2 ps-2 d-flex justify-content-end align-items-center">

            <div class="w-100 container p-0 d-flex align-items-center" style="background-color: ;">
                <div class="w-100 me-2 d-flex flex-column align-items-end justify-content-end">
                    <?php
                    $total = 0;
                    while ($row = $result->fetch_assoc()): 
                    $total += $row['price'];
                        
                    ?>
                    <?php endwhile; ?>
                    <div>
                        <p class="m-0">Total</p>
                    </div>
                    <div>
                        <h5 id="price" class="m-0">₱ <?php echo $total; ?></h5>
                    </div>
                </div>
                <form id="checkoutForm" action="user_checkout_items.php" method="post">
                    <input type="hidden" name="selected_items" id="selected_items">
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                    <?php endwhile; ?>
                    <div class="">
                        <button id="check_out" class="btn btn-danger rounded m-0 p-auto py-2 text-nowrap">Check
                            Out</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        $result->data_seek(0);
        while ($item = $result->fetch_assoc()): ?>
        <div class="w-100 cart_item rounded border p-2 mb-1 d-flex justify-content-between" style="background-color:;">
            <div class="w-100 d-flex align-items-start justify-content-start">

                <div class="product_image rounded">
                    <img class="rounded" src="product-images/<?php echo $item['image_file']; ?>" alt="Product Image"
                        style="width: 90px; height: 90px;">
                </div>
                <div class="product_description m-0 ms-2" style="background-color: ;">
                    <div class="d-flex">
                        <h5 class=""><?php echo $item['product_name']; ?></h5>
                        <p class="m-0 ms-2 mt-1"> </p>
                    </div>
                    <div class="product_variation">
                        <p class="m-0"> <?php echo $item['variation'] ?> x <?php echo $item['quantity']; ?></p>
                        <p class="m-0">Price: ₱ <?php echo number_format($item['price'], 2); ?></p>
                    </div>
                </div>

            </div>
            <div class="edit_delete" style="background-color: ;">
                <div class="delete_button ms-2">
                    <form action="delete-from-cart.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $item['order_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
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
    </div>



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