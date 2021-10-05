<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: adminlogin.php");
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $connection = mysqli_connect("localhost", "root", "", "service_finder");

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION["username"] = $username;

        header("Location: index.php");
    } else {
        $msg = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FoodMain</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 offset-md-4">
                <?php
                if (isset($msg)) {
                    ?>
                    <div class="alert alert-danger">
                        <b>Error!</b> Invalid Username and Password, Please enter the correct password
                    </div>
                <?php
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="card">
                        <div class="card-header bg-primary">
                            Sign In
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter text" required="require"> </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter text" required="require">
                            </div>
                        </div>
                        <div class="card-footer form-group">
                            <input type="submit" class="btn btn-primary btn-center" value="Login" name="submit">

                            <li class="nav">
                                <a href="LogIN.php" class="nav-link">Signup</a>
                            </li>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>