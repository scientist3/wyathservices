<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

	<?php $this->load->view('frontsite/about/parts/initative_nav'); ?>

	<!-- BEGIN: PAGE CONTENT -->
	<div class="c-content-box c-size-sm c-bg-white">
		<div class="container">
			<div class="c-content-product-1 c-opt-1">
				<div class="c-content-title-1">
					<h3 class="c-center c-font-uppercase c-font-bold"><?php echo $pageTitle ?></h3>
					<div class="c-line-center">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: PAGE CONTENT -->

	<?php if (valArr($initiatives)) : ?>
		<?php foreach ($initiatives as $key => $initiative) : ?>
			<?php if (($key + 2) % 2 == 0) : ?>
				<!-- BEGIN: FEATURES 1 -->
				<div id="1f" class="c-content-box c-size-md c-no-padding c-bg-white">
					<div class="c-content-feature-4">
						<div class="c-bg-parallax c-feature-bg c-content-right c-diagonal c-border-left-white" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/1.jpg)">
						</div>
						<div class="c-content-area c-content-left">
						</div>
						<div class="container">
							<div class="c-feature-content c-left">
								<div class="c-content-v-center">
									<div class="c-wrapper">
										<div class="c-body">
											<div class="c-content-title-1">
												<h3 class="c-font-uppercase c-font-bold c-left"><?php echo $initiative->init_ser_title ?></h3>
												<div class="c-line-left">
												</div>

											</div>
											<div class="c-content-title-1">
												<p class="c-font-open c-justify">
													<?php echo $initiative->init_ser_desc ?>

												</p>
												<a href="faculty-development.html" class="btn btn-sm c-theme-btn c-btn-square c-btn-sbold">
													EXPLORE </a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: FEATURES 1 -->
			<?php else : ?>
				<!-- BEGIN: FEATURES 2 -->
				<div id="1s" class="c-content-box c-size-md c-no-padding c-bg-dark-2">
					<div class="c-content-feature-4">
						<div class="c-bg-parallax c-feature-bg c-content-left c-diagonal c-border-right-dark-2" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/2.jpg)">
						</div>
						<div class="c-content-area c-content-right">
						</div>
						<div class="container">
							<div class="c-feature-content c-right">
								<div class="c-content-v-center">
									<div class="c-wrapper">
										<div class="c-body">
											<div class="c-content-title-1">
												<h3 class="c-font-uppercase c-font-bold c-font-white"><?php echo $initiative->init_ser_title ?></h3>
												<div class="c-line-right">
												</div>

											</div>
											<div class="c-content-title-1">
												<p class="c-font-open c-justify">
													<?php echo $initiative->init_ser_desc ?>
												</p>
												<a href="skill-development-courses.html" class="btn btn-sm c-theme-btn c-btn-square c-btn-sbold">
													EXPLORE </a>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: FEATURES 2 -->
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

</div>
<!-- END: PAGE CONTAINER -->