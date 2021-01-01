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

            if (isset($_POST['submit'])) {
                $bookmark_id = $_POST['bookmark_id'];
                $delete_bookmark = "DELETE FROM `bookmarks` WHERE bookmark_id =$bookmark_id";
                $conn->query($delete_bookmark);
            }
            $email = $_SESSION["email"];
            $user_id = 0;
            $search_user = "select * from userinfo where email='$email'";
            $result_user = $conn->query($search_user);
            if ($result_user->num_rows > 0) {
                while ($row_user = $result_user->fetch_assoc()) {
                    $user_id = $row_user['userinfo_id'];
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
                </ol>
                <?php
            }
            ?>
            <h3 class="text-center">User Profile</h3>
            <hr class="bg-danger w-25"/>
            <div class="row">

                <div class="col-lg-4 col-sm-4 col-4 col-md-4">
                </div>
                <div class="col-lg-4 col-sm-4 col-4 col-md-4">
                    <!--                    <div class="col-lg-5 col-sm-5">-->
                    <?php
                    $show_details = "select * from userinfo where userinfo_id='$user_id'";
                    $result_details = $conn->query($show_details);
                    if ($result_details->num_rows > 0) {
                        while ($row_details = $result_details->fetch_assoc()) {
                            $username = $row_details['username'];
                            $fullname = $row_details['fullname'];
                            $email = $row_details['email'];
                            ?>

                            <!--                            <p><strong>Username: </strong><?php /*echo $row_details['username'] */ ?></p>
                            <p><strong>Email: </strong><?php /*echo $row_details['email'] */ ?></p>-->
                            <?php
                        }
                    }
                    ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="image/user-profile-dummy.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Full Name :<?= $fullname ?></h5>
                            <h5 class="card-subtitle">Username : <?= $username ?></h5>
                            <p class="card-text">Email : <?= $email ?></p>
                            <!--                                <a href="#" class="btn btn-primary">Go somewhere</a>-->
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
                <div class="col-lg-4 col-sm-4 col-4 col-md-4">
                </div>
            </div>
        </div>

        <?php
        if ($_SESSION['user_type'] == 1) {
            ?>
            <!-- /.container-fluid -->
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">Bookmark videos</h3>
                        <!--                    <div class="text-center"></div>-->
                        <hr class="bg-danger w-25"/>
                        <div class="row">
                            <?php
                            $show_bookmarks = "select * from bookmarks where user_id='$user_id'";
                            $result_bookmarks = $conn->query($show_bookmarks);
                            if ($result_bookmarks->num_rows > 0) {
                                while ($row_bookmarks = $result_bookmarks->fetch_assoc()) {
                                    $video_id = $row_bookmarks['video_id'];
                                    $bookmark_id = $row_bookmarks['bookmark_id'];
                                    $sql_video = "SELECT * FROM `video` where video_id =$video_id";
                                    $result_video = $conn->query($sql_video);
                                    if ($result_video->num_rows > 0) {
                                        while ($row_video = $result_video->fetch_assoc()) {
                                            $thumbnail_path = "video/" . $row_video['thumbnail_path'];
                                            $video_id = $row_video['video_id'];
                                            $caption = $row_video['caption'];
                                            ?>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <div class="thumbnail">
                                                    <a href="video.php?id=<?php echo $video_id ?>">
                                                        <img src="<?php echo $thumbnail_path ?>"
                                                             style="width:100%; height:100px">
                                                        <div class="caption">
                                                            <p><?php echo $caption ?></p>
                                                            <form action="profile.php" method="post">
                                                                <input type="hidden" name="bookmark_id"
                                                                       value="<?php echo $bookmark_id ?>">
                                                                <input type="submit" name="submit" value="remove"
                                                                       class="btn btn-danger btn-xs">
                                                            </form>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <div class="well">
                                    <h4 class="display-4 text-center">No Video in playlist</h4>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <br/>
    <br/>

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

</body>
</html>
