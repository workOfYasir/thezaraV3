
<!DOCTYPE html>
<html>
<head>
<title><?php echo SITE_NAME ?> - Admin</title>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo SITE_URL ?>images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.2/fh-3.1.7/r-2.2.6/rr-1.2.7/sc-2.0.3/sl-1.3.1/datatables.min.css"/>
<link rel="icon" href="<?php echo SITE_URL ?>images/favicon.ico" type="image/x-icon">
<link href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet"> 
<link href="<?php echo BASE_URL ?>assets/fonts/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL ?>assets/css/navigation.css" rel="stylesheet"> 
<link href="<?php echo BASE_URL ?>assets/css/style.css" rel="stylesheet">             
<link rel = "icon" href = "../images/map_marker_icon.png" type = "image/x-icon">
<link href="<?php echo BASE_URL ?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link href="<?php echo BASE_URL ?>assets/css/datatables.min.css" rel="stylesheet">

<!-- Select2 -->
<link href="<?php echo BASE_URL ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />

<script src="<?php echo BASE_URL ?>assets/js/jquery.min.js"></script>
</head>
<body>

<div id="page-wrapper">

<nav id="side-menu" class="navbar-default navbar-static-side" role="navigation">
<div id="sidebar-collapse">
<div id="logo-element">
<a class="logo" href="index.php" title="The Zara">
<span class="x-hidden">Z</span><span class="logo-full">ARA</span>
</a>
</div>
<?php include('assets/includes/inc/navigation.php'); ?>
</div>
</nav>

<?php include('assets/includes/inc/top-navbar.php'); ?>