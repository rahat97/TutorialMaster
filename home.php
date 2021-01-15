<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: login.php');
}
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TutorialMaster</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css">
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="navbar-brand" href="<?php $_SERVER['PHP_SELF'] ?>">
            <i class="fas fa-graduation-cap"></i>
            TutorialMaster
        </a>
    </h5>

    <nav class="my-2 my-md-0 mr-md-3">
        <div class="p-2 dropdown">
            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="categoryDropdownLink"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>

            <div class="dropdown-menu" aria-labelledby="categoryDropdownLink">
                <?php
                $show_category = "select * from video_category";
                $result = $conn->query($show_category);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
                <li>
                    <a class="text-dark dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                        <?php echo $row['category_name'] ?>
                    </a>
                <li>
                    <?php
                    }
                    }
                    ?>
            </div>
        </div>
        <ul class="dropdown-menu">
            <?php
            $show_category = "select * from video_category";
            $result = $conn->query($show_category);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
            <li>
                <a class="p-2 text-dark dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name'] ?>
                </a>
            <li>
                <?php
                }
                }
                ?>
        </ul>
    </nav>
    <a class="btn btn-link" href="profile.php"><i class="fas fa-user"></i> Profile</a>
    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
</div>

<div class="container">
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-8 px-0">
            <form action="search.php" class="form-inline" method="post">
                <h1 class="font-italic">Search course by name</h1>
                <div class="form-group">
                    <input type="text" class="form-control mb-2 mr-sm-2 lead" placeholder="Search"
                           name="search">
                    <div class="form-group">
                        <label for="duration">Filter by Duration</label>
                        <select class="form-control" name="duration">
                            <option value="0">None</option>
                            <option value="1-5">1-5</option>
                            <option value="5-10">5-10</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mt-1 ml-sm-2" type="submit"><i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active carousel-item">
                <img src="image/t.jpeg" alt="Albert Einstein" style="width:1200px; height:470px">
            </div>
            <div class="item carousel-item">
                <img src="image/steve.png" alt="ambrosebierce1" style="width:1200px; height:470px">
            </div>
            <div class="item carousel-item">
                <img src="image/engineering.jpg" alt="man_computer" style="width:1200px; height:470px">
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">

            <span class="glyphicon glyphicon-chevron-left"></span>

            <span class="sr-only">Previous</span>

        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">

            <span class="glyphicon glyphicon-chevron-right"></span>

            <span class="sr-only">Next</span>

        </a>
    </div>
    <br>
</div>

<?php
$show_category = "select * from video_category";
$result = $conn->query($show_category);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $category_id = $row['category_id'];
        $show_video = "select * from video where category_id =$category_id limit 4";
        $video_result = $conn->query($show_video);
        if ($video_result->num_rows > 0) {
            ?>

            <div class="container">
            <legend>
                <?php echo $row['category_name'] ?>
                <span class="pull-right">
                    <a class="float-right" href="categories.php?id=<?php echo $row['category_id'] ?>">...more</a>
                </span>
            </legend>
            <div class="container outerpadding">
            <div class="row">

            <?php
            while ($row_video = $video_result->fetch_assoc()) {
                $thumbnail_path = "video/" . $row_video['thumbnail_path'];
                ?>

                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">
                    <div class="thumbnail">
                        <a href="video.php?id=<?php echo $row_video['video_id'] ?>">
                            <img src="<?php echo $thumbnail_path ?>" style="width:100%!important; height:200px">
                            <div class="caption">
                                <p><?php echo $row_video['caption'] ?></p>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
            }
        }
        ?>

        </div>
        </div>
        </div>

        <?php
    }
}
?>

<div class="container jumbotron jumbotron-fluid">
    <h1 class="display-4 text-center">TutorialMaster.com</h1>
    <p class="lead text-center">TutorialMaster.com is a learning website where viewers are mastering new skills and
        achieving heir goals.</p>
    <hr class="my-4">
    <p class="text-center">This site will provide a good amount of video tutorials in various sectors of education.</p>
</div>

<div id="contact" class="container bg-grey">
    <h3 class="text-center">Contact</h3>

    <div class="row">
        <div class="col-md-4" style="color: white;">
            <p><span class="glyphicon glyphicon-map-marker"></span>Dhaka , Bangladesh</p>
            <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 0000000</p>
            <p><span class="glyphicon glyphicon-envelope"></span>Email: TutorialNow@gmail.com</p>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Enter Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
            <br>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button class="btn pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">

    <p>CopyRight © 2020 TutorialMaster All Rights Reserved</p>
</footer>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/popper/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
