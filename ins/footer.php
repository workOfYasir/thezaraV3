

					<?php if ($pid == 22 ) {?>
						<?php } 
                         else { ?>
			<!-- Testimonials -->
			<section class="ls quote-section s-py-60 s-pt-lg-90 s-pb-lg-100 s-pt-xl-60 s-pb-xl-50">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h3 class="special-heading text-center"><?php echo $stexts_row['title4']; ?></h3>
							<div class="owl-carousel" data-loop="true" data-margin="30" data-nav="true" data-dots="true" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="1" data-responsive-lg="1"><?php
                         $ser_l2r = mysqli_query($servercnx,"SELECT * FROM testimonials WHERE testimonial_status = 'Active' ORDER BY testimonial_date DESC LIMIT 0,3 "); 
                         while ($serd = mysqli_fetch_array($ser_l2r)) { 
                        ?>
									<div class="quote-item">
									<div class="quote__image">
										<img src="<?php echo $settings_row['site_domain']; ?><?php echo $serd['cover_path']; ?>" alt="<?php echo $serd['testimonial_name']; ?>">
									</div>
									<blockquote>
										<footer>
											<cite><?php echo $serd['testimonial_name']; ?> - <span><?php echo $serd['testimonial_date']; ?></span></cite>
										</footer>
										<?php echo $serd['testimonial_body']; ?>
									</blockquote>
								</div>
                        <?php }?>
								

							</div>
						</div>
					</div>
				</div>
			</section>
                        <?php }?>
			<!-- Brands -->
			<section class="ls footer-gallery c-gutter-0 container-px-0 s-pb-xl-50">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h3 class="special-heading text-center"><?php echo $stexts_row['title5']; ?></h3>

							<div class="owl-carousel small-gallery-carousel" data-margin="1" data-nav="true" data-center="false"  data-autoplay="true" data-items="1" data-responsive-lg="8" data-responsive-md="4" data-responsive-sm="3" data-responsive-xs="2" data-loop="true">
								<?php
                        include("admin/assets/includes/inc/config.php");
                         $img_fr = mysqli_query($servercnx,"SELECT * FROM slidei WHERE type = 'Brand' ORDER BY id "); 
                         while ($img_f1 = mysqli_fetch_array($img_fr)) { 
                        ?>
                        	<a href="<?php echo $settings_row['site_domain']; ?>images/Slider/<?php echo $img_f1['slide_image']; ?>" class="photoswipe-link" data-width="<?php echo $img_f1['image_width']; ?>" data-height="<?php echo $img_f1['image_height']; ?>">
									<img src="<?php echo $settings_row['site_domain']; ?>images/Slider/thumb/<?php echo $img_f1['slide_image']; ?>" alt="<?php echo $parow22['seo_title']; ?>" title="<?php echo $parow22['seo_title']; ?>">
								</a>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>


		<?php if ($purl == 'index' ) {?>
			<!-- Appointment -->
			<section class="ls appointment s-py-10 container-px-xl-165 container-px-lg-40 container-px-md-10">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-md-6 col-xl-6 d-none d-md-block">
							<img src="<?php echo $settings_row['site_domain']; ?>images/parallax/appoitment-bg.jpg" alt="">
						</div>
						<div class="col-12 col-md-6 col-xl-6">

							<form class="appointment-form c-mb-20 c-gutter-20" method="post" action="">
								<div class="divider-100 d-none d-xl-block"></div>
								<span class="sub-title text-center text-md-left darktext">TheZara’s Quick</span>
								<h3 class="special-heading text-center text-md-left darktext"><?php echo $stexts_row['title6']; ?></h3>
								<div class="divider-70 d-none d-xl-block"></div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<i class="flaticon-profile"></i>
											<input type="text" name="name" class="form-control" placeholder="full name" required="">
										</div>
									</div>


								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<i class="flaticon-headphones"></i>
											<input type="tel" name="phone" class="form-control" placeholder="phone" required="">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<i class="flaticon-envelope"></i>
											<input type="text" name="email" class="form-control" placeholder="email" required="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<i class="flaticon-clock"></i>
											<input type="text" name="date" class="form-control" placeholder="date" required="">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<i class="flaticon-cut"></i>
											<input type="text" name="city" class="form-control" placeholder="service">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<i class="flaticon-clip"></i>
											<textarea rows="5" cols="45" name="message" class="form-control" placeholder="extra notes"></textarea>
										</div>
									</div>

								</div>
								<div class="row ">
									<div class="col-sm-12 text-center text-md-left">
										<div class="divider-60 d-none d-xl-block"></div>
										<div class="divider-20 d-xl-none"></div>
										<div class="form-group justify-content-center justify-content-md-start">
											<button type="submit" class="btn btn-outline-maincolor"> Send Request</button>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
<?php } 
                         else { ?>
					<?php }?>
					<?php if ($pid == 14 ) {?>
						<?php } 
                         else { ?>
			<!-- Blog -->
			<section class="section-team team ls s-pb-60 s-pb-md-90 s-pb-lg-100 s-pb-xl-50 mt-40">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<span class="sub-title text-center">The Zara</span>
							<h3 class="special-heading text-center"><?php echo $stexts_row['title7']; ?></h3>
							<div class="divider-70 d-none d-xl-block"></div>
							<div class="divider-30 d-block d-xl-none"></div>
							<div class="owl-carousel" data-loop="true" data-margin="30" data-nav="true" data-dots="true" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="2" data-responsive-lg="3">
								<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l2rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l2rc)) { 
                        ?><div class="vertical-item content-padding text-center">
									<div class="item-media">
										<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" alt="<?php echo $bd['blog_title']; ?>">
										<div class="media-links">
											<a class="abs-link" title="<?php echo $bd['blog_title']; ?>" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>"></a>
										</div>
									</div>
									<div class="item-content">
										<h4 class="tile">
											<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/" title="<?php echo $bd['blog_title']; ?>"><?php echo $bd['blog_title']; ?></a>
										</h4>
										<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/" title="<?php echo $bd['blog_title']; ?>"><span class="color-main">
												<?php echo $bdc['page_title']; ?>
											</span></a>
										<p><?php echo $bd['blog_summary']; ?></p>
									</div>
								</div><?php }?>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
			</section>
					
			<!-- Remedies -->
			<section class="main-gallery container-px-0 mt-10">
				<span class="sub-title text-center text-md-center">The Zara's</span>
				<h3 class="special-heading text-center text-md-center"><?php echo $stexts_row['title8']; ?></h3>
				<div class="container-fluid">
					<div class="row isotope-wrapper masonry-layout c-gutter-10 c-mb-10">
						<?php
                         $b_l2r = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '17' ORDER BY blog_created_at DESC LIMIT 0,12"); 
                         while ($bd = mysqli_fetch_array($b_l2r)) { 
						$bcid = $bd['blog_category'];
                        ?><?php
                         $b_l3rc = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '$bcid' "); 
                         while ($bdc = mysqli_fetch_array($b_l3rc)) { 
                        ?><div class="col-xl-2 col-sm-6 ">
							<div class="vertical-item item-gallery text-center">
								<div class="item-media">
									<img src="<?php echo $settings_row['site_domain']; ?><?php echo $bd['cover_path']; ?>" class="" alt="<?php echo $bd['blog_title']; ?>">
									<div class="media-links">
										<a class="abs-link" title="<?php echo $bd['blog_title']; ?>" href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$bdc['page_url']);?>/<?php echo str_replace(' ','-',$bd['blog_url']);?>/"></a>
									</div>
									<div class="galery-vertical">
										<p><?php echo $bd['blog_title']; ?></p>
									</div>

								</div>
							</div>
						</div>
							<?php }?>
							<?php }?>
					</div>
				</div>
				<!-- .isotope-wrapper-->
			</section><?php }?>

	<!-- Footer -->
			<footer class="page_footer page_footer2 overflow-visible ls s-overlay s-parallax s-pt-50 s-pb-50 c-mb-30 s-py-md-100 s-py-lg-150 s-py-xl-0 c-gutter-60 my-50">
				<div class="container overflow-visible">
					<div class="row">
						<div class="col-lg-6 col-xl-4 d-flex flex-column align-items-center animate" data-animation="fadeInUp">
							<div class="fw-divider-space hidden-below-xl mt-100"></div>
							<h3 class="text-center">Contacts</h3>
							<div class="media">
								<div class="icon-styled color-main fs-14">
									<i class="flaticon-headphones"></i>
								</div>
								<p class="media-body"><a href="tel:<?php echo $settings_row['site_phone_call']; ?>"><?php echo $settings_row['site_phone']; ?></a></p>
							</div>
							<div class="media">
								<div class="icon-styled color-main fs-14">
									<i class="flaticon-envelope"></i>
								</div>
								<p class="media-body">
									<a href="mailto:<?php echo $settings_row['site_email']; ?>"><?php echo $settings_row['site_email']; ?></a>
								</p>
							</div>
							<div class="media pb-10 pb-lg-30">
								<div class="icon-styled color-main fs-14">
									<i class="flaticon-placeholder"></i>
								</div>
								<p class="media-body"><?php echo $settings_row['site_address']; ?></p>
								
							</div>
							
								
							<p class="social-icons text-center">
								<a href="<?php echo $settings_row['site_facebook']; ?>" class="fa fa-facebook border-icon rounded-icon" title="Facebook" target="_blank"></a>
								<a href="<?php echo $settings_row['site_twitter']; ?>" class="fa fa-twitter border-icon rounded-icon" title="Twitter" target="_blank"></a>
								<a href="<?php echo $settings_row['site_insta']; ?>" class="fa fa-instagram border-icon rounded-icon" title="Instagram" target="_blank"></a>
								<a href="<?php echo $settings_row['site_youtube']; ?>" class="fa fa-youtube-play border-icon rounded-icon" title="Youtube" target="_blank"></a>
								<a href="<?php echo $settings_row['site_linkedin']; ?>" class="fa fa-linkedin border-icon rounded-icon" title="Linkedin" target="_blank"></a>
							</p><div class="media pb-10 pb-lg-30"><br>
								<center><img src="<?php echo $settings_row['site_domain']; ?>images/award.jpg" alt="The Zara 2020 Award"></center>
							</div>
						</div>
						<div class="d-none d-xl-flex col-xl-4 animate text-center flex-column align-items-center justify-content-center" data-animation="fadeInUp">
							<div class="wrap s-px-lg-10 ds ms">
								<div class="fw-divider-space hidden-below-md mt-160"></div>
								<div class="fw-divider-space hidden-above-md mt-20"></div>
								<img src="images/logo.png" alt="img" style="background-color: #fff">
								<p>
									<?php echo $stexts_row['title12']; ?>
								</p>
								<div class="fw-divider-space hidden-below-md mt-140"></div>
								<div class="fw-divider-space hidden-above-md mt-20"></div>
								<div class="page_copyright text-center mt-auto">
									<p style="text-align: center;">©<a href="<?php echo $settings_row['site_domain']; ?>" title="The Zara">TheZara.co.uk</a> 2021</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-xl-4 text-center d-flex flex-column align-items-center  animate" data-animation="fadeInUp">
							<div class="fw-divider-space hidden-below-xl mt-100"></div>
							<h3 class="">Newsletter</h3>
							<div class="widget widget_mailchimp pencil mb-0">
								<p>
									<?php echo $stexts_row['title11']; ?>
								</p>

								<form class="signup" action="">
									<label for="mailchimp_email">
										<span class="screen-reader-text">Subscribe:</span>
									</label>
									<i class="flaticon-envelope"></i>
									<input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email" placeholder="Email address">

									<button type="submit" class="search-submit">
										<i class="fa fa-pencil"></i>
									</button>
									<div class="response"></div>
								</form><br>
								<img src="images/QR1.jpg" alt="The Zara QR Code">
							</div>
						</div>

					</div>
				</div>
			</footer>

			<!-- Mates Copyrights -->
			<section class="page_copyright ls">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12 text-center">
							<p style="color: #000; text-align: center;">
									
                         <?php
                        require("admin/assets/includes/inc/config.php");
                         $footer_la = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_status = 'Active' AND show_footer = 'Yes' ORDER BY page_position"); 
                         while ($footer_lad = mysqli_fetch_array($footer_la)) { 
                        ?><?php
                         $footer_links = mysqli_query($servercnx,"SELECT * FROM pages WHERE id = '".$footer_lad['page_category']."' "); 
                         while ($footer_linksd = mysqli_fetch_array($footer_links)) { 
                        ?> <i class="icon-styled color-main fs-14"> <i class="fa fa-circle"></i></i> 
                        <a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$footer_lad['page_url']);?>/" title="<?php echo $footer_lad['page_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $footer_lad['page_title']; ?></a> 
                        
                        <?php }?>
                        <?php }?>
                    </p>
							<div class="fw-divider-space hidden-above-xl mt-20"></div>
						</div>
						<div class="col-md-12 text-center">
							<p style="color: #000; text-align: center;">Designed and Developed By: <a href="https://www.mates.pk/" title="Mates Technologies - Let's Grow With US!" target="_blank">Mates Technologies</a></p>
							<div class="fw-divider-space hidden-above-xl mt-20"></div>
						</div>
					</div>
				</div>
			</section>
