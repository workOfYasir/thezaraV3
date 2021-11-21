<?php
include("assets/includes/controller.php");
include("assets/includes/inc/config.php");
$id = $_GET['id'];



$data = mysqli_query($servercnx, "DELETE FROM portfolio_images WHERE  portfolio_id = '$id'");



?>