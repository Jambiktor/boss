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
    <style>
    * {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;

    }

    #container {
        background-color: white;
        width: 90%;
    }

    .container {
        width: 100%;
    }

    #carouselExampleInterval {
        width: clamp(250px, 100%, 1150px);
    }

    /* .radio-container{
        background-color: black;
    } */
    .radio-container {
        background-color: white;
        padding: 0;
        transition: .3s;
    }

    .radio-container:hover {
        background-color: lightgray;
        /* color: white; */

    }

    .radio-container input[type="radio"] {
        display: none;
    }

    .radio-container input[type="radio"]:checked+.label-text {
        background-color: lightgray;
        /* color: white; */
    }

    .label-text {
        display: flex;
        align-items: center;
        padding: 0.5em;
        border-radius: 5px;
        width: 100%;
    }

    .radio-circle {
        background-color: white;
        height: 20px;
        width: 20px;
        border-radius: 5px;
        margin-right: 10px;
    }

    .cart {
        background-color: white;
        border: 1px solid red;
        transition: .3s;
    }

    .cart:hover {
        background-color: red;
        color: white;
        border: 1px solid red;
    }

    .order {
        background-color: red;
        border: 1px solid red;
        color: white;
        transition: .3s;
    }

    .order:hover {
        background-color: #ba0404;
        border: 1px solid #ba0404;
        /* color: black; */
    }
    </style>
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

    <?php
    if (isset($_GET['product_id'])) {
        $product_id = intval($_GET['product_id']);

        $products = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
        $product = mysqli_fetch_assoc($products);

        if ($product) {
            ?>

    <div id="container" class="container-fluid rounded mb-3 mt-3 py-2" style="background-color: white;">
        <div class="row gx-1 gy-4 gy-md-0">
            <div class="col">
                <form action="add-to-cart-form.php" method="POST">
                    <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel"
                        data-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active " data-bs-interval="3000">
                                <img src="product-images/<?php echo $product['image_file'] ?>"
                                    class="d-block w-100 rounded" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
            <?php
        $products = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
        while ($product = mysqli_fetch_assoc($products)) {
        ?>
            <div class="col position-relative">
                <div class="container">
                    <div class="rounded d-flex justify-content-between p-3 align-items-center">
                        <div>
                            <h3><?php echo $product['product_name'] ?></h3>
                            <input type="hidden" name="image_file" value="<?php echo $product['image_file'] ?>">
                            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product['product_name'] ?>">
                        </div>
                        <div>
                            <h4>₱ <?php echo $product['price'] ?>.00</h4>
                            <input type="hidden" name="base_price" value="<?php echo $product['price'] ?>">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-100 border border-2 rounded p-2 mb-2">
                        <h4>Variants</h4>
                        <?php
                    $variants = mysqli_query($conn, "SELECT * FROM variants WHERE product_id = $product_id ORDER BY name");
                    ?>
                        <div class="d-flex gap-1 flex-wrap">
                            <?php while ($variant = mysqli_fetch_assoc($variants)) { ?>
                            <label class="shadow-sm radio-container border rounded me-1">
                                <input type="radio" name="variant" value="<?php echo $variant['name'] ?>">
                                <div class="label-text m-auto gap-2 pe-3">
                                    <div>
                                        <img src="product-images/variant_image/<?php echo $variant['image_file'] ?>"
                                            class="d-block w-100 rounded m-0" style="height: 40px; width: 40px;">
                                    </div>
                                    <div>
                                        <p class="m-0"><?php echo $variant['name'] ?></p>
                                    </div>
                                </div>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-100 border border-2 rounded p-2">
                        <h4>Options</h4>
                        <?php
                    $options = mysqli_query($conn, "SELECT * FROM option WHERE product_id = $product_id ORDER BY price");
                    ?>
                        <div class="d-flex gap-1 flex-wrap">
                            <?php while ($option = mysqli_fetch_assoc($options)) { ?>
                            <label class="shadow-sm radio-container border rounded me-1">
                                <input type="radio" name="option" class="price-input"
                                    data-price="<?php echo $option['price'] ?>" value="<?php echo $option['name'] ?>">
                                <div class="label-text m-auto gap-2 pe-3">
                                    <div>
                                        <p class="m-0"><?php echo $option['name'] ?> - ₱ <?php echo $option['price'] ?>
                                        </p>
                                    </div>
                                </div>
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-100 border border-2 rounded p-2 mt-2 ">
                        <h5>Add Ons</h5>
                        <?php
                    $add_ons = mysqli_query($conn, "SELECT * FROM add_on WHERE product_id = $product_id ORDER BY name");
                    ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php while ($add_on = mysqli_fetch_assoc($add_ons)) { ?>
                            <label class="shadow-sm radio-container border rounded ">
                                <input type="radio" name="add_on" class="price-input"
                                    data-price="<?php echo $add_on['price'] ?>" value="<?php echo $add_on['name'] ?>">
                                <div class="label-text m-auto pe-3">
                                    <p class="m-0"><?php echo $add_on['name'] ?> - ₱ <?php echo $add_on['price'] ?></p>
                                </div>
                            </label>
                            <?php } ?>
                            <label class="shadow-sm radio-container border rounded ">
                                <input type="radio" name="add_on" class="price-input" data-price="0" value="none">
                                <div class="label-text m-auto gap-2 pe-3">
                                    <p class="m-0">None</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2 mt-1">
                    <input type="number" name="quantity" class="form-control"
                        aria-label="Dollar amount (with dot and two decimal places)" placeholder="Enter Quantity"
                        required>
                </div>
                <div class="d-flex mt-3 p-2 justify-content-end align-items-center gap-2">
                    <div class="">
                        <h5 class="m-0">Total Price: ₱ <span id="total-price">0</span></h5>
                        <input type="hidden" name="sub_total" id="total-price-input" value="0">
                    </div>

                    <div>
                        <button class="cart rounded p-2" type="submit" name="addtocart">Add to Cart</button>
                    </div>
                    <div>
                        <button class="order rounded p-2" type="submit" name="ordernow">Order Now</button>
                    </div>
                </div>
                </form>
            </div>
            <?php } ?>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const priceInputs = document.querySelectorAll('.price-input');
                const totalPriceElement = document.getElementById('total-price');
                const totalPriceInput = document.getElementById('total-price-input');
                const basePrice = parseFloat(document.querySelector('input[name="base_price"]').value);

                function calculateTotalPrice() {
                    let totalPrice = 0;
                    priceInputs.forEach(input => {
                        if (input.checked) {
                            totalPrice += parseFloat(input.getAttribute('data-price'));
                        }
                    });
                    totalPriceElement.textContent = totalPrice.toFixed(2);
                    totalPriceInput.value = totalPrice.toFixed(2); // Set hidden input value
                }

                priceInputs.forEach(input => {
                    input.addEventListener('change', calculateTotalPrice);
                });

                calculateTotalPrice();
            });
            </script>
        </div>
    </div>


    <script>
    document.querySelectorAll('.variation-btn').forEach((button, index) => {
        button.addEventListener('click', function() {
            const carousel = document.querySelector('#carouselExampleInterval');
            const bootstrapCarousel = new bootstrap.Carousel(carousel);
            bootstrapCarousel.to(index + 1);
        });
    });
    </script>

    <?php
        
    } else {
        echo "<p>No product selected.</p>";
    }
}
    ?>


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