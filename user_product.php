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
    <link rel="stylesheet" href="css\user_products_sell.css" />
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
                                <form action="logout.php" method="post"><button type="submit"
                                        name="logout">Logout</button></form>
                            </li>
                        </div>

                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <div class="main_body p-2 ">

        <div class="title ps-5 mb-2 mt-2">
            <h4 class="mt-2 ms-2">Takuzaki Products<i class="bx bxs-hot"></i></h4>
            <!-- Button trigger modal -->

        </div>

        <div class="container rounded mb-3 d-flex justify-content-start flex-wrap p-3 gap-2"
            style="background-color: white; ">
            <?php 
            $products = mysqli_query($conn, "SELECT * FROM products");
            while($product = mysqli_fetch_assoc($products)){
        ?>
            <div class="card border border-1" style="width: 18rem;">
                <img src="product-images\<?php echo $product['image_file']?>" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title fw-bolder"><?php echo $product['product_name']?></h5>
                    <p class="card-text">₱ <?php echo $product['price']?></p>
                    <a href="user_product_preview.php?product_id=<?php echo $product['product_id']?>">
                        <button class=" w-100
                    btn btn-danger">View Product</button>
                    </a>

                </div>
            </div>
            <?php }?>

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