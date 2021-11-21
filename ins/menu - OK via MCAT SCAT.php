<!-- Top Header -->
			<section class="page_topline ds ms s-py-3 c-my-15 container-px-40">
				<div class="container-fluid">
					<div class="row align-items-center flex-column flex-md-row">
						<div class="col-xl-4 col-md-6 col-12 no-mobile  text-center text-md-left">
							<ul class="top-includes contact">
								<li>
									<span class="icon-inline">
										<span class="icon-styled">
											<i class="flaticon-envelope"></i>
										</span>
										<span>
											<a href="mailto:<?php echo $settings_row['site_email']; ?>"><?php echo $settings_row['site_email']; ?></a>
										</span>
									</span>
								</li>

							</ul>
						</div>
						<div class="col-xl-4 col-md-6 col-12 text-center text-xl-center">
							<div class="social-top-includ">
								<p class="social-icons">
								<a href="<?php echo $settings_row['site_facebook']; ?>" class="fa fa-facebook" title="Facebook"></a>
								<a href="<?php echo $settings_row['site_twitter']; ?>" class="fa fa-twitter" title="Twitter"></a>
								<a href="<?php echo $settings_row['site_insta']; ?>" class="fa fa-instagram" title="Instagram"></a>
								<a href="<?php echo $settings_row['site_youtube']; ?>" class="fa fa-youtube-play" title="Youtube"></a>
								<a href="<?php echo $settings_row['site_linkedin']; ?>" class="fa fa-linkedin" title="Linkedin"></a>
								</p>
							</div>
						</div>
						<div class="col-xl-4 text-md-right d-xl-block text-center">
							<ul class="top-includes contact">
								<li>
									<span class="icon-inline">
										<span class="icon-styled">
											<i class="flaticon-headphones"></i>
										</span>
										<span>
											<a href="tel:<?php echo $settings_row['site_phone_call']; ?>"><?php echo $settings_row['site_phone']; ?></a>
										</span>
									</span>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</section>
			<!-- Menu -->
			<header class="page_header ls">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-8 col-xl-2 text-left">
							<a href="<?php echo $settings_row['site_domain']; ?>" class="logo" title="<?php echo $settings_row['site_name']; ?>">
								<img src="<?php echo $settings_row['site_domain']; ?>images/logo.png" alt="<?php echo $settings_row['site_name']; ?>">
							</a>
						</div>
						<div class="col-xl-8 col-1 text-center">
							<!-- main nav start -->
							<nav class="top-nav">
								<ul class="nav sf-menu">
									<?php
                        require("admin/assets/includes/inc/config.php");
                         $menu_l1r = mysqli_query($servercnx,"SELECT * FROM mcat WHERE mcat_status = 'Active' ORDER BY mcat_position LIMIT 0,5 "); 
                         while ($menu_l1 = mysqli_fetch_array($menu_l1r)) { 
						$mcat_uniid = $menu_l1['mcat_uniid'];
						$page_id = $menu_l1['id'];
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['mcat_url']);?>/" alt="<?php echo $menu_l1['mcat_title']; ?> - <?php echo $settings_row['site_name']; ?>" title="<?php echo $menu_l1['mcat_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l1['mcat_title']; ?></a>
						<?php if ($page_id == 4 ) {?>
						<ul>
                        <?php
                        require("admin/assets/includes/inc/config.php");
                         $class_f = mysqli_query($servercnx,"SELECT * FROM classes "); 
                         while ($class_d = mysqli_fetch_array($class_f)) { 
                        ?><li>
                        	<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$class_d['url']);?>/" alt="<?php echo $class_d['seo_title']; ?> - <?php echo $settings_row['site_name']; ?>">
                        		<?php echo $class_d['class_name']; ?></a>
                        	</li>
                        <?php }?>
                    	</ul>
						<?php } 
                         else { ?>
						<?php
                         $menu_l2rf = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_mcate = '".$menu_l1['mcat_uniid']."' ORDER BY scat_position "); 
                         while ($menu_l2f = mysqli_fetch_array($menu_l2rf)) { 
                        ?>										
						<?php if ($menu_l2f['scat_mcate']== $mcat_uniid ) {?><ul>
                         <?php
                         $menu_l2r = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_mcate = '".$menu_l1['mcat_uniid']."' ORDER BY scat_position "); 
                         while ($menu_l2 = mysqli_fetch_array($menu_l2r)) { 
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['mcat_url']);?>/<?php echo str_replace(' ','-',$menu_l2['scat_url']);?>/" alt="<?php echo $menu_l2['seo_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2['scat_title']; ?></a></li>
                        <?php }?></ul>
						<?php } 
                         else { ?><?php }?>
                        <?php }?>
                        <?php }?></li>
                        <?php }?>
								<li>
									<a href="<?php echo $settings_row['site_domain']; ?>Blog/">Blog</a>
										<div class="mega-menu">
											<ul class="mega-menu-row">
												<?php
                         $menu_l2rr = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_mcate = 'TSIT282521C' ORDER BY scat_position LIMIT 0,6 "); 
                         while ($menu_l2w = mysqli_fetch_array($menu_l2rr)) { 
                        ?><li class="mega-menu-col">
													<a href="<?php echo $settings_row['site_domain']; ?>Blog/<?php echo str_replace(' ','-',$menu_l2w['scat_url']);?>/" alt="<?php echo $menu_l2w['scat_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2w['scat_title']; ?></a>
													<ul><?php
                         $menu_l2er = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_status = 'Active' AND blog_category = '".$menu_l2w['id']."' LIMIT 0,6 "); 
                         while ($menu_l2e = mysqli_fetch_array($menu_l2er)) { 
                        ?>
														<li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l2e['blog_url']);?>/"><?php echo $menu_l2e['blog_title']; ?></a></li>
											<?php }?>
													</ul>
												</li>
											<?php }?>
											</ul>
										</div> <!-- eof mega menu -->
									</li>
									<!-- eof features -->
									<!-- contacts -->
									<?php
                        require("admin/assets/includes/inc/config.php");
                         $menu_l1r = mysqli_query($servercnx,"SELECT * FROM mcat WHERE mcat_status = 'Active' ORDER BY mcat_position LIMIT 6,1 "); 
                         while ($menu_l1 = mysqli_fetch_array($menu_l1r)) { 
						$mcat_uniid = $menu_l1['mcat_uniid'];
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['mcat_url']);?>/" alt="<?php echo $menu_l1['mcat_title']; ?> - <?php echo $settings_row['site_name']; ?>" title="<?php echo $menu_l1['mcat_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l1['mcat_title']; ?></a>
									<?php
                         $menu_l2rf = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_mcate = '".$menu_l1['mcat_uniid']."' ORDER BY scat_position "); 
                         while ($menu_l2f = mysqli_fetch_array($menu_l2rf)) { 
                        ?>										
						<?php if ($menu_l2f['scat_mcate']== $mcat_uniid ) {?><ul>
                         <?php
                         $menu_l2r = mysqli_query($servercnx,"SELECT * FROM scat WHERE scat_status = 'Active' AND scat_mcate = '".$menu_l1['mcat_uniid']."' ORDER BY scat_position "); 
                         while ($menu_l2 = mysqli_fetch_array($menu_l2r)) { 
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['mcat_url']);?>/<?php echo str_replace(' ','-',$menu_l2['scat_url']);?>/" alt="<?php echo $menu_l2['scat_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2['scat_title']; ?></a></li>
                        <?php }?></ul>
						<?php } 
                         else { ?><?php }?>
                        <?php }?></li>
                        <?php }?>
									<!-- eof contacts -->
								</ul>
							</nav>
							<!-- eof main nav -->
						</div>
						<div class="col-1 col-xl-2 ">
							<ul class="top-includes">
								<li>
									<span class="d-none d-xl-block">
										<a href="Appointment/" class="btn btn-outline-maincolor">Appointment</a>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- header toggler -->
				<span class="toggle_menu"><span></span></span>
			</header>