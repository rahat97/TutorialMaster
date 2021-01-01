<?php
session_start();
if (!empty($_SESSION["username"])) {
    if ($_SESSION["username"] == "admin") {
        header('Location: admin.php');
    } else {
        header('Location: home.php');
    }
}
require 'connection.php';
if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    list($user, $domain) = explode('@', $email);
    if ($domain == 'northsouth.edu') {
        $insert_user = "INSERT INTO `userinfo`(`fullname`, `username`, `email`, `password`) VALUES ('$fullname','$username','$email','$password')";
        if ($conn->query($insert_user) === TRUE) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            header('Location: home.php');
        } else {
            echo "Error: " . $insert_user . "<br>" . $conn->error;
        }
    } else {
        $msg = "Only For NSU Student";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyVideo | Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/floating-labels.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>


    <style>
        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
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
    <a class="btn btn-outline-primary" href="login.php">Login</a>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-6" style=" background-image:url('https://images.pexels.com/photos/1036808/pexels-photo-1036808.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
  background-repeat:no-repeat;
 "></div>
        <div class="col-6">
            <div class="row">
                <div class="text-center ml-5 mb-2">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                    <h1 class="h3 mb-3 font-weight-bold">Signup</h1>
                    <p>Please Fillup The Below Form To Learn and Being Awesome</p>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($_POST['submit'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $msg; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="signup.php" method="POST" class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="fullname" class="form-control" name="fullname"
                                   placeholder="Full Name" required>
                            <label for="fullname">Full Name:</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" name="username"
                                   placeholder="User Name" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="email" class="form-control" id="email" name="email" required
                                   placeholder="Email">
                            <label for="email">Email address:</label>

                        </div>
                        <div class="form-label-group">
                            <input type="password" class="form-control" id="password" name="password" required
                                   placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <label for="password">Password:</label>

                            <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign Up">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="panel-footer" align="right">
                        <p>Already Registered? <a href="login.php" class="btn btn-link">Login</a></p>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>

</div>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
</body>
</html>
