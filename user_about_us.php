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
    <link rel="stylesheet" href="css\takozakiiii.css" />

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

    <div class="mainbody">
        <img src="images\bg4.jpg" alt="">
        <div class="about">
            <h1 class="welcome">ABOUT US</h1>
        </div>
    </div>

    <div class="intro_about">
        <h1>ABOUT US</h1>
        <p>
            Welcome to Takozaki Takoyaki Shop, where we bring the authentic flavors of Osaka to your plate! <br> Our
            passion is crafting the perfect takoyakicrispy on the outside, tender on the inside,<br> and bursting with
            delicious octopus and savory fillings. Whether you're a takoyaki aficionado or trying it for the first
            time,<br> our family-owned shop offers a warm, friendly atmosphere and a true taste of Japan. <br>Join us
            for a
            delightful culinary experience you won't forget!
        </p>
    </div>



    <div class="milktea_container mt-5 ms-2">
        <h1>Products</h1>
        <div class="title mb-5">
            <h3>MILKTEA</h3>
            <div class="milktea">
                <div class="milktea_variants">
                    <img src="images\mt1.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\mt2.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\mt3.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\mt4.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\mt5.png" alt="">
                </div>
            </div>
        </div>

        <div class="title mb-5">
            <h3>RAMUNE</h3>
            <div class="milktea mt-5">
                <div class="milktea_variants">
                    <img src="images\r1.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\r2.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\r3.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\r4.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\r1.png" alt="">
                </div>
            </div>
        </div>


        <div class="title mb-5">
            <h3>TAKOYAKI</h3>
            <div class="milktea mt-5">
                <div class="milktea_variants">
                    <img src="images\10.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\11.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\12.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\13.png" alt="">
                </div>
                <div class="milktea_variants">
                    <img src="images\14.png" alt="">
                </div>
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