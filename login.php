<?php
session_start();
//if (!empty($_SESSION["username"])) {
//    if ($_SESSION["username"] == "admin") {
//        header('Location: admin.php');
//    } else {
//        header('Location: home.php');
//    }
//}
require 'connection.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_user = "select * from userinfo where username='$username' && password ='$password'";
    $result = $conn->query($login_user);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["user_type"] = $row['user_type'];
        }
//        if (!empty($_SESSION["user_type"])) {
        if ($_SESSION["user_type"] == 0) {
            header('Location: admin-dashboard.php');

        } elseif ($_SESSION["user_type"] == 1) {
            header('Location: home.php');
        }
        /*} else {
            header($_SERVER['PHP_SELF']);
        }*/
        // echo "User name : ".$_SESSION['username'] . " Password : " . $_SESSION['email'] . " " . $_SESSION['user_type']." ";

    } else {
        echo "<script>alert('wrong username & Password')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorialMaster | Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/floating-labels.css"/>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css"/>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="navbar-brand" href="index.html">
            <i class="fas fa-graduation-cap"></i>
            TutorialMaster
        </a>
    </h5>

    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Test Link 1</a>
        <a class="p-2 text-dark" href="#">Link 2</a>
        <a class="p-2 text-dark" href="#">Link 3</a>
        <a class="p-2 text-dark" href="#">Link 3</a>
    </nav>
    <a class="btn btn-outline-primary" href="signup.php">SignUp</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="login.php" method="post" class="form-signin">
                <div class="text-center mb-4">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    <p>Please Enter Your Username and Password to Login</p>
                </div>

                <div class="form-label-group">
                    <input type="text" id="username" class="form-control" name="username" placeholder="User Name"
                           required autofocus>
                    <label for="username">Username</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                           required>
                    <label for="password">Password</label>
                </div>
                <div class="form-label-group">
                    <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign
                    in
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="panel-footer" align="right">
                <p>Not Registered yet? <a href="signup.php" class="btn btn-warning">Sign Up</a></p>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>


</div>
<!--<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>Log In</h4></center>
                </div>
                <div class="panel-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                   placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                   placeholder="Password">
                            <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </form>
                </div>
                <div class="panel-footer" align="right">
                    <p>Not Registered yet? <a href="signup.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>-->


<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>
