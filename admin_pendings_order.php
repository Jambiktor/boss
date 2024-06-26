<?php
include('connection.php');
include('sessioncheck.php');
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_order'])) {
    $order_number = $_POST['order_number'];

    $user_id = $_POST['user_id'];

    $description_with_order_number = $description . " Order Number: " . $order_number;


    $sql_update = "UPDATE order_table SET status = 'preparing' WHERE order_number = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("i", $order_number);
    $stmt_update->execute();
    $stmt_update->close();


    header("Location: admin_prepairing_order.php");
    exit();
}
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
        <div class="cart_header rounded p-2">
            <a class="rounded py-2 me-2 active" href="admin_pendings_order.php">
                <p class="m-0 fw-bolder">Pendings</p>
            </a>
            <a class="rounded py-2 " href="admin_prepairing_order.php">
                <p class="m-0 fw-bolder">Prepairing</p>
            </a>
            <a class="rounded py-2 " href="admin_completed_order.php">
                <p class="m-0 fw-bolder">Completed</p>
            </a>
        </div>
    </div>


    <div class="cart_container rounded p-2 mt-2">
        <?php
        $query = "SELECT * FROM order_table WHERE status = 'Placed'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="cart_item rounded p-2 my-2 mx-2">
            <div class="w-100 product_id_container justify-content-space-between d-flex align-items-start">
                <div class="w-100 d-flex align-items-start flex-column">
                    <div class="product_details">
                        <div>
                            <h5>Order id: <?php echo $row['order_number']; ?></h5>
                        </div>
                        <form action="" method="post">
                            <div>
                                <input type="hidden" name="order_number" value="<?php echo $row['order_number']; ?>">
                                <button class="btn btn-success" type="submit" name="confirm_order">Confirm</button>
                            </div>
                        </form>
                    </div>
                    <div class="product_photo">
                        <img class="rounded" src="product-images/<?php echo $row['image_file']; ?>" alt="">
                        <div class="product_description ms-2 mt-1">
                            <h5><?php echo $row['product_name']; ?></h5>
                            <p class="m-0">₱ <?php echo $row['price']; ?></p>
                            <p class="m-0 mt-2">Quantity: <?php echo $row['quantity']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo '<p style="height: 200px;">No products found.</p>';
        }
        $conn->close();
        ?>
    </div>

    <footer class="footer">
        <p>asdasdasdasd</p>
    </footer>
</body>

</html>