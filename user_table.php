<?php
include('connection.php');
include('sessioncheck.php');

// Fetch user data
$result = mysqli_query($conn, "SELECT * FROM usertable");

include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="user_tablee.css">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons CSS -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
    /* Additional CSS if needed */
    </style>
</head>

<body>
    <nav class="nav_bar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
            aria-controls="offcanvasTop">
            <div class="logo_toggler">
                <i class='bx bx-menu'></i>
                <img src="images\blacklogo.jpeg" alt="Logo">
            </div>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasTopLabel">Takozaki
                    <img src="images\blacklogo.jpeg" alt="Logo">
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="tab">
                    <a href="admin.php">Home</a>
                    <a href="admin_product.php">Products</a>
                    <a href="admin_pendings_order.php">Orders</a>
                    <a href="user_table.php">Users</a>
                    <a href="admin_report.php">Report</a>
                    <a href="contact.php">Contact us</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main_body">
        <?php if (mysqli_num_rows($result) > 0) : ?>
        <div class="table-responsive w-100">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href='update.php?id=<?php echo $row['id']; ?>' class="btn btn-warning btn-sm">Update</a>
                            <a href='delete.php?id=<?php echo $row['id']; ?>' class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else : ?>
        <div class="alert alert-info" role="alert">
            No users found.
        </div>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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