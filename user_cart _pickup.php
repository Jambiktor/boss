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

    <div class="main_body rounded p-2 my-3">
        <div class="cart_header rounded p-2">
            <a class="rounded py-2 me-2 " href="user_cart.php">
                <p class="m-0 fw-bolder">Delivery</p>
            </a>
            <a class="rounded py-2 active" href="user_cart _pickup.php">
                <p class="m-0 fw-bolder">Pick Up</p>
            </a>
        </div>
        <div class="cart_container rounded p-2 mt-2">
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="d-flex align-items-start justify-content-start">
                    <div class="product_photo">
                        <img class="rounded" src="images\3.png" alt="">
                    </div>
                    <div class="product_description ms-2 mt-1" style="">
                        <h5>Product Name</h5>
                        <p class="m-0">₱ 00.00</p>
                        <p class="m-0 mt-2">Quantity: 00</p>
                    </div>
                </div>
                <div class="product_buttons">
                    <button class="rounded mb-1" style="background:red;">Remove</button>
                    <button class="rounded " style="background:darkgray;">Edit</button>
                </div>
            </div>
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="d-flex align-items-start justify-content-start">
                    <div class="product_photo">
                        <img class="rounded" src="images\3.png" alt="">
                    </div>
                    <div class="product_description ms-2 mt-1" style="">
                        <h5>Product Name</h5>
                        <p class="m-0">₱ 00.00</p>
                        <p class="m-0 mt-2">Quantity: 00</p>
                    </div>
                </div>
                <div class="product_buttons">
                    <button class="rounded mb-1" style="background:red;">Remove</button>
                    <button class="rounded " style="background:darkgray;">Edit</button>
                </div>
            </div>
            <div class="cart_item rounded p-2 my-2 mx-2">
                <div class="d-flex align-items-start justify-content-start">
                    <div class="product_photo">
                        <img class="rounded" src="images\3.png" alt="">
                    </div>
                    <div class="product_description ms-2 mt-1" style="">
                        <h5>Product Name</h5>
                        <p class="m-0">₱ 00.00</p>
                        <p class="m-0 mt-2">Quantity: 00</p>
                    </div>
                </div>
                <div class="product_buttons">
                    <button class="rounded mb-1" style="background:red;">Remove</button>
                    <button class="rounded " style="background:darkgray;">Edit</button>
                </div>
            </div>

        </div>
        <div class="product_total rounded mt-2 p-2">
            <div class="total_header px-2 py-1">
                <h4 class="m-0">Total: </h4>
                <h5 class="m-0">₱ 00.00</h5>
            </div>
            <div class="total_details p-2 mt-3">
                <div class="details m-0">
                    <p class=" m-0">Subtotal</p>
                    <p class="price m-0">₱ 00.00</p>
                </div>
                <div class="details m-0 mx-1">
                    <p class=" m-0" style="font-size:14px; color:gray;">Product Name</p>
                    <p class=" m-0" style="font-size:14px; color:gray;">₱ 00.00</p>
                </div>
                <div class="details m-0 mx-1">
                    <p class=" m-0" style="font-size:14px; color:gray;">Product Name</p>
                    <p class=" m-0" style="font-size:14px; color:gray;">₱ 00.00</p>
                </div>

            </div>
            <div class="check_out rounded p-2 mt-4">
                <a href="checkout_items.php"><button class="rounded p-2">Check out items</button></a>
            </div>
        </div>

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