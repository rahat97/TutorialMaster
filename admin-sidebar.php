<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="admin-dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Categories</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
            <h6 class="dropdown-header">
                <a href="categorylist.php"><i class="fas fa-list-ul"></i> Category List </a>
            </h6>
            <?php
            $show_category = "select * from video_category";
            $result = $conn->query($show_category);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <a class="dropdown-item" href="categories.php?id=<?php echo $row['category_id'] ?>">
                        <?php echo $row['category_name'] ?>
                    </a>

                    <?php
                }
            }
            ?>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">New:</h6>
            <a class="dropdown-item" href="admin-new-category.php"><i class="fas fa-plus-square"></i> Create New</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="videosDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-video"></i>
            <span>Videos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="admin-videolist.php"><i class="fas fa-list-alt"></i> Video List</a>
            <a class="dropdown-item" href="add-video.php"><i class="fas fa-plus-circle"></i> Upload Video</a>
        </div>
    </li>
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="tables.html">-->
<!--            <i class="fas fa-fw fa-table"></i>-->
<!--            <span>Tables</span></a>-->
<!--    </li>-->
</ul>