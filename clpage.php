<?php include("ins/base.php");?>
        
<?php 
include("admin/assets/includes/inc/config.php");
if(isset($_GET['url'])){$url = str_replace('-',' ',$_GET['url']);}
$paresult22 = mysqli_query($servercnx,"SELECT * FROM classes WHERE url = '$url' AND status = 'Active'");
$parow22 = mysqli_fetch_array($paresult22);
mysqli_close($servercnx);
$pid = $parow22['id'];
$purl = $parow22['url'];
?>
    <title><?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?></title>

    <meta name="keywords" content="<?php if(!empty($parow22['seo_keywords'])){ echo $parow22['seo_keywords'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="author" content="Mates Technologies">

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

    <link rel="publisher" href="<?php echo $settings_row['site_domain']; ?>"/>

    <meta name="robots" content="<?php echo $parow22['robots'];?>" />

    <link rel="canonical" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['url']);?>/"/>
    
    <!-- Open Graph Tags Start-->

    <meta itemprop="name" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="image" content="<?php echo $settings_row['site_domain']; ?>images/Pages/Covers/defaut.jpg">

    <meta property="og:locale" content="en_GB" />

    <meta property="og:locale:alternate" content="en_US" />

    <meta property="og:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['url']);?>/" />

    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['blog_url']);?>/">

    <meta property="og:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:image" content="<?php echo $settings_row['site_domain']; ?>images/Pages/Covers/defaut.jpg" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="<?php if ($cover_width == '0') { echo "1349"; } else { echo "$cover_width"; } ?>" />

    <meta property="og:image:height" content="<?php if ($cover_height == '0') { echo "400"; } else { echo "$cover_height"; } ?>" />

    <meta name="twitter:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['url']);?>/" />

    <meta name="twitter:card" content="<?php if(!empty($parow22['summary'])){ echo $parow22['summary'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="twitter:site" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta name="twitter:creator" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta property="twitter:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:image:" content="<?php echo $settings_row['site_domain']; ?>images/Pages/Covers/defaut.jpg" />

    <meta name="twitter:image:alt" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">

	<!-- Open Graph Tags End-->

    <!-- Start CSS -->

    <?php include("ins/css.php");?>
        

    <!-- End CSS -->

    <?php echo $settings_row['head_script']; ?>


</head>

