<?php include("ins/base.php");
include("admin/assets/includes/inc/config.php");
if(isset($_GET['page_url'])){$page_url = str_replace('-',' ',$_GET['page_url']);}
$paresult22 = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_url = '$page_url' AND page_status = 'Active'");
$parow22 = mysqli_fetch_array($paresult22);
mysqli_close($servercnx);
$pid = $parow22['id'];
$purl = $parow22['page_url'];
?>
      
<?php 
include("admin/assets/includes/inc/config.php");
if(isset($_GET['blog_url'])){$blog_url = str_replace('-',' ',$_GET['blog_url']);}
$blog_f = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_url = '$blog_url'");
$resultb = mysqli_fetch_array($blog_f);
mysqli_close($servercnx);
$pid = $resultb['id'];
$id = $resultb['id'];
$blog_uniid = $resultb['blog_uniid'];
$blog_views = $resultb['blog_views'];
$cover_width = $resultb['cover_width'];
$cover_height = $resultb['cover_height'];
?>
 
<?php 
include("admin/assets/includes/inc/config.php");
if(isset($resultb['id'])) {$id=$resultb['id'];  if($id==''){unset($id);}}
if(isset($resultb['blog_views'])) {$blog_views = ($resultb['blog_views']+1);}

$view_at = date("F d Y h:i:s A");
if(isset($blog_views)
&& isset($view_at)
&& isset($id)){

$result = mysqli_query($servercnx,"UPDATE blog_post SET
					   blog_views = '$blog_views',
			view_at = '$view_at' WHERE id = '$id'");
}
?>
    <title><?php if(!empty($resultb['seo_title'])){ echo $resultb['seo_title'];}else{ echo "404 Page Not Foumd";} ?></title>

    <meta name="keywords" content="<?php if(!empty($resultb['seo_keywords'])){ echo $resultb['seo_keywords'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="description" content="<?php if(!empty($resultb['seo_description'])){ echo $resultb['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="author" content="Mates Technologies">

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

    <link rel="publisher" href="<?php echo $settings_row['site_domain']; ?>"/>

    <meta name="robots" content="<?php echo $resultb['robots'];?>" />

    <link rel="canonical" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/<?php echo str_replace(' ','-',$resultb['blog_url']);?>/"/>
    
    <!-- Open Graph Tags Start-->

    <meta itemprop="name" content="<?php if(!empty($resultb['seo_title'])){ echo $resultb['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="description" content="<?php if(!empty($resultb['seo_description'])){ echo $resultb['seo_description'];}else{ echo "404 Page Not Foumd";} ?>">
        
    <meta itemprop="image" content="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['cover_path']; ?>">

    <meta property="og:locale" content="en_GB" />

    <meta property="og:locale:alternate" content="en_US" />

    <meta property="og:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/<?php echo str_replace(' ','-',$resultb['blog_url']);?>/" />

    <meta property="og:type" content="article" />

    <meta property="article:published_time" content="<?php if(!empty($resultb['blog_created_at'])){ echo $resultb['blog_created_at'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="article:modified_time " content="<?php if(!empty($resultb['blog_updated_at'])){ echo $resultb['blog_updated_at'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="article:author" content="The Zara" />

    <meta property="article:section" content="<?php if(!empty($parow22['page_title'])){ echo $parow22['page_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:site_name" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/<?php echo str_replace(' ','-',$resultb['blog_url']);?>/">

    <meta property="og:title" content="<?php if(!empty($resultb['seo_title'])){ echo $resultb['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:description" content="<?php if(!empty($resultb['seo_description'])){ echo $resultb['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="og:image" content="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['cover_path']; ?>" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="<?php if ($cover_width == '0') { echo "1349"; } else { echo "$cover_width"; } ?>" />

    <meta property="og:image:height" content="<?php if ($cover_height == '0') { echo "400"; } else { echo "$cover_height"; } ?>" />

    <meta name="twitter:url" content="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$parow22['page_url']);?>/<?php echo str_replace(' ','-',$resultb['blog_url']);?>/" />

    <meta name="twitter:card" content="<?php if(!empty($resultb['blog_summary'])){ echo $resultb['blog_summary'];}else{ echo "404 Page Not Foumd";} ?>">

    <meta name="twitter:site" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta name="twitter:creator" content="@<?php if(!empty($settings_row['insta_user'])){ echo $settings_row['insta_user'];}else{ echo "matestechnolog";} ?>" />

    <meta property="twitter:title" content="<?php if(!empty($resultb['seo_title'])){ echo $resultb['seo_title'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:description" content="<?php if(!empty($resultb['seo_description'])){ echo $resultb['seo_description'];}else{ echo "404 Page Not Foumd";} ?>" />

    <meta property="twitter:image:" content="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['cover_path']; ?>" />

    <meta name="twitter:image:alt" content="<?php if(!empty($resultb['seo_title'])){ echo $resultb['seo_title'];}else{ echo "404 Page Not Foumd";} ?>">

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

			<!-- Blog Post -->
			<section class="ls s-pt-70 s-pb-20 s-pb-sm-70 s-py-lg-100 s-py-xl-70 c-gutter-60">
				<div class="container">
					<div class="row">
						<main class="col-lg-8 col-xl-8">
							<article class="vertical-item post text-left type-post status-publish format-standard has-post-thumbnail">

								<!-- .post-thumbnail -->
								<div class="item-media post-thumbnail">
									<img src="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['cover_path']; ?>" alt="<?php echo $resultb['seo_title']; ?>">
								</div>


								<div class="item-content border-0 text-center text-lg-left">
									

									<div class="entry-content">
										<h1 class="entry-title">
												<?php echo $resultb['blog_title']; ?>
										</h1>
										<div class="entry-meta-head">
											<div class="entery-views">
												<span><span><?php echo $resultb['blog_views']; ?></span> views</span>
											</div>

											<div class="entry-date">
												<span><?php echo $resultb['blog_date']; ?> - <?php echo $resultb['blog_create_time']; ?></span>
											</div>
										</div>
										<?php echo $resultb['blog_body']; ?>

										<section class="ls s-py-20 s-py-md-10 container-px-5">
											<div class="container-fluid">
												<div class="row">
													<div class="col-lg-12">
														<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5">
													<?php
							                         $ser_1 = mysqli_query($servercnx,"SELECT * FROM blog_images WHERE blog_id = '$id'"); 
							                         while ($ser1 = mysqli_fetch_array($ser_1)) { 
							                        ?>
															<div class="col-xl-3 col-sm-6">
																<div class="vertical-item item-gallery text-center ls">
																	<div class="item-media">
																		<img src="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['gallery_path']; ?><?php echo $ser1['image_file']; ?>" alt="<?php echo $resultb['blog_title'];?>" >
																		<div class="media-links">
																			<div class="links-wrap">
																				<a class="link-zoom photoswipe-link" title="<?php echo $resultb['blog_title'];?>" href="<?php echo $settings_row['site_domain']; ?><?php echo $resultb['gallery_path']; ?><?php echo $ser1['image_file']; ?>" data-width="<?php echo $ser1['gallery_width']; ?>"  data-width="800" data-height="800"></a>
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

						<aside class="col-lg-4 col-xl-4">

							<div class="widget widget_categories">

								<h3 class="widget-title">Our Latest Posts</h3>

								<ul>
									<li>
										<ul class="children list1"><?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE id NOT LIKE '$pid%' AND blog_status = 'Active' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' AND page_category = '14' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?>
											<li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>"><?php echo $bd['blog_title']; ?></a></li>
									<?php }?>
							<?php }?>
										</ul>
									</li>
								</ul>
							</div>

						</aside>
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