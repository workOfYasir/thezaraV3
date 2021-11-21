<?php include("ins/base.php");?>
        
<?php 
include("admin/assets/includes/inc/config.php");
$paresult22 = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_url = 'index'");
$parow22 = mysqli_fetch_array($paresult22);
mysqli_close($servercnx);
$pid = $parow22['id'];
$purl = $parow22['page_url'];
$cover_height = $parow22['cover_height'];
$cover_width = $parow22['cover_width'];
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

    <link rel="canonical" href="<?php echo $settings_row['site_domain']; ?>index/"/>
    
    <!-- Open Graph Tags Start-->

    <meta itemprop="name" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>">

    <meta property="og:locale" content="en_GB" />

    <meta property="og:locale:alternate" content="en_US" />

    <meta property="og:url" content="<?php echo $settings_row['site_domain']; ?>index/" />

    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="<?php echo $settings_row['site_domain']; ?>index/">

    <meta property="og:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="<?php if ($cover_width == '0') { echo "1349"; } else { echo "$cover_width"; } ?>" />

    <meta property="og:image:height" content="<?php if ($cover_height == '0') { echo "400"; } else { echo "$cover_height"; } ?>" />

    <meta name="twitter:url" content="<?php echo $settings_row['site_domain']; ?>index/" />

    <meta name="twitter:card" content="<?php if(!empty($parow22['page_summary'])){ echo $parow22['page_summary'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="twitter:site" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta name="twitter:creator" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta property="twitter:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:image:" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" />

    <meta name="twitter:image:alt" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">

	<!-- Open Graph Tags End-->

    <!-- Start CSS -->

    <?php include("ins/css.php");?>
        

    <!-- End CSS -->

    <?php echo $settings_row['head_script']; ?>

    <?php echo $parow22['head_script']; ?>


</head>