<body>
    
    <?php echo $settings_row['after_head']; ?>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<div id="canvas">
		<div id="box_wrapper">

    	<?php include("ins/menu.php");?>

			<!-- Top Slider -->
			<section class="page_title s-parallax s-overlay ls title-overlay s-py-25" style="background-image: url('<?php echo $settings_row['site_domain']; ?>images/Pages/Covers/default.jpg')">
				<div class="container">
					<div class="row">

						<div class="fw-divider-space hidden-below-lg mt-130"></div>
						<div class="fw-divider-space hidden-above-lg mt-60"></div>

						<div class="col-md-12 text-center">
							<h1 class="dodo"><?php if(!empty($parow22['class_name'])){ echo $parow22['class_name'];}else{ echo "404 Page Not Foumd";} ?></h1>
						</div>

						<div class="fw-divider-space hidden-below-lg mt-130"></div>
						<div class="fw-divider-space hidden-above-lg mt-60"></div>

					</div>
				</div>
			</section>

			<section class="ls team team-single s-pt-60 s-pb-30 s-pt-lg-100 s-pb-lg-40 s-pt-xl-80 s-pb-xl-160 c-mb-30 c-mb-lg-30 c-mb-xl-0">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="row c-gutter-60">
								<div class="col-md-12 col-lg-4">
									<div class="vertical-item content-padding text-center">
										<div class="item-media">
											<img src="<?php echo $settings_row['site_domain']; ?>images/parallax/hello-bg.jpg" alt="img">

										</div>
										<div class="item-content">
											<h4 class="tile">
												The Zara
											</h4>

											<span class="color-main">
												Creative Hair & Makeup Artist
											</span>
											<div class="social-icons">
											<a href="<?php echo $settings_row['site_facebook']; ?>" class="fa fa-facebook" title="Facebook" target="_blank"></a>
											<a href="<?php echo $settings_row['site_twitter']; ?>" class="fa fa-twitter" title="Twitter" target="_blank"></a>
											<a href="<?php echo $settings_row['site_insta']; ?>" class="fa fa-instagram" title="Instagram" target="_blank"></a>
											<a href="<?php echo $settings_row['site_youtube']; ?>" class="fa fa-youtube-play" title="Youtube" target="_blank"></a>
											<a href="<?php echo $settings_row['site_linkedin']; ?>" class="fa fa-linkedin" title="Linkedin" target="_blank"></a>
											</div>

										</div>
									</div>
								</div>

								<div class="col-md-12 col-lg-8">
									
									<p class="font_8" style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font: 17px futura-lt-w01-light, sans-serif; pointer-events: auto; letter-spacing: normal;"><span style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-weight: bold;"><span style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;"><?php echo $parow22['class_name'];?></span></span></p>

									<p class="font_8" style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font: 17px futura-lt-w01-light, sans-serif; pointer-events: auto; letter-spacing: normal;"><span style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;"><?php echo $parow22['short_details'];?></span></p>

									<p class="font_8" style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font: 17px futura-lt-w01-light, sans-serif; pointer-events: auto; letter-spacing: normal;"><span style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">Duration:&nbsp; &nbsp;&nbsp;<?php echo $parow22['duration'];?></span></p>

									<p class="font_8" style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font: 17px futura-lt-w01-light, sans-serif; pointer-events: auto; letter-spacing: normal;"><span style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">Cost:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &pound; <?php echo $parow22['cost'];?></span></p>

									<p class="font_8" style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font: 17px futura-lt-w01-light, sans-serif; pointer-events: auto; letter-spacing: normal;"><span style="border-style: none; border-color: inherit; border-width: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">Timing:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $parow22['timing'];?></span></p>


									
									<!-- tabs start -->
									<ul class="nav nav-tabs mt-40" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="tab01" data-toggle="tab" href="#tab01_pane" role="tab" aria-controls="tab01_pane" aria-expanded="true">What's Included</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="tab02" data-toggle="tab" href="#tab02_pane" role="tab" aria-controls="tab02_pane">How to Apply</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="tab03" data-toggle="tab" href="#tab03_pane" role="tab" aria-controls="tab03_pane">Message</a>
										</li>

									</ul>
									<div class="tab-content mb-40">

										<div class="tab-pane fade show active" id="tab01_pane" role="tabpanel" aria-labelledby="tab01">

											<?php echo $parow22['text_body'];?>

										</div>

										<div class="tab-pane fade" id="tab02_pane" role="tabpanel" aria-labelledby="tab02">
										<ol>
											<li>Choose the course type</li>

											<li>Call us on <a href="tel:<?php echo $settings_row['site_phone_call']; ?>"><?php echo $settings_row['site_phone']; ?></a> or <a href="<?php echo $settings_row['site_domain']; ?>Contact/">contact us</a> or email us on&nbsp;&nbsp;<a href="mailto:<?php echo $settings_row['site_email']; ?>"><?php echo $settings_row['site_email']; ?></a> with your preferred course and dates so that we can Check for availability of spaces, or complete the <a href="<?php echo $settings_row['site_domain']; ?>Contact/" target="_blank">Contact Form</a>.</li>

											<li>Subject to availability of spaces, you will then need to provide us with your Full Name, Telephone Number, Email Address and Home Address, and we&nbsp;will then require you to make a deposit payment to secure your place.</li>

											<li>Once you have made your deposit payment, your place on the course&nbsp;will be secured and a confirmation will be sent out to you respectively.</li>

											<li>You can then pay the balance of your course fees any time prior to commencement of the course week that you have chosen or on the first day of the course.</li>

											<li>Finally, we&nbsp;will send you a final confirmation&nbsp;prior to commencement of the course, with a summary of the course content, location, a map and directions to the training location</li>
										</ol>
										</div>


										<div class="tab-pane fade" id="tab03_pane" role="tabpanel" aria-labelledby="tab03">

											<form class="contact-form c-mb-20 c-gutter-20" method="post" action="<?php echo $settings_row['site_domain']; ?>">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<i class="flaticon-profile"></i>
													<input type="text" name="name" class="form-control" placeholder="name">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<i class="flaticon-volume"></i>
													<input type="tel" name="phone" class="form-control" placeholder="Phone Number">
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<i class="flaticon-envelope"></i>
													<input type="email" name="email" class="form-control" placeholder="email">

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<i class="flaticon-clip"></i>
													<textarea rows="4" cols="45" name="message" class="form-control" placeholder="message"></textarea>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="fw-divider-space hidden-below-lg mt-60"></div>
												<div class="form-group">
													<button type="submit" class="btn btn-outline-maincolor">send message</button>
												</div>
											</div>

										</div>
									</form>

										</div>

									</div>
						</div>


					</div>
				</div>
			</section>	


    <?php include("ins/footer.php");?>

		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->

    <?php include("ins/js.php");?>

    <?php echo $settings_row['footer_script']; ?>

</body>

</html>