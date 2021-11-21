<?php
include("assets/includes/controller.php");
$result = mysqli_query($servercnx, "SELECT * FROM `service_line` WHERE `service_id`= '$id' ");
$row = mysqli_fetch_array($result);
      echo json_encode($row);  
  ?>
