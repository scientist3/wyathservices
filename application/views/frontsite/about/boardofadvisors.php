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
                    <div class="c-overlay-wrapper c-hide">
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
                      <button type="button" class="btn btn-xs btn-success btn_show_model" data-toggle="modal" data-target="#modal-message" data-message="<?= $member->bm_chairman_msg; ?>">
                        <i class="fa fa-eye"> Read more</i>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
              <!-- Director End-->
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
        <!-- End-->
      </div>
      <!-- End-->
    </div>
  </div>
  <!-- END: CONTENT/MISC/TEAM-3 -->

  <!-- END: PAGE CONTENT -->
</div>

<!-- END: PAGE CONTAINER -->

<!-- Model -->
<div class="bts-popup" role="alert" onLoad="self.focus();" style="z-index: 99999;">
  <div class="bts-popup-container bg-primary">
    <p id="msg_content" style="color: black;background-color: whitesmoke;"></p>
    <!-- <a href="#0" class="bts-popup-close img-replace">Close</a> -->
  </div>
</div>

<!-- Jquery and Bootstrap -->
<script src="<?= base_url('frontsite'); ?>/assets/plugins/jquery.min.js" type="text/javascript"></script>

<script>
  $(document).ready(function() {
    $('.btn_show_model').on('click', function() {
      // Prepare data
      $('#msg_content').html($(this).data('message'));
      $(".bts-popup").delay(1000).addClass('is-visible');
    });

    //open popup
    $('.bts-popup-trigger').on('click', function(event) {
      event.preventDefault();
      $('.bts-popup').addClass('is-visible');
    });
    //close popup
    $('.bts-popup').on('click', function(event) {
      if ($(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup')) {
        event.preventDefault();
        $(this).removeClass('is-visible');
      }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event) {
      if (event.which == '27') {
        $('.bts-popup').removeClass('is-visible');
      }
    });
  });
</script>