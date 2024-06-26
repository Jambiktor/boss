<?php
 include ("connection.php");
  if(count($_POST) > 0) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $uname = $_POST['uname'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // $result = mysqli_query($conn, "SELECT * FROM user_table WHERE id='" . $_POST['id'] . "'");
      // $row = $result->fetch_assoc();
      // $hashed_password = $row['password'];

      // $password = !empty($_POST['password']) ? $_POST['password'] : $hashed_password;

    mysqli_query($conn, "UPDATE usertable SET
      fname='$fname',
      lname='$lname',
      uname='$uname',
      email='$email',
      password='$password' WHERE id='" . $_POST['id'] . "'");
    echo "<script>
    alert('Record Successfully modified');
    window.location='user_table.php';
    </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM usertable WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
 ?>
 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <script defer src="js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper bg-light">
        <h2 class="mb-4">Update</h2>
        <form method="post">
          <div class="d-flex gap-1"> 
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-floating mb-3 w-50 ">
              <input
                type="text"
                class="form-control"
                id="fname"
                name="fname"
                placeholder="John"
                value="<?php echo $row['fname'];?>"
              />
              <label for="firstName" class="form-label text-secondary"
                >First name</label
              >
            </div>
            <div class="form-floating mb-3 w-50">
              <input
                type="text"
                class="form-control"
                id="lname"
                name="lname"
                placeholder="Doe"
                value="<?php echo $row['lname'];?>"
              />
              <label for="lastName" class="form-label text-secondary"
                >Last name</label
              >
            </div>
          </div>
          <div class="form-floating mb-3 w-100">
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="name@example.com"
              value="<?php echo $row['email'];?>"
            />
            <label for="email" class="form-label text-secondary">Email</label>
          </div>
          <div class="d-flex gap-1">
            <div class="form-floating mb-3 w-50">
              <input
                type="text"
                class="form-control"
                id="uname"
                placeholder="username"
                name="uname"
                value="<?php echo $row['uname'];?>"
              />
              <label for="uname" class="form-label text-secondary"
                >Username</label
              >
            </div>
            <div class="form-floating mb-3 w-50">
              <input
                type="password"
                class="form-control"
                id="password"
                placeholder="password"
                name="password"
                value="<?php echo $row['password'];?>"
              />
              <label for="password" class="form-label text-secondary"
                >Password</label
              >
            </div>
          </div>
          <div
            class="d-flex flex-row justify-content-between align-items-center"
          >
            <div class="">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </body>
</html>