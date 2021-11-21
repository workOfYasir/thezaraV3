<?php include("ins/base.php");?>
        
<?php 
include("admin/assets/includes/inc/config.php");
if(isset($_GET['page_url'])){$page_url = str_replace('-',' ',$_GET['page_url']);}
$paresult22 = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_url = '$page_url' AND page_status = 'Active'");
$parow22 = mysqli_fetch_array($paresult22);
mysqli_close($servercnx);
$pid = $parow22['id'];
$purl = $parow22['page_url'];
$cover_height = $parow22['cover_height'];
$cover_width = $parow22['cover_width'];
?><?php 
include("admin/assets/includes/inc/config.php");
$pdfresult = mysqli_query($servercnx,"SELECT * FROM pdf_files WHERE id_for = '".$parow22['page_uniid']."' AND pdf_for = 'Page' ");
$pdfrow = mysqli_fetch_array($pdfresult);
$pdf_file = $pdfrow['file'];
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

    <link rel="canonical" href="<?php echo $settings_row['site_domain']; ?>"/>
    
    <!-- Open Graph Tags Start-->

    <meta itemprop="name" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>">

    <meta property="og:locale" content="en_GB" />

    <meta property="og:locale:alternate" content="en_US" />

    <meta property="og:url" content="<?php echo $settings_row['site_domain']; ?>" />

    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta property="og:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="<?php if ($cover_width == '0') { echo "1349"; } else { echo "$cover_width"; } ?>" />

    <meta property="og:image:height" content="<?php if ($cover_height == '0') { echo "400"; } else { echo "$cover_height"; } ?>" />

    <meta name="twitter:url" content="<?php echo $settings_row['site_domain']; ?>" />

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
			<section class="page_title s-parallax s-overlay ls title-overlay s-py-25" style="background-image: url('<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>')">
				<div class="container">
					<div class="row">

						<div class="fw-divider-space hidden-below-lg mt-130"></div>
						<div class="fw-divider-space hidden-above-lg mt-60"></div>

						<div class="col-md-12 text-center">
							<h1 class="dodo"><?php if(!empty($parow22['page_title'])){ echo $parow22['page_title'];}else{ echo "404 Page Not Foumd";} ?></h1>
						</div>

						<div class="fw-divider-space hidden-below-lg mt-130"></div>
						<div class="fw-divider-space hidden-above-lg mt-60"></div>

					</div>
				</div>
			</section>

		<?php if ($pid == 3 ) {?>
			<!-- About US -->
			<section class="ls hello s-pt-50 s-pt-lg-20 c-mb-30 c-gutter-60">
				<div class="container">
					<div class="row">
						<div class="col-4 d-none d-md-block">
							<img src="<?php echo $settings_row['site_domain']; ?>images/parallax/hello-bg.jpg" alt="<?php echo $stexts_row['title10']; ?>" title="<?php echo $stexts_row['title10']; ?>">
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
								<div class="owl-carousel" data-loop="true" data-margin="20" data-nav="true" data-dots="true" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="2" data-responsive-lg="4"><?php
                         $ser_l2r = mysqli_query($servercnx,"SELECT * FROM service WHERE active = 'Active' ORDER BY title "); 
                         while ($serd = mysqli_fetch_array($ser_l2r)) { 
                        ?>
									<div class="step-item">
										<div class="hello-img text-center">
											<img src="<?php echo $settings_row['site_domain']; ?>images/services/Thumb/<?php echo $serd['thumb']; ?>" width="183" height="183" alt="<?php echo $serd['title']; ?>">
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

			<section class="ls s-py-10 s-py-md-10">
				<div class="container">
					<div class="row">

						<div class="col-lg-12">	
							<h3 class="special-heading text-center animate" data-animation="pulse"> <span><span>T</span>he Zara</span> Achievements</h3>
							<div class="row isotope-wrapper masonry-layout c-gutter-10 c-mb-30">
						<?php
                         $b_acr = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '24' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bdd = mysqli_fetch_array($b_acr)) { 
						$bcidd = $bdd['blog_category'];
                        ?>
								<div class="col-xl-4 col-sm-6 business news">

									<div class="vertical-item text-center content-padding box-shadow">
										<div class="item-media">
											<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bdd['thumb_path']; ?>"  alt="<?php echo $bdd['blog_title']; ?>">
											<div class="media-links">
												<a class="abs-link" title="<?php echo $bdd['blog_title']; ?>" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdd['blog_url']);?>/"></a>
											</div>
										</div>
										<div class="item-content">
											<h5>
												<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdd['blog_url']);?>/"><?php echo $bdd['blog_title']; ?></a>
											</h5>
											<div class="small-text cat-links">
												<?php
                        include("admin/assets/includes/inc/config.php");
                         $b1rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '".$bdd['blog_category']."' "); 
                         while ($bdcs = mysqli_fetch_array($b1rc)) { 
                        ?><a href="<?php echo $settings_row['site_domain']; ?>Blog/<?php echo str_replace(' ','-',$bdcs['page_url']);?>/"><?php echo $bdcs['page_title']; ?></a><?php }?>
											</div>
										</div>
									</div>
								</div>
								<?php }?>

							</div>
						</div>
					</div>

				</div>
			</section>
						<?php } 
                         else { ?>
					<?php }?>

    <?php include("ins/footer.php");?>

		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->

    <?php include("ins/js.php");?>

    <?php echo $settings_row['footer_script']; ?>

    <?php echo $parow22['footer_script']; ?>

</body>

</html>