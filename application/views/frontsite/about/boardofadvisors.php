<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <?php $this->load->view('frontsite/about/parts/about_nav'); ?>

  <!-- BEGIN: PAGE CONTENT -->

  <div class="c-content-box c-size-sm c-bg-white">
    <div class="container">
      <div class="c-content-product-1 c-opt-1">
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Board of Advisors</h3>
          <div class="c-line-center">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BEGIN: CONTENT/MISC/TEAM-3 -->
  <div class="c-content-box c-no-padding">
    <div class="container">
      <!-- Begin: Testimonals 1 component -->
      <div class="c-content-team-1-slider" data-slider="owl" data-items="3">
        <!-- Begin: Title 1 component -->
        <!--<div class="c-content-title-1">
					<h3 class="c-center c-font-uppercase c-font-bold">Meet Our Valuable Team</h3>
					<div class="c-line-center c-theme-bg">
					</div>
				</div>-->
        <!-- End-->
        <div class="row" style="display: flex;flex-wrap: wrap;">
          <?php if (valArr($advisorymembers)) : ?>
            <?php foreach ($advisorymembers as $key => $member) : ?>
              <!-- Director Start-->
              <div class="col-md-4">
                <div class="c-content-person-1 c-bordered c-shadow">
                  <div class="c-caption c-content-overlay">
                    <div class="c-overlay-wrapper">
                      <div class="c-overlay-content">

                        <a href="#" data-lightbox="fancybox" data-fancybox-group="gallery-3">
                          <i class="icon-magnifier"></i>
                        </a>
                      </div>
                    </div>
                    <img class="c-overlay-object img-responsive" src="<?= !empty($member->bm_img_path) ? base_url($member->bm_img_path) : base_url('uploads/no-image.png'); ?>" alt="">
                  </div>
                  <div class="c-body">
                    <div class="c-head">
                      <div class="c-name c-font-uppercase c-font-bold c-font-brown-3">
                        <?= $member->bm_name; ?>
                      </div>

                    </div>
                    <div class="c-position">
                      <?= $member->bm_desig; ?>
                    </div>
                    <p>

                    </p>
                  </div>
                </div>
              </div>
              <!-- Director End-->
          <?php endforeach;
          endif; ?>

        </div>
        <!-- End-->
      </div>
      <!-- End-->
    </div>
  </div>
  <!-- END: CONTENT/MISC/TEAM-3 -->

  <!-- BEGIN: CONTENT/SLIDERS/PAST MEMBERS -->

  <!-- END: SLIDERS/PAST MEMBERS -->

  <!-- END: CONTENT/SLIDERS/TEAM-2 -->
  <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->