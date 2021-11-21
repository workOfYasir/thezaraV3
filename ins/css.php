<link rel="stylesheet" href="<?php echo $settings_row['site_domain']; ?>css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $settings_row['site_domain']; ?>css/animations.css">

	<link rel="stylesheet" href="<?php echo $settings_row['site_domain']; ?>css/font-awesome.css">

	<link rel="stylesheet" href="<?php echo $settings_row['site_domain']; ?>css/flaticon.css">

	<link rel="stylesheet" href="<?php echo $settings_row['site_domain']; ?>css/main.css">

	<script src="<?php echo $settings_row['site_domain']; ?>js/vendor/modernizr-custom.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->
	
	<link rel="icon" href="data:,">

<?php
if ($sstatus == 'Active') {
  echo "<script>
    $(document).ready(function() {
  if (document.cookie.indexOf('FooBar=true') == -1) {
    document.cookie = 'FooBar=true; max-age=86400';
    $('#noTice').modal('show');
  }
});
    </script>";
} else {
  echo "";
}
?>
