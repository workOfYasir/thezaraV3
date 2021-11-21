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

    <link rel="canonical" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/"/>
    
    <!-- Open Graph Tags Start-->

    <meta itemprop="name" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>">

    <meta property="og:locale" content="en_GB" />

    <meta property="og:locale:alternate" content="en_US" />

    <meta property="og:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/" />

    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['blog_url']);?>/">

    <meta property="og:title" content="<?php if(!empty($parow22['seo_title'])){ echo $parow22['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:description" content="<?php if(!empty($parow22['seo_description'])){ echo $parow22['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:image" content="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="<?php if ($cover_width == '0') { echo "1349"; } else { echo "$cover_width"; } ?>" />

    <meta property="og:image:height" content="<?php if ($cover_height == '0') { echo "400"; } else { echo "$cover_height"; } ?>" />

    <meta name="twitter:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/" />

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
												<a class="abs-link" title="<?php echo $bdd['blog_title']; ?>" href="<?php echo $settings_row['site_domain']; ?>Achievements/<?php echo str_replace(' ','-',$bdd['blog_url']);?>/"></a>
											</div>
										</div>
										<div class="item-content">
											<h5>
												<a href="<?php echo $settings_row['site_domain']; ?>Achievements/<?php echo str_replace(' ','-',$bdd['blog_url']);?>/"><?php echo $bdd['blog_title']; ?></a>
											</h5>
											<div class="small-text cat-links">
												<?php
                         $b1rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '".$bdd['blog_category']."' "); 
                         while ($bdcs = mysqli_fetch_array($b1rc)) { 
                        ?><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdcs['page_url']);?>/"><?php echo $bdcs['page_title']; ?></a><?php }?>
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


			<?php if ($pid == 2 ) {?>
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
												<a class="abs-link" title="<?php echo $bdd['blog_title']; ?>" href="<?php echo $settings_row['site_domain']; ?>Achievements/<?php echo str_replace(' ','-',$bdd['blog_url']);?>/"></a>
											</div>
										</div>
										<div class="item-content">
											<h5>
												<a href="<?php echo $settings_row['site_domain']; ?>Achievements/<?php echo str_replace(' ','-',$bdd['blog_url']);?>/"><?php echo $bdd['blog_title']; ?></a>
											</h5>
											<div class="small-text cat-links">
												<?php
                         $b1rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '".$bdd['blog_category']."' "); 
                         while ($bdcs = mysqli_fetch_array($b1rc)) { 
                        ?><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdcs['page_url']);?>/"><?php echo $bdcs['page_title']; ?></a><?php }?>
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

			<?php if ($pid == 23 ) {?>
			<section class="ls s-pt-70 s-pb-50 s-pb-sm-70 s-py-lg-100 s-py-xl-10 c-gutter-60">
				<div class="container">
					<div class="row">
						<main class="offset-lg-1 col-lg-10">
							<article class="vertical-item post text-left type-post status-publish format-standard has-post-thumbnail">

								<!-- .post-thumbnail -->
								<div class="item-media post-thumbnail">
									<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['cover_path']; ?>" alt="<?php echo $parow22['page_title'];?>">
								</div>

								<div class="item-content border-0 text-center text-lg-left">
									<div class="entry-content">
										<h1 class="entry-title"><?php echo $parow22['page_title'];?></h1>

										<?php echo $parow22['page_body'];?>

										<section class="ls s-py-20 s-py-md-10 container-px-5">
											<div class="container-fluid">
												<div class="row">
													<div class="col-lg-12">
														<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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

									</div>

								</div>
								<!-- .item-content -->
							</article>

						</main>
					</div>

				</div>
			</section>
						<?php } 
                         else { ?>
					<?php }?>

			<?php if ($pid == 4 ) {?>
			<section class="ls s-py-10 s-py-md-50 container-px-0">
				<div class="container">
					<div class="row">

						<div class="d-none d-lg-block divider-30"></div>

						<div class="col-lg-12">
							<?php echo $parow22['page_body'];?>

							<div class="row isotope-wrapper masonry-layout c-mb-30">
								<?php
                         $ser_l2r = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_status = 'Active' AND page_category = '4' ORDER BY page_position "); 
                         while ($serd = mysqli_fetch_array($ser_l2r)) { 
                        ?>
								<div class="col-xl-4 col-sm-6">
									<div class="vertical-item text-center content-padding box-shadow">
										<div class="item-media">
											<img src="<?php echo $settings_row['site_domain']; ?><?php echo $serd['cover_path']; ?>" alt="<?php echo $serd['page_title'];?>">
											<div class="media-links">
												<a class="abs-link" title="<?php echo $serd['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$serd['page_url']);?>/"></a>
											</div>
										</div>
										<div class="item-content">
											<h5>
												<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$serd['page_url']);?>/"><?php echo $serd['page_title'];?></a>
											</h5>
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
			<?php if ($pid == 5 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
			</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 7 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>
			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 6 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 8 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 9 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 10 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 11 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
				<div class="container">
					<div class="row">
						<?php echo $parow22['page_body'];?>
					</div>
				</div>
				</section>

			<section class="ls s-py-20 s-py-md-10 container-px-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
			<?php if ($pid == 12 ) {?>
				<section class="ls s-pt-60 s-pb-40 s-pt-md-100 s-pb-md-70">
					<div class="container">
					<div class="row">
							<div class="col-lg-12">
								<?php echo $parow22['page_body'];?>
							</div>

							<div class="divider-70 d-none d-lg-block"></div>
								<?php
								$ser_1 = mysqli_query($servercnx,"SELECT * FROM classes WHERE status = 'Active' ORDER BY position "); 
								while ($ser1 = mysqli_fetch_array($ser_1)) { 
								?>
							<div class="col-lg-4 col-md-6">
								<div class="pricing-plan box-shadow2">
									<div class="plan-name bg-maincolor">
										<h3><?php echo $ser1['class_name'];?></h3>
									</div>
									<div class="price-wrap color-darkgrey">
										<span class="plan-sign">£</span>
										<span class="plan-price"><?php echo $ser1['cost'];?></span>
									</div>
									<div class="plan-description small-text color-darkgrey">
									</div>
									<div class="plan-button" style="margin-top: 50px;">
									<a href="<?php echo $settings_row['site_domain']; ?>Class/<?php echo str_replace(' ','-',$ser1['url']);?>/" class="btn btn-maincolor">View Details</a>
								</div>
								</div>
							</div>
					<?php }?>
							<div class="divider-70 d-none d-lg-block"></div>
					</div>
					</div>
				</section>
									<section class="ls s-py-20 s-py-md-10 container-px-5">
											<div class="container-fluid">
												<div class="row">
													<div class="col-lg-12">
														<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM page_images WHERE page_id = '$pid' ORDER BY gallery_img_pos "); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $parow22['page_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $parow22['page_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $parow22['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
																			</div>
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
				<?php if ($pid == 13 ) {?>
				<section class="ls s-pt-60 s-pb-40 s-pt-md-100 s-pb-md-70">
					<div class="container">
					<div class="row">
							<div class="col-lg-12">

							<?php echo $parow22['page_body'];?>
								
							</div>

						<div class="divider-70 d-none d-lg-block"></div>
						<?php
							$ser_1 = mysqli_query($servercnx,"SELECT * FROM service ORDER BY id DESC "); 
							while ($ser1 = mysqli_fetch_array($ser_1)) { 
						?>
						<div class="col-lg-4 col-md-6">

							<div class="pricing-plan box-shadow">
								<div class="plan-name">
									<h3><?php echo $ser1['title']; ?></h3>
								</div>
								<div class="price-wrap color-darkgrey">
									<span class="plan-sign">£ </span>
									<span class="plan-price"> <?php echo $ser1['price']; ?></span>
								</div>
								<div class="plan-description small-text color-darkgrey">
									Per Person
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<?php
											$ser_line = mysqli_query($servercnx,"SELECT * FROM service_line WHERE service_id = '".$ser1['id']."' ORDER BY id DESC "); 
											while ($ser_lf = mysqli_fetch_array($ser_line)) { 
										?>
										<li><?php echo $ser_lf['line']; ?></li>

										<?php }?>
									</ul>
								</div>
								<div class="plan-button">
									<a href="<?php echo $settings_row['site_domain']; ?>Contact/" class="btn btn-outline-maincolor">Book A Slot</a>
								</div>
							</div>
						</div>
					<?php }?>

						<div class="divider-70 d-none d-lg-block"></div>
					</div>
					</div>
				</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 19 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
					<div class="container">
						<div class="row">
							<?php echo $parow22['page_body'];?>
						</div>
					</div>
				</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 20 ) {?>
				<section class="ls s-py-10 s-py-md-50 container-px-20">
					<div class="container">
						<div class="row">
							<?php echo $parow22['page_body'];?>
						</div>
					</div>
				</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 18 ) {?>
					<br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19828.38616128316!2d-0.407188!3d51.594842!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4269f9696fb7f178!2sThe%20Zara%20Makeup%20Artist!5e0!3m2!1sen!2sus!4v1613061991254!5m2!1sen!2sus" width="1349" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

				<section class="top_mask_add background-contact s-py-70 s-py-lg-100 s-py-xl-50 c-gutter-30">
					<div class="container">
						<div class="row c-mb-20">
							<div class="col-sm-4 animate" data-animation="pullDown">
								<div class="media media-top">
									<div class="icon-styled text-center bg-maincolor rounded">
										<i class="fa fa-phone"></i>
									</div>
									<p>
										<strong>Phone:</strong> <a href="tel:<?php echo $settings_row['site_phone_call']; ?>"><?php echo $settings_row['site_phone']; ?></a>
									</p>
								</div>
							</div>
							<div class="col-sm-4 animate" data-animation="pullDown">
								<div class="media media-top">
									<div class="icon-styled text-center bg-maincolor rounded">
										<i class="fa fa-map-marker"></i>
									</div>
									<p>
										<strong>Address:</strong> <?php echo $settings_row['site_address']; ?>
									</p>
								</div>
							</div>
							<div class="col-sm-4 animate" data-animation="pullDown">
								<div class="media media-top">
									<div class="icon-styled text-center bg-maincolor rounded">
										<i class="fa fa-envelope-o"></i>
									</div>
									<p>
										<strong>Email:</strong> <a href="mailto:<?php echo $settings_row['site_email']; ?>"><?php echo $settings_row['site_email']; ?></a>
									</p>
								</div>
							</div>
						</div>

						<div class="fw-divider-space hidden-below-lg mt-40"></div>
						<div class="fw-divider-space hidden-above-lg mt-20"></div>
						<div class="row">
							<div class="col-12 animate" data-animation="scaleAppear">
								<div class="ls ms s-parallax s-overlay p-30">
									<h3 class="mt-0 mb-35 text-capitalize">get in touch</h3>
									<form class="contact-form c-mb-20 c-gutter-20" method="post" action="">
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
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-envelope"></i>
												<input type="email" name="email" class="form-control" placeholder="email" required>
											</div>
										</div>
									
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-calendar"></i>
												<input type="date" name="date" class="form-control" placeholder="Date" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<i class="flaticon-cloud"></i>
												<select name="billing_country" id="billing_country" class="country_to_state country_select  select2-hidden-accessible" tabindex="-1" aria-hidden="true">
													<option>Please Select</option>	
													<option></option>																						
													<option value="Appointment" selected="">I want to book an appointment</option>
													<option></option>

													<option>--- Services ---</option>
													<?php
														$ser_1 = mysqli_query($servercnx,"SELECT * FROM service ORDER BY id DESC "); 
														while ($ser1 = mysqli_fetch_array($ser_1)) { 
													?>
													<option value="<?php echo $ser1['title']; ?>"><?php echo $ser1['title']; ?></option>
													<?php }?>
													<option></option>

													<option>--- Classes ---</option>
													<?php
														$ser_2 = mysqli_query($servercnx,"SELECT * FROM classes ORDER BY position "); 
														while ($ser2 = mysqli_fetch_array($ser_2)) { 
													?>
													<option value="<?php echo $ser2['class_name']; ?>"><?php echo $ser2['class_name']; ?></option>
													<?php }?>
													<option></option>

													<option>--- Remedies ---</option>
													<?php
														$ser_2 = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '17' ORDER BY blog_date DESC "); 
														while ($ser2 = mysqli_fetch_array($ser_2)) { 
													?>
													<option value="<?php echo $ser2['blog_title']; ?>"><?php echo $ser2['blog_title']; ?></option>
													<?php }?>
													<option></option>
												</select>
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
												<div class="form-group">
										<input type="checkbox" name="consent" id="consent" value="Agreed on" required />
					                             By sending this request you fully understand and accepting our <a href="" style="padding: 0px 5px 0px 5px;">Privacy Policy.</a>
					                      		<input type="text" name="phoneNumber6tY4bPYk" autocomplete="off" value="" style="display: none;" />
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
							<!--.col-* -->
						</div>

						<div class="col-md-12 animate" data-animation="slideExpandUp" data-delay="150"><?php echo $parow22['page_body'];?></div>

					</div>

				</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 21 ) {?>
					<section class="background-contact s-pt-60 s-pt-lg-100 s-pt-xl-50 s-pb-60 s-pb-xl-90 c-mb-20 c-gutter-60">
					<div class="container">
						<div class="row">

							<div class="fw-divider-space hidden-above-lg mt-20"></div>

							<div class="col-lg-7 col-xl-8 animate" data-animation="scaleAppear">
								<h3 class="mt-0 mb-35 text-capitalize">Send us an appointment request.</h3>
								<form class="contact-form c-mb-20 c-gutter-20" method="post" action="">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-profile"></i>
												<input type="text" name="name" class="form-control" placeholder="name" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-volume"></i>
												<input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-envelope"></i>
												<input type="email" name="email" class="form-control" placeholder="email" required>
											</div>
										</div>
									
										<div class="col-sm-6">
											<div class="form-group">
												<i class="flaticon-calendar"></i>
												<input type="date" name="date" class="form-control" placeholder="Date" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<i class="flaticon-cloud"></i>
												<select name="billing_country" id="billing_country" class="country_to_state country_select  select2-hidden-accessible" tabindex="-1" aria-hidden="true">
													<option>Please Select</option>	
													<option></option>																						
													<option value="Appointment" selected="">I want to book an appointment</option>
													<option></option>

													<option>--- Services ---</option>
													<?php
														$ser_1 = mysqli_query($servercnx,"SELECT * FROM service ORDER BY id DESC "); 
														while ($ser1 = mysqli_fetch_array($ser_1)) { 
													?>
													<option value="<?php echo $ser1['title']; ?>"><?php echo $ser1['title']; ?></option>
													<?php }?>
													<option></option>

													<option>--- Classes ---</option>
													<?php
														$ser_2 = mysqli_query($servercnx,"SELECT * FROM classes ORDER BY position "); 
														while ($ser2 = mysqli_fetch_array($ser_2)) { 
													?>
													<option value="<?php echo $ser2['class_name']; ?>"><?php echo $ser2['class_name']; ?></option>
													<?php }?>
													<option></option>

													<option>--- Remedies ---</option>
													<?php
														$ser_2 = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '17' ORDER BY blog_date DESC "); 
														while ($ser2 = mysqli_fetch_array($ser_2)) { 
													?>
													<option value="<?php echo $ser2['blog_title']; ?>"><?php echo $ser2['blog_title']; ?></option>
													<?php }?>
													<option></option>
												</select>
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
											<div class="form-group">
					                            <input type="checkbox" name="consent" id="consent" value="Agreed on" required />
					                             By sending this request you fully understand and accepting our <a href="<?php echo $settings_row['site_domain']; ?>Privacy Policy/" style="padding: 0px 5px 0px 5px;">Privacy Policy.</a>
					                      		<input type="text" name="phoneNumber6tY4bPYk" autocomplete="off" value="" style="display: none;" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="fw-divider-space hidden-below-lg mt-10"></div>
											<div class="form-group">
												<button type="submit" class="btn btn-outline-maincolor">send request</button>
											</div>
										</div>

									</div>
								</form>
							</div>
							<!--.col-* -->
							<div class="col-lg-5 col-xl-4 animate" data-animation="scaleAppear">
								<div class="fw-divider-space hidden-above-lg mt-40"></div>
								<h3 class="mt-0 mb-25 text-capitalize">Contact info</h3>
								<div class="media mb-15">
									<h5 class="fs-20 mb-0 min-w-100">Address:</h5>
									<div class="media-body ml-0 d-flex flex-column">
										<span><?php echo $settings_row['site_address']; ?></span>
									</div>
								</div>
								<div class="media mb-15">
									<h5 class="fs-20 mb-0 min-w-100">Phone:</h5>
									<div class="media-body ml-0 d-flex flex-column">
										<span><a href="tel:<?php echo $settings_row['site_phone_call']; ?>"><?php echo $settings_row['site_phone']; ?></a></span>
									</div>
								</div>
								<div class="media mb-20">
									<h5 class="fs-20 mb-30 min-w-100">Email:</h5>
									<div class="media-body ml-0 d-flex flex-column">
										<span><a href="mailto:<?php echo $settings_row['site_email']; ?>"><?php echo $settings_row['site_email']; ?></a></span>
									</div>
								</div>

								<?php echo $parow22['page_body'];?>

							</div>
							<!--.col-* -->
						</div>
					</div>
				</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 14 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<a href="blog-single-full.html">
														<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
													</a>
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<header class="entry-header">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bdc['page_title']; ?>"><?php echo $bdc['page_title']; ?></a>
													</header>
													<!-- .entry-header -->

													<div class="entry-content">
														<h3 class="entry-title">
															<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" rel="bookmark" title="<?php echo $bd['blog_title']; ?>">
																<?php echo $bd['blog_title']; ?>
															</a>
														</h3>
														<?php echo $bd['blog_summary']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>">read more</a>
														<span><?php echo $bd['blog_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>
							<?php }?>

									</div>
								</main>
							</div>
						</div>
					</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 15 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '15' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<a href="blog-single-full.html">
														<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
													</a>
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<header class="entry-header">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bdc['page_title']; ?>"><?php echo $bdc['page_title']; ?></a>
													</header>
													<!-- .entry-header -->

													<div class="entry-content">
														<h3 class="entry-title">
															<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" rel="bookmark" title="<?php echo $bd['blog_title']; ?>">
																<?php echo $bd['blog_title']; ?>
															</a>
														</h3>
														<?php echo $bd['blog_summary']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>">read more</a>
														<span><?php echo $bd['blog_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>
							<?php }?>

									</div>
								</main>
							</div>
						</div>
					</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 24 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '24' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<a href="blog-single-full.html">
														<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
													</a>
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<header class="entry-header">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bdc['page_title']; ?>"><?php echo $bdc['page_title']; ?></a>
													</header>
													<!-- .entry-header -->

													<div class="entry-content">
														<h3 class="entry-title">
															<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" rel="bookmark" title="<?php echo $bd['blog_title']; ?>">
																<?php echo $bd['blog_title']; ?>
															</a>
														</h3>
														<?php echo $bd['blog_summary']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>">read more</a>
														<span><?php echo $bd['blog_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>
							<?php }?>

									</div>
								</main>
							</div>
						</div>
					</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 17 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '17' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<a href="blog-single-full.html">
														<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
													</a>
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<header class="entry-header">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bdc['page_title']; ?>"><?php echo $bdc['page_title']; ?></a>
													</header>
													<!-- .entry-header -->

													<div class="entry-content">
														<h3 class="entry-title">
															<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" rel="bookmark" title="<?php echo $bd['blog_title']; ?>">
																<?php echo $bd['blog_title']; ?>
															</a>
														</h3>
														<?php echo $bd['blog_summary']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>">read more</a>
														<span><?php echo $bd['blog_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>
							<?php }?>

									</div>
								</main>
							</div>
						</div>
					</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 16 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '16' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<a href="blog-single-full.html">
														<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
													</a>
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<header class="entry-header">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bdc['page_title']; ?>"><?php echo $bdc['page_title']; ?></a>
													</header>
													<!-- .entry-header -->

													<div class="entry-content">
														<h3 class="entry-title">
															<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" rel="bookmark" title="<?php echo $bd['blog_title']; ?>">
																<?php echo $bd['blog_title']; ?>
															</a>
														</h3>
														<?php echo $bd['blog_summary']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>">read more</a>
														<span><?php echo $bd['blog_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>
							<?php }?>

									</div>
								</main>
							</div>
						</div>
					</section>
						<?php } 
                         else { ?>
					<?php }?>
				<?php if ($pid == 22 ) {?>
					<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-pt-xl-50 s-pb-xl-70 c-gutter-5">
						<div class="container">
							<div class="row c-mb-40">
								<main class="col-12">
									<?php echo $parow22['page_body'];?>
									<div class="row isotope-wrapper masonry-layout">
										<?php
                         $ser_l2r = mysqli_query($servercnx,"SELECT * FROM testimonials WHERE testimonial_status = 'Active' ORDER BY testimonial_date "); 
                         while ($serd = mysqli_fetch_array($ser_l2r)) { 
                        ?>
										<div class="col-md-6">
											<article class="text-center text-md-left vertical-item post type-post status-publish format-standard">
												<div class="item-media post-thumbnail">
													<img src="<?php echo $settings_row['site_domain']; ?><?php echo $serd['cover_path']; ?>" alt="<?php echo $serd['testimonial_name']; ?>">
												</div><!-- .post-thumbnail -->
												<div class="item-content">
													<div class="entry-content">
														<h3 class="entry-title">
															<?php echo $serd['testimonial_name']; ?>
														</h3>
														<?php echo $serd['testimonial_body']; ?>
													</div><!-- .entry-content -->
													<div class="entry-meta">
														<span><?php echo $serd['testimonial_date']; ?></span>
													</div>
													<!-- .entry-meta -->
												</div><!-- .item-content -->
											</article><!-- #post-## -->
										</div>
									<?php }?>

									</div>
								</main>
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