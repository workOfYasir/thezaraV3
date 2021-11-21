<?php include("assets/includes/controller.php");
$pagename = 'index';
$container = '';
if (!$session->isAdmin()) {
    header("Location: login.php");
    exit;
} else {
    $total_users = $adminfunctions->totalUsers();
    include("assets/includes/inc/Main-Header.php");

?>
    <!-- Page Content -->
    <div id="page-content" class="gray-bg">

        <!-- Title Header -->
        <div class="title-header white-bg">
            <i class="fas fa-home"></i>
            <h2>The Dashboard</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">
                    The Dashboard
                </li>
            </ol>
        </div>
        <!-- END Title Header -->

        <!-- Index Boxes -->

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="panel warm-blue-bg">
                    <div class="panel-body">
                        <div class="text-center">
                            <h4><?php echo $functions->calcBlogs(); ?> Blogs</h4>
                        </div>
                    </div>
                    <div class="panel-footer clearfix panel-footer-link ">
                        <a href="View-Blogs.php"><i class="fa fa-angle-double-right"></i> View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="panel orange-bg">
                    <div class="panel-body">
                        <div class="text-center">
                            <h4><?php echo $functions->calcPages(); ?> Pages </h4>
                        </div>
                    </div>
                    <div class="panel-footer clearfix panel-footer-link ">
                        <a href="View-Pages.php"><i class="fa fa-angle-double-right"></i> View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="panel purple-bg">
                    <div class="panel-body">
                        <div class="text-center">
                            <h4><?php echo $functions->calcTestimonials(); ?> Testimonials</h4>
                        </div>
                    </div>
                    <div class="panel-footer clearfix panel-footer-link ">
                        <a href="View-Testimonials.php"><i class="fa fa-angle-double-right"></i> View</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Row -->

        <?php include("assets/includes/inc/Main-Footer.php"); ?>
        </body>

        </html>
    <?php } ?>