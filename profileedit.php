<?php
include_once 'admin-header.php';

?>
<body id="page-top">

<?php
include_once 'admin-topnav.php';
?>
<div id="wrapper">

    <?php
    if ($_SESSION['user_type'] == 0) {
        include_once 'admin-sidebar.php';
    }
    ?>
    <div id="content-wrapper">

        <div class="container-fluid">
            <?php

            $email = $_SESSION["email"];
            $user_id = 0;
            $username=$_SESSION["username"] ;
            $password="";
            $fullname="";
            $search_user= "select * from userinfo where email='$email'";
            $result_user = $conn->query($search_user);
            if ($result_user->num_rows > 0) {
                while($row_user = $result_user->fetch_assoc()) {
                    $user_id = $row_user['userinfo_id'];
                    $password = $row_user['password'];
                    $fullname = $row_user['fullname'];
                }
            }
            $msg="";
            if(isset($_POST['submit']))
            {
                $fullname= $_POST['fullname'];
                $username= $_POST['username'];
                $email= $_POST['email'];
                $password =$_POST['password'];
                $update_info ="UPDATE `userinfo` SET `fullname`='$fullname',`username`='$username',`email`='$email',`password`='$password' WHERE userinfo_id = '$user_id'";
                if ($conn->query($update_info) === TRUE) {
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $email;
                    $msg="successfully updated";
                }
            }

            if ($_SESSION['user_type'] == 0) {
                ?>

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="admin-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
                    <li><a class="btn btn-info" href="admin-new-category.php" style="position: absolute;
right: 10%;"> <i class="fas fa-plus-circle"></i> Create New</a></li>
                </ol>
                <?php
            }
            ?>
            <!--<div class="row">
                <div class="col-lg-5 col-sm-5">
                    <div class="col-lg-5 col-sm-5">
                        <?php
/*                        $show_details = "select * from userinfo where userinfo_id='$user_id'";
                        $result_details = $conn->query($show_details);
                        if ($result_details->num_rows > 0) {
                            while ($row_details = $result_details->fetch_assoc()) {
                                $username = $row_details['username'];
                                $fullname = $row_details['fullname'];
                                $email = $row_details['email'];
                                */?>
                                <?php
/*                            }
                        }
                        */?>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="image/user-profile-dummy.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Full Name :<?/*= $fullname */?></h5>
                                <h5 class="card-subtitle">Username : <?/*= $username */?></h5>
                                <p class="card-text">Email : <?/*= $email */?></p>
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profileedit.php"><span class="icon-wrench"></span> Modify</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
            </div>-->

            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 well">
                    <?php
                    if(isset($_POST['submit']))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $msg;?>
                        </div>
                        <?php
                    }
                    ?>
                    <center><h3>Update Profile</h3></center>
                    <form action="profileedit.php" method="post">
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Update Fullname" name="fullname" value="<?php echo $fullname ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Update username" name="username" value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="update email" name="email" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="update password" name="password" value="<?php echo $password ?>">
                            <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" name="submit" value="update">
                    </form>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
        include_once 'admin-footer.php';
        ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include_once 'logout-modal.php';
?>
<!-- Bootstrap core JavaScript-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/popper/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- Core plugin JavaScript-->
<script src="plugins/jquery-easing/jquery.easing.min.js"></script>
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
