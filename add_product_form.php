<?php

  include('sessioncheck.php');
  include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css\adminprod.css" />

  </head>
  <body>
    <div class="nav">
      <img src="images\Logo.jpg" alt="pusit" />
      <h1>Takozaki</h1>
      <div class="tab">
        <a href="admin.php">Home</a>
        <a href="adminprod.php">Products</a>
        <a href="">Contact us</a>
      </div>
    </div>

      
      <div class="user_tab">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user">
                <div class="user_name">
                  <p> <?php echo $_SESSION['uname'] ?> </p>
                </div>
              <div class="user_photo">
              </div>
            </div>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <form action="logout.php" method="post">
    <button type="submit"  name="logout">Logout</button></form>
          </ul>
        </div>
     
        <div class="addprod" style="margin-left: 400px;">
          <form action="add_product.php" method="POST" autocomplete="off" enctype="multipart/form-data">
              <label for="product_name">Product Name: </label>
              <input type="text" name="product_name" id="product_name" required>
              <label for="price">Price: </label>
              <input type="number" name="price" id="price" required>
              <input type="file" name="image_file" accept=".jpeg, .jpeg, .png">
              <button type="submit" name="submit">Submit</button>

          </form>
        </div>


    
  </body>
</html>



</body>
</html>

 <div class="foot">
  <p>&copy; 2024 Takozaki. All rights reserved.</p>
</div>
</body>
</html>