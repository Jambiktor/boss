<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css\landinggg.css" />

</head>

<body>
    <nav class="nav_bar">

        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
            aria-controls="offcanvasTop">
            <div class="logo_toggler"><i class='bx bx-menu'></i><img src="images\blacklogo.jpeg" alt=""></div>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasTopLabel">Takozaki<img src="images\blacklogo.jpeg" alt=""></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="tab">
                    <a href="index.php">Home</a>
                    <a href="index_about_us.php">About</a>
                </div>
            </div>
        </div>

        <div class="right_body">
            <div class="loginbutton">
                <a href="login.php"> <button> Login </button></a>
            </div>
        </div>

    </nav>



    <div class="intro">
        <div class="bg_box">
            <div class="intro_img">
                <img src="images\bgm1.jpg" alt="">
            </div>
            <h1 class="welcome">WELCOME TO TAKOZAKI!</h1>
        </div>
    </div>


    <div class="main_body">

        <div class="promo">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" data-bs-interval="3000">
                    <div class="carousel-item active">
                        <img src="images\11.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="images\bg2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="images\14.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="home-text">
            <h2>Welcome to <a href="user_about_us.php">TAKOZAKI!</a>
                Experience the deliciousness of Takoyaki, a popular Japanese street food from Osaka. These crispy,
                octopus-filled balls
                are topped with savory sauce, mayo, bonito flakes, and seaweed. Enjoy a taste of Japan with every bite!
            </h2>

            </h2>
        </div>
    </div>

    <div class="product">
        <div class="titles">
            <h4><i class="bx bxs-hot"></i>Top Products</h4>
        </div>
        <div class="item"><img src="images\10.png" alt=""></div>
        <div class="item"><img src="images\mt4.png" alt=""></div>
        <div class="item"><img src="images\r3.png" alt=""></div>
        <div class="item"><img src="images\mt1.png" alt=""></div>
    </div>

    <footer class="footer">
        <div class="footer_content">
            <p>1234 Takoyaki Street, Osaka, Japan</p>
            <p>Email: info@takoyaki.jp | Phone: +81 123-456-7890</p>
            <p>&copy; 2024 Takozaki. All rights reserved.</p>
        </div>
    </footer>



</body>

</html>