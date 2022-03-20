	<!-- BEGIN: PAGE CONTAINER -->
	<div class="c-layout-page">
		<?php $this->load->view('frontsite/about/parts/about_nav'); ?>

		<!-- BEGIN: PAGE CONTENT -->
		<!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
		<div class="c-content-box c-size-sm1 c-bg-white">
			<div class="container">
				<div class="c-content-product-1 c-opt-1">
					<div class="c-content-title-1">
						<?php


						?>
						<h3 class="c-center c-font-uppercase c-font-bold"><?php echo $about_us->ab_title; ?></h3>
						<p class="c-font-uppercase c-center">
							<?php echo $about_us->ab_subtitle; ?>

						</p>
						<div class="c-line-center">
						</div>
						<div class="col-md-5">
							<img src="<?= base_url($about_us->ab_image_path); ?>" class="img-responsive" />
							<div class="c-content-box c-bg-white">

								<div class="c-content-counter-1 c-opt-1">

									<div class="row">
										<div class="col-md-6">
											<div class="c-counter c-theme-border c-font-bold c-theme-font" data-counter="counterup">
												<?php echo $about_us->ab_district_covered ?>
											</div>
											<h4 class="c-title c-first c-font-uppercase c-font-bold">Districts Covered</h4>
										</div>
										<div class="col-md-6">
											<div class="c-counter c-theme-border c-font-bold c-theme-font" data-counter="counterup">
												<?php echo $about_us->ab_centres_established ?>
											</div>
											<h4 class="c-title c-first c-font-uppercase c-font-bold">Centres Established</h4>
										</div>
										<div class="col-md-6">
											<div class="c-counter c-theme-border c-font-bold c-theme-font" data-counter="counterup">
												<?php echo $about_us->ab_students_impacted ?>
											</div>
											<h4 class="c-title c-first c-font-uppercase c-font-bold">Students Impacted</h4>
										</div>
										<div class="col-md-6">
											<div class="c-counter c-theme-border c-font-bold c-theme-font" data-counter="counterup">
												<?php echo $about_us->ab_corporate_engaged ?>
											</div>
											<h4 class="c-title c-first c-font-uppercase c-font-bold">Corporate Engaged</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="c-content-title-1">
								<p class="c-font-open c-justify" style="margin-top:0px;"><?php echo $about_us->ab_desc; ?><br>
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- END: CONTENT/PRODUCTS/PRODUCT-1 -->
		<!-- BEGIN: CONTENT/BARS/BAR-3 -->
		<div class="c-content-box c-bg-brown-3">
			<div class="featured_section56">

				<div class="left">

					<div class="cont">
						<div class="c-content-title-1">
							<h3 class="c-center c-font-uppercase c-font-bold c-font-dark">Vision</h3>
							<div class="c-line-center">
							</div>
							<p class="c-font-open c-center">
								<?php echo $about_us->ab_vision_des ?>
							</p>

						</div>
					</div>
				</div>
				<div class="right">
					<div class="cont">
						<div class="c-content-title-1">
							<h3 class="c-center c-font-uppercase c-font-bold c-font-dark">Mission</h3>
							<div class="c-line-center">
							</div>
							<p class="c-font-open c-center">
								<?php echo $about_us->ab_mission_des ?>
							</p>

						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- END: CONTENT/BARS/BAR-3 -->

		<!-- BEGIN: CONTENT/SLIDERS/TESTIMONIALS-3 -->
		<div class="c-content-box c-size-lg c-bg-parallax" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/bg-3.jpg)">
			<div class="container">
				<div class="c-content-counter-1 c-opt-1 c-content-box">

					<div class="row">
						<div class="col-md-12 c-size-md">
							<br /><br />
							<div class=" c-font-bold c-font-75 c-center c-font-white" data-counter="counterup">
								<?php echo $about_us->ab_students_impacted ?>
							</div>
							<h4 class="c-title c-first c-font-uppercase c-font-bold c-font-brown-3">Students/Beneficiaries impacted by
								Wyath Services in the last 5 years</h4>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- END: CONTENT/SLIDERS/TESTIMONIALS-3 -->

		<!-- END: PAGE CONTENT -->
	</div>
	<!-- END: PAGE CONTAINER -->