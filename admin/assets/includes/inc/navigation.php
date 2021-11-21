<?php
include_once("assets/includes/controller.php");
if (!$session->isAdmin()) {
    header("Location: " . $configs->homePage());
    exit;
}
?>
<!-- Site Navigation -->
<ul class="nav">
    <li <?php if ($pagename == 'index') {
            echo 'class="active selected"';
        } ?>>
        <a href="index.php"><i class="fas fa-home"></i> <span class="nav-label">Home</span></a>
    </li>
    
    <li <?php if ($container == 'Add-Item') {
            echo 'class="active selected"';
        } ?>>
        <a href="#"><i class="fa fa-plus-square"></i> <span class="nav-label">Add Items</span> <span class="fas fa-angle-double-right"></span></a>
        <ul class="nav nav-second-level">
            <li <?php if ($pagename == 'Add-Blog') {
                    echo 'class="active"';
                } ?>><a href="Add-Blog.php"><i class="fa fa-plus" aria-hidden="true"></i> New Blog</a></li>
            <li <?php if ($pagename == 'Add-Page') {
                    echo 'class="active"';
                } ?>><a href="Add-Page.php"><i class="fa fa-plus" aria-hidden="true"></i> New Page</a></li>
            <li <?php if ($pagename == 'Add-Service') {
                    echo 'class="active"';
                } ?>><a href="Add-Service.php"><i class="fa fa-plus" aria-hidden="true"></i> New Services</a></li>
            <li <?php if ($pagename == 'Add-Class') {
                    echo 'class="active"';
                } ?>><a href="Add-Class.php"><i class="fa fa-plus" aria-hidden="true"></i> New Class</a></li>
            <li <?php if ($pagename == 'Home-Slides') {
                    echo 'class="active"';
                } ?>><a href="Add-Slidei.php"><i class="fa fa-plus" aria-hidden="true"></i> Home Slide</a></li>
            <li <?php if ($pagename == 'Brand') {
                    echo 'class="active"';
                } ?>><a href="Add-Brand.php"><i class="fa fa-plus" aria-hidden="true"></i> New Brand Logo</a></li>
            <li <?php if ($pagename == 'Add-Testimonial') {
                    echo 'class="active"';
                } ?>><a href="Add-Testimonial.php"><i class="fa fa-plus" aria-hidden="true"></i> New Testimonial</a></li>
        </ul>
    </li>
    <li <?php if ($container == 'View-Item') {
            echo 'class="active selected"';
        } ?>>
        <a href="#"><i class="fa fa-check-square"></i> <span class="nav-label">View Items</span> <span class="fas fa-angle-double-right"></span></a>
        <ul class="nav nav-second-level">
            <li <?php if ($pagename == 'View-Blog') {
                    echo 'class="active"';
                } ?>><a href="View-Blogs.php"><i class="fa fa-dot-circle"></i> All Blogs</a></li>
            <li <?php if ($pagename == 'View-Page') {
                    echo 'class="active"';
                } ?>><a href="View-Pages.php"><i class="fa fa-dot-circle"></i> All Pages</a></li>
            <li <?php if ($pagename == 'View-Services') {
                    echo 'class="active"';
                } ?>><a href="View-Service.php"><i class="fa fa-dot-circle"></i> All Services</a></li>
            <li <?php if ($pagename == 'View-Classes') {
                    echo 'class="active"';
                } ?>><a href="View-Classes.php"><i class="fa fa-dot-circle"></i> All Classes</a></li>
            <li <?php if ($pagename == 'View-Brands') {
                    echo 'class="active"';
                } ?>><a href="View-Brand.php"><i class="fa fa-dot-circle"></i> All Brand Logos</a></li>
            <li <?php if ($pagename == 'Home-Slides') {
                    echo 'class="active"';
                } ?>><a href="View-Slidei.php"><i class="fa fa-dot-circle"></i> Home Slides</a></li>
            <li <?php if ($pagename == 'View-Small-Texts') {
                    echo 'class="active"';
                } ?>><a href="View-Small-Texts.php"><i class="fa fa-dot-circle"></i> Small Texts</a></li>
            <li <?php if ($pagename == 'View-Testimonial') {
                    echo 'class="active"';
                } ?>><a href="View-Testimonials.php"><i class="fa fa-dot-circle"></i> Testimonials</a></li>
        </ul>
    </li>
    <?php if ($session->isSuperAdmin()) { ?>
        <li <?php if ($pagename == 'registration') {
                echo 'class="active selected"';
            } ?>>
            <a href="registration.php"><i class="fas fa-tasks"></i> <span class="nav-label">Registration</span></a>
        </li>
        <li <?php if ($container == 'settings') {
                echo 'class="active selected"';
            } ?>>
            <a href="configurations.php"><i class="fas fa-desktop"></i> <span class="nav-label">Website Settings</span></a>
        </li>
        <li <?php if ($pagename == 'useradmin') {
                echo 'class="active selected"';
            } ?>>
            <a href="useradmin.php"><i class="fas fa-user"></i> <span class="nav-label">User Admin</span></a>
        </li>
        <li <?php if ($pagename == 'usergroups') {
                echo 'class="active selected"';
            } ?>>
            <a href="usergroups.php"><i class="fas fa-users"></i> <span class="nav-label">User Groups</span></a>
        </li>
        <li <?php if($pagename == 'logs') { echo 'class="active selected"'; } 
                    ?>>
        <a href="logs.php"><i class="fas fa-chart-bar"></i> <span class="nav-label">Logs</span></a>
    </li>
    <?php } ?>
</ul>
<!-- END Site Navigation -->