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
    <link rel="stylesheet" href="css\checkout_item9.css" />
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
                            <div id="online" class="accordion-collapse collapse w-100" data-bs-parent="#accordionExample">
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
                            <li><a class="dropdown-item" href="user_table.php">Users</a></li>
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
    <div class="check_out_box rounded p-2 my-3">

        <div class="delivery_details rounded p-3 mb-2">
            <div class="details">
            
                <h5 class="my-2 fw-bolder">Delivery Details</h5>
                <a href="" style="text-decoration:none;"><button class="rounded py-1 px-4">Edit</button></a>
            </div>
            <div class="description ps-2">
                <div class="user_contact">
                    <p class="m-0" style="color: gray;">Customer name - Number(0900000)</p>
                </div>
                <div class="address" style="color: gray;">
                    <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum odio
                        reprehenderit laudantium
                        optio perferendis neque.</p>
                </div>
            </div>
        </div>
        <div class="product_total rounded p-3">
            <h5 class="my-2 fw-bolder">Your order</h5>
            <div class="product py-3">
                <div class="product_item m-0 px-1">
                    <p class="m-0" style="font-size:15px; color: gray;">Quantity x Product Name</p>
                    <p class="m-0" style="font-size:15px; color: gray;">₱ 00.00</p>
                </div>
                <div class="product_item m-0 px-1">
                    <p class="m-0" style="font-size:15px; color: gray;">Quantity x Product Name</p>
                    <p class="m-0" style="font-size:15px; color: gray;">₱ 00.00</p>
                </div>
            </div>

            <div class="my-2">
                <div class="sub_total">
                    <p class="m-0">Subtotal</p>
                    <p class="m-0">₱ 00.00</p>
                </div>
                <div class="sub_total">
                    <p class="m-0">Shipping Fee</p>
                    <p class="m-0">₱ 00.00</p>
                </div>
            </div>
            <div class="total mt-3">
                <h4>Total</h4>
                <h4>₱ 00.00</h4>
            </div>
        </div>
        <div class="place_order rounded p-3 mt-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn rounded py-2 fw-bolder" data-bs-toggle="modal"
                data-bs-target="#place_order">
                Place Order
            </button>
        </div>
    </div>

    <footer class="footer">
        <p>asdasdasdasd</p>
    </footer>
</body>

</html>
