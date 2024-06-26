<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link rel="stylesheet" href="signup2.css" />
</head>

<body>
    <form action="regconn.php" method="post">
        <div class="container ">
            <h1>Sign Up</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="fname" placeholder="First Name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="form-group">
                            <input type="text" name="lname" placeholder="Last Name" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="text" name="uname" placeholder="User Name" />
            </div>
            <div class="form-group">
                <input type="text" name="address" placeholder="Full Address" />
            </div>
            <div class="form-group">

                <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="form-group">
                <input type="password" name="confirm" placeholder="Confirm Password" />
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
            <p>Already have account?<a href="login.php">Login here.</a></p>
    </form>
    </div>
</body>

</html>