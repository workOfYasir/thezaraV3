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
											<a href="mailto:<?php echo $settings_row['site_email']; ?>index/"><?php echo $settings_row['site_email']; ?></a>
										</span>
									</span>
								</li>

							</ul>
						</div>
						<div class="col-xl-4 col-md-6 col-12 text-center text-xl-center">
							<div class="social-top-includ">
								<p class="social-icons">
								<a href="<?php echo $settings_row['site_facebook']; ?>" class="fa fa-facebook" title="Facebook" target="_blank"></a>
								<a href="<?php echo $settings_row['site_twitter']; ?>" class="fa fa-twitter" title="Twitter" target="_blank"></a>
								<a href="<?php echo $settings_row['site_insta']; ?>" class="fa fa-instagram" title="Instagram" target="_blank"></a>
								<a href="<?php echo $settings_row['site_youtube']; ?>" class="fa fa-youtube-play" title="Youtube" target="_blank"></a>
								<a href="<?php echo $settings_row['site_linkedin']; ?>" class="fa fa-linkedin" title="Linkedin" target="_blank"></a>
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
							<a href="<?php echo $settings_row['site_domain']; ?>index/" class="logo" title="<?php echo $settings_row['site_name']; ?>">
								<img src="<?php echo $settings_row['site_domain']; ?>images/logo.png" alt="<?php echo $settings_row['site_name']; ?>">
							</a>
						</div>
						<div class="col-xl-8 col-1 text-center">
							<!-- main nav start -->
							<nav class="top-nav">
								<ul class="nav sf-menu">
									<?php
                        require("admin/assets/includes/inc/config.php");
                         $menu_l1r = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_status = 'Active' AND is_parent = 'Yes' AND show_header = 'Yes' ORDER BY page_position LIMIT 0,5 "); 
                         while ($menu_l1 = mysqli_fetch_array($menu_l1r)) { 
						$page_id = $menu_l1['id'];
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['page_url']);?>/" alt="<?php echo $menu_l1['page_title']; ?> - <?php echo $settings_row['site_name']; ?>" title="<?php echo $menu_l1['page_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l1['page_title']; ?></a>
						<?php if ($page_id == 12 ) {?>
						<ul>
                        <?php
                        require("admin/assets/includes/inc/config.php");
                         $class_f = mysqli_query($servercnx,"SELECT * FROM classes "); 
                         while ($class_d = mysqli_fetch_array($class_f)) { 
                        ?><li>
                        	<a href="<?php echo $settings_row['site_domain']; ?>Class/<?php echo str_replace(' ','-',$class_d['url']);?>/" alt="<?php echo $class_d['seo_title']; ?> - <?php echo $settings_row['site_name']; ?>">
                        		<?php echo $class_d['class_name']; ?></a>
                        	</li>
                        <?php }?>
                    	</ul>

						<?php } 
                         else { ?>
						<?php
                        require("admin/assets/includes/inc/config.php");
                         $menu_l2rf = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '".$menu_l1['id']."' ORDER BY page_position "); 
                         while ($menu_l2f = mysqli_fetch_array($menu_l2rf)) { 
						$page_id = $menu_l1['id'];
                        ?>										
						<?php if ($menu_l2f['page_category']== $page_id ) {?><ul>
                         <?php
                        require("admin/assets/includes/inc/config.php");
                         $menu_l2r = mysqli_query($servercnx,"SELECT * FROM pages WHERE is_parent OR is_scat = 'No' AND page_category = '".$menu_l1['id']."' ORDER BY page_position "); 
                         while ($menu_l2 = mysqli_fetch_array($menu_l2r)) { 
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l2['page_url']);?>/" alt="<?php echo $menu_l2['seo_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2['page_title']; ?></a></li>
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
                        require("admin/assets/includes/inc/config.php");
                         $menu_l2rr = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '14' ORDER BY page_position LIMIT 0,4 "); 
                         while ($menu_l2w = mysqli_fetch_array($menu_l2rr)) {  
						$bc_id = $menu_l2w['id'];
                        ?><li class="mega-menu-col">
													<a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l2w['page_url']);?>/" alt="<?php echo $menu_l2w['page_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2w['page_title']; ?></a>
													<ul><?php
                         $menu_l2er = mysqli_query($servercnx,"SELECT * FROM blog_post WHERE blog_category = '$bc_id' AND blog_status = 'Active' ORDER BY blog_date LIMIT 0,6 "); 
                         while ($menu_l2e = mysqli_fetch_array($menu_l2er)) { 
                        ?>
														<li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l2w['page_url']);?>/<?php echo str_replace(' ','-',$menu_l2e['blog_url']);?>/"><?php echo $menu_l2e['blog_title']; ?></a></li>
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
                         $menu_l1r = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_status = 'Active' AND is_parent = 'Yes' ORDER BY page_position  LIMIT 6,1 "); 
                         while ($menu_l1 = mysqli_fetch_array($menu_l1r)) { 
						$page_id = $menu_l1['id'];
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l1['page_url']);?>/" alt="<?php echo $menu_l1['page_title']; ?> - <?php echo $settings_row['site_name']; ?>" title="<?php echo $menu_l1['page_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l1['page_title']; ?></a>
									<?php
                         $menu_l2rf = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '$page_id' LIMIT 0,1 "); 
                         while ($menu_l2f = mysqli_fetch_array($menu_l2rf)) { 
                        ?>										
						<?php if ($menu_l2f['page_category']== $page_id ) {?><ul>
                        <?php
                         $menu_l2r = mysqli_query($servercnx,"SELECT * FROM pages WHERE page_category = '$page_id' ORDER BY page_position "); 
                         while ($menu_l2 = mysqli_fetch_array($menu_l2r)) { 
                        ?><li><a href="<?php echo $settings_row['site_domain']; ?><?php echo str_replace(' ','-',$menu_l2['page_url']);?>/" alt="<?php echo $menu_l2['page_title']; ?> - <?php echo $settings_row['site_name']; ?>"><?php echo $menu_l2['page_title']; ?></a></li>
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
										<a href="<?php echo $settings_row['site_domain']; ?>Appointment/" alt="Book An Appointment - <?php echo $settings_row['site_name']; ?>" class="btn btn-outline-maincolor">Appointment</a>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- header toggler -->
				<span class="toggle_menu"><span></span></span>
			</header>