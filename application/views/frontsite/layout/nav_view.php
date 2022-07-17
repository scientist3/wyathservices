<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile">
	<div class="c-topbar">
		<div class="container">
			<!-- BEGIN: INLINE NAV -->
			<nav class="c-top-menu c-pull-left">
				<ul class="c-icons">
					<li>
						<a href="https://twitter.com/wyathservices/"><i class="icon-social-twitter"></i></a>
					</li>
					<li>
						<a href="https://www.facebook.com/wyathservices/"><i class="icon-social-facebook"></i></a>
					</li>

					<li>
						<a href="https://www.youtube.com/playlist?list=PLXr8OvrkRR6bFkNnkPwZEa1Eve5qIyshE"><i class="icon-social-youtube"></i></a>
					</li>
				</ul>
			</nav>
			<!-- END: INLINE NAV -->

			<!-- BEGIN: INLINE NAV -->

			<nav class="c-top-menu c-pull-right">
				<ul class="c-links">
					<li>
						<a href="<?= base_url('front/notification'); ?>">News</a>
					</li>
					<li class="c-divider">|</li>

					<li>
						<a href="<?= base_url('front/gallery'); ?>">Gallery</a>
					</li>
					<li class="c-divider">|</li>
					<li class="c-divider">
						<a href="<?= base_url('front/carrier'); ?>">Careers</a>
					</li>

					<li class="c-divider">|</li>
					<li>
						<a href="<?= base_url('login'); ?>">Login</a>
					</li>
				</ul>
			</nav>
			<!-- END: INLINE NAV -->
		</div>
	</div>

	<div class="c-navbar">
		<div class="container">
			<div class="c-navbar-wrapper clearfix">
				<!-- BEGIN: BRAND -->
				<div class="c-brand c-pull-left">
					<a href="<?php echo base_url('front'); ?>" class="c-logo">
						<img src="<?= base_url('frontsite'); ?>/assets/base/img/layout/logos/logo-3.png" alt="Wyath Services" class="c-desktop-logo" />
						<img src="<?= base_url('frontsite'); ?>/assets/base/img/layout/logos/logo-3.png" alt="Wyath Services" class="c-desktop-logo-inverse" />
						<img src="<?= base_url('frontsite'); ?>/assets/base/img/layout/logos/logo-1.png" alt="Wyath Services" class="c-mobile-logo" />
					</a>
					<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
						<span class="c-line"></span>
						<span class="c-line"></span>
						<span class="c-line"></span>
					</button>
					<button class="c-search-toggler" type="button" style="display: none">
						<a href="javascript:;" data-toggle="modal" data-target="#login-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i></a>
					</button>
				</div>
				<!-- END: BRAND -->

				<!-- BEGIN: MEGA MENU -->
				<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
					<!-- BEGIN: MEGA MENU -->
					<ul class="nav navbar-nav c-theme-nav" style="width: 100%">
						<!-- Home -->
						<li class="c-menu-type-classic">
							<a href="<?= base_url(); ?>" class="c-link dropdown-toggle <?= ($this->uri->segment(2) == '') ? 'c-font-brown-3' : null; ?>">Home</a>
						</li>

						<!-- About Us -->
						<li class="c-menu-type-classic">
							<a href="#" class="c-link dropdown-toggle <?= ($this->uri->segment(2) == 'aboutwyathservices') ? 'c-font-brown-3' : null; ?>">About Us</a>
							<ul class="dropdown-menu c-menu-type-classic c-pull-left">
								<li>
									<a class="<?= ($this->uri->segment(2) == 'aboutwyathservices') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/aboutwyathservices'); ?>">About Wyath Services</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'ourimpact') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/ourimpact'); ?>">Our Impact</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'keydifferentiators') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/keydifferentiators'); ?>">Key Differentiators</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'boardofdirectors') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/boardofdirectors'); ?>">Board of Directors</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'boardofadvisors') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/boardofadvisors'); ?>">Board of Advisors</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'pillars') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/pillars'); ?>">5 Core Pillars</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'chairmansmessage') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/chairmansmessage'); ?>">Chairman's Message</a>
								</li>
								<li>
									<a class="<?= ($this->uri->segment(2) == 'partners') ? 'c-font-brown-3' : null; ?>" href="<?= base_url('front/partners'); ?>">Corporate Partners</a>
								</li>
								<!--
                  <li>
                    <a href="eof.php">Areas Covered</a>
                  </li>
                  <li>
                    <a href="eof.php">News & Press Releases</a>
                  </li>
                -->
							</ul>
						</li>

						<!-- Initiatives -->
						<li>
							<a href="<?= base_url('front/initiatives'); ?>" class="c-link">Initiatives</a>
						</li>

						<!-- Services -->
						<li>
							<a href="<?= base_url('front/services'); ?>" class="c-link">Services</a>
						</li>

						<!-- Contact -->
						<li>
							<a href="<?= base_url('front/contact'); ?>" class="c-link">Contact</a>
						</li>
						<!-- Email -->
						<li>
							<a href="https://sg3plcpnl0089.prod.sin3.secureserver.net:2096/" class="c-link">Email</a>
						</li>

						<!-- <li class="c-search-toggler-wrapper">
              <div class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-square c-btn-uppercase c-btn-sbold" style="padding-left:2px; padding-right:2px; width:120px;">
                <div style="width:30px; float:left; padding:5px 0px;"><i class="icon-user"></i></div>
                <div class="c-font-open c-font-13 " style="text-align:left; padding-top:5px"><span id="Label2"><a class='c-font-dark c-font-white-hover' href='https://sg3plcpnl0089.prod.sin3.secureserver.net:2096/'>Email</a></span>
                </div>
              </div>
            </li> -->

						<li class="c-quick-sidebar-toggler-wrapper">
							<a href="#" class="c-quick-sidebar-toggler">
								<span class="c-line"></span>
								<span class="c-line"></span>
								<span class="c-line"></span>
							</a>
						</li>
					</ul>
					<!-- END MEGA MENU -->
				</nav>

				<!-- END: MEGA MENU -->
				<!-- END: LAYOUT/HEADERS/MEGA-MENU -->
				<!-- END: HOR NAV -->
			</div>
		</div>
	</div>