<body>
    
    <?php echo $settings_row['after_head']; ?>

    <?php echo $parow22['after_head']; ?>
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
			<section class="page_slider">
				<div class="flexslider nav-true">
					<ul class="slides">
						<?php
                        include("admin/assets/includes/inc/config.php");
                         $img_fr = mysqli_query($servercnx,"SELECT * FROM slidei WHERE type = 'Home' ORDER BY id "); 
                         while ($img_f1 = mysqli_fetch_array($img_fr)) { 
                        ?><li class="ls cover-image">
							<img src="<?php echo $settings_row['site_domain']; ?>images/Slider/<?php echo $img_f1['slide_image']; ?>" alt="<?php echo $parow22['seo_title']; ?>" title="<?php echo $parow22['seo_title']; ?>" width="<?php echo $img_f1['image_width']; ?>" height="<?php echo $img_f1['image_height']; ?>">
						</li>
                        <?php }?>

						<li class="ls cover-image">
							<img src="<?php echo $settings_row['site_domain']; ?>images/slide01.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeInLeft">
													<h2 class="intro_featured_word"><?php echo $settings_row['site_name']; ?></h2>
												</div>
									<div class="intro_layer mt-30" data-animation="fadeInUp">
										<p class="intro_after_featured_word text-center"><?php echo $stexts_row['title10']; ?></p>
									</div>
											</div> <!-- eof .intro_layers -->
										</div> <!-- eof .intro_layers_wrapper -->
									</div> <!-- eof .col-* -->
								</div><!-- eof .row -->
							</div><!-- eof .container -->
						</li>

					</ul>
				</div> <!-- eof flexslider -->
				<div class="prev-slide"></div>
				<div class="next-slide"></div>
			</section>

			<!-- About US -->
			<section class="ls hello s-pt-50 s-pt-lg-20 c-mb-30 c-gutter-60">
				<div class="container">
					<div class="row">
						<div class="col-4 d-none d-md-block">
							<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" alt="<?php echo $stexts_row['title10']; ?>" title="<?php echo $stexts_row['title10']; ?>">
						</div>
						<div class="col-md-8 col-12">
							<div class="d-none d-xl-block"></div>
							<div class="title-section text-center text-md-left">
								<span class="sub-title absolute-subtitle">welcome</span>
								<h3 class="special-heading"><?php echo $stexts_row['title9']; ?> - <span><span>T</span>he Zara</span></h3>
								<blockquote class="animate" data-animation="pulse" data-delay="150"><p><?php echo $stexts_row['title10']; ?></p></blockquote>
							</div>
							<div class="d-none d-xl-block"></div>
							<div class="row">
								<div class="col-lg-12 animate" data-animation="fadeInRightBig" data-delay="150">
									<?php echo $parow22['page_body'];?>
								</div>
							</div>
							<div class="d-none d-xl-block"></div>
							<div class="row c-gutter-30 justify-content-start">
								<div class="owl-carousel" data-loop="true" data-margin="20" data-nav="true" data-dots="true" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="2" data-responsive-lg="4">
									<?php
                         $ser_l2r = mysqli_query($servercnx,"SELECT * FROM service ORDER BY title "); // WHERE active = 'Active'
                         while ($serd = mysqli_fetch_array($ser_l2r)) { 
                        ?>
									<div class="step-item">
										<div class="hello-img text-center">
											<img src="<?php echo $settings_row['site_domain']; ?>images/Services/<?php echo $serd['thumb']; ?>" width="183" height="183" alt="<?php echo $serd['title']; ?>">
											<span><?php echo $serd['title']; ?></span>
										</div>
									</div>
                        <?php }?>
								</div>

							</div>


						</div>
					</div>
				</div>
			</section>

			<!-- Videos -->
			<section class="ls ms s-overlay s-parallax video-section s-pt-295 s-pt-sm-410 s-pt-md-360 s-pb-md-100 s-pt-lg-395 s-pb-lg-150 s-pt-xl-290 s-pb-xl-70 s-pb-60">
				<div class="container">
					<div class="row">
						<div class="col-xl-2">
							<h3 class="special-heading video-title text-center text-xl-left darktext"><?php echo $stexts_row['title1']; ?></h3>
						</div>
						<div class="col-xl-10">
							<div class="owl-carousel" data-loop="true" data-margin="30" data-nav="true" data-dots="true" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="1" data-responsive-lg="1">
								<div class="video-simple">
									<a href="<?php echo $settings_row['site_domain']; ?><?php echo $stexts_row['home_v_title']; ?>" class="photoswipe-link" data-width="800" data-height="800" data-iframe="https://www.youtube.com/embed/<?php echo $stexts_row['home_v_link']; ?>">
										<img src="<?php echo $settings_row['site_domain']; ?><?php echo $stexts_row['home_v_title']; ?>" alt="<?php echo $stexts_row['title1']; ?>">
									</a>
								</div>
								<div class="video-simple">
									<a href="<?php echo $settings_row['site_domain']; ?><?php echo $stexts_row['home_v_title2']; ?>" class="photoswipe-link" data-width="800" data-height="800" data-iframe="https://www.youtube.com/embed/<?php echo $stexts_row['home_v_link2']; ?>">
										<img src="<?php echo $settings_row['site_domain']; ?><?php echo $stexts_row['home_v_title2']; ?>" alt="<?php echo $stexts_row['title1']; ?>">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Services -->
			<section class="ls s-pt-60 s-pt-lg-50 s-pt-xl-100 s-pb-60 s-pb-lg-50 s-pb-xl-20 service">
				<div class="container">
					<div class="row">

						<div class="col-12 col-lg-6 text-center text-lg-left">
							<span class="sub-title">THEZARA</span>
							<h3 class="special-heading"><?php echo $stexts_row['title2']; ?></h3>
							<div class="divider-40 d-none d-xl-block"></div>
							<div class="divider-40 d-xl-none"></div>
						<?php
                        include("admin/assets/includes/inc/config.php");
                         $page_fr6 = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '4' AND page_status = 'Active' ORDER BY page_position LIMIT 0,2 "); 
                         while ($page_f6 = mysqli_fetch_array($page_fr6)) { 
                        ?>
							<div class="sevices-single">
								<div class="sevices-single__image">
									<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f6['page_url']);?>/"><img src="<?php echo $settings_row['site_domain']; ?><?php echo $page_f6['thumb_path']; ?>" alt="<?php echo $page_f1['seo_title']; ?>" title="<?php echo $page_f6['seo_title']; ?>" width="<?php echo $page_f6['thumb_width']; ?>" height="<?php echo $page_f1['thumb_height']; ?>"></a>
								</div>
								<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f6['page_url']);?>/">
									<h4><?php echo $page_f6['page_title']; ?></h4>
								</a>
								<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f6['page_url']);?>/"><span><?php echo $page_f6['page_summary']; ?></span></a>
							</div>
                        <?php }?>

							</div>

							<div class="col-12 col-lg-6 text-center text-lg-right">
								
							<?php
                        include("admin/assets/includes/inc/config.php");
                         $page_fr = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '4' AND page_status = 'Active' ORDER BY page_position LIMIT 2,2 "); 
                         while ($page_f1 = mysqli_fetch_array($page_fr)) { 
                        ?>
							<div class="sevices-single text-left">
								<div class="sevices-single__image">
									<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f1['page_url']);?>/"><img src="<?php echo $settings_row['site_domain']; ?><?php echo $page_f1['thumb_path']; ?>" alt="<?php echo $page_f1['seo_title']; ?>" title="<?php echo $page_f1['seo_title']; ?>" width="<?php echo $page_f1['thumb_width']; ?>" height="<?php echo $page_f1['thumb_height']; ?>"></a>
								</div>
								<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f1['page_url']);?>/">
									<h4><?php echo $page_f1['page_title']; ?></h4>
								</a>
								<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$page_f1['page_url']);?>/"><span><?php echo $page_f1['page_summary']; ?></span></a>
							</div>
                        <?php }?>

							<div class="services-button text-center text-lg-left">
								<a href="<?php echo $settings_row['site_domain']; ?>Portfolio/" class="btn btn-outline-maincolor">all services</a>
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

    <?php echo $parow22['footer_script']; ?>

    <?php include("ins/popup.php");?>

</body>

</html>