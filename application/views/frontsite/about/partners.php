<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <?php $this->load->view('frontsite/about/parts/about_nav'); ?>
  <!-- BEGIN: PAGE CONTENT -->


  <div class="c-content-box c-size-md">
    <div class="container">
      <!-- Begin: Testimonals 1 component -->

      <!-- Begin: Title 1 component -->
      <!--<div class="c-content-title-1">
					<h3 class="c-center c-font-uppercase c-font-bold">Meet Our Valuable Team</h3>
					<div class="c-line-center c-theme-bg">
					</div>
				</div>-->
      <!-- End-->
      <div class="c-content-client-logos-1">
        <!-- Begin: Title 1 component -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Corporate Partners</h3>
          <div class="c-line-center c-theme-bg">
          </div>
        </div>
        <!-- End-->


        <div class="row">
          <div class="c-logos">
            <div class="row">

              <?php if (valArr($partners)) : ?>
                <?php foreach ($partners as $key => $partner) : ?>
                  <div class="col-md-3 col-xs-6 c-logo c-logo-1">
                    <a href="<?= !empty($partner->par_url) ? $partner->par_url : '#'; ?>" <?php if ($partner->par_url) { ?>target="_BLANK" <?php } ?>>
                      <img class="c-img-pos" src="<?= base_url($partner->par_img_path); ?>" alt="<?= $partner->par_desc ?>" />
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- End-->
      </div>
      <!-- End-->
    </div>
  </div>

</div>
<!-- END: PAGE CONTAINER -->