</header>

<nav class="c-layout-quick-sidebar matches-scroller">
	<div class="c-content">
		<div class="c-section">
			<div class="c-header">
				<button type="button" class="c-link c-close">
					<i class="icon-login"></i>
				</button>
			</div>
			<div class="c-content">
				<div class="c-section">
					<div class="cbp-panel">
						<div class="col-md-12 c-center">
							<div class="c-font-uppercase c-font-13 c-margin-b-20 c-font-white c-font-bold">
								Programs & Events
							</div>

							<span id="up">
								<!-- Event Blog Start -->
								<div class="panel panel-danger">
									<div class="panel-heading">
										<h3 class="panel-title c-font-uppercase c-font-12 c-right">
											--
										</h3>
									</div>

									<div class="panel-body">
										<div class="col-md-4" style="padding-left: 0px">
											<span class="badge c-theme-border c-theme-bg c-font-white c-font-bold c-font-12">-</span>
										</div>

										<div class="col-md-8" style="
												padding-left: 0px;
												padding-right: 0px;
												padding-top: 5px;
											">
											<a href="upfdp.html" class="c-font-uppercase c-theme-link c-font-13 c-font-sbold text-left">-</a>
										</div>
									</div>
								</div>
								<!-- Event Blog Start -->

								<!-- Event Blog Start 
							<div class='panel panel-danger'>	
								<div class='panel-heading'>	
									<h3 class='panel-title c-font-uppercase c-font-12 c-right'>Student Development Program</h3>
								</div>	
							
								<div class='panel-body'>
									<div class='col-md-4' style='padding-left:0px;'><span class='badge c-theme-border c-theme-bg c-font-white c-font-bold c-font-12'>Jan 01</span>
									</div>
									
									<div class='col-md-8' style='padding-left:0px; padding-right:0px; padding-top:5px;'><a href='upfdp.php' class='c-font-uppercase c-theme-link c-font-13 c-font-sbold text-left'>SSM College of Engneering and Technology</a>
									</div>	
								</div>
							</div> -->
								<!-- Event Blog Start -->
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>