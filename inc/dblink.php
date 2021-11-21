<?php

$servercnx = mysqli_connect("localhost","smartitg_thezara","smartitg_thezara","smartitg_thezara");

if (!$servercnx) {
	
	echo ("<p> Database Server Not Connected</p>");
}

$fnfdb = mysqli_select_db($servercnx,"smartitg_thezara");

if (!$fnfdb) {
	
echo ("<p> Database Not Connected</p>".die (mysqli_connect_error()));

}

?>