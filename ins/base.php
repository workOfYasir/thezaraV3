	<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]>
	<!-->
	<html class="no-js">
	<!--<![endif]-->
	
	<head>

	<?php
	include("admin/assets/includes/inc/config.php");
	$settings_result = mysqli_query($servercnx,"SELECT * FROM site_settings");
	$settings_row = mysqli_fetch_array($settings_result);
	?><?php
	$stexts_result = mysqli_query($servercnx,"SELECT * FROM small_texts");
	$stexts_row = mysqli_fetch_array($stexts_result);
	$sstatus = $stexts_row['popup_status'];
	?><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<base href="<?php echo $settings_row['site_domain']; ?>">
