<?php
if ($_SESSION['user_type'] == 0) {
    ?>
    <nav class="navbar navbar-expand navbar-dark bg-success static-top">

        <a class="navbar-brand mr-1"
           href="<?php echo ($_SESSION['user_type'] == 0) ? 'admin-dashboard.php' : 'home.php' ?>">TutorialMaster</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!--<div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                       aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>-->
        </div>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <?php
} elseif ($_SESSION['user_type'] == 1) {
    ?>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

        <h5 class="my-0 mr-md-auto font-weight-normal">
            <a class="navbar-brand" href="home.php">
                <i class="fas fa-graduation-cap"></i>
                TutorialNow
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
            <!--        <a class="p-2 text-dark" href="#">Link 3</a>-->
            <!--        <a class="p-2 text-dark" href="#">Link 3</a>-->
        </nav>
        <a class="p-2 text-dark btn-link" href="profile.php"><i class="fas fa-user-astronaut"></i> Profile</a>
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </div>
    <?php
}
?>
