<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginnnnnn.css">
</head>

<body>

    <div class=" container  m-auto">
        <form action="logconn.php" method="post">
            <h1>Login</h1>
            <div class="form-group">
                <input type="text" placeholder="Username" name="uname" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" style="margin-top: 10px;"> Login</button>
            </div>

            <p>Don't have an account? <a href="registration.php">Register</a></p>
        </form>
    </div>

</body>

</html>