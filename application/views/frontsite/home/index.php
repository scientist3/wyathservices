<script src="<?= base_url('frontsite'); ?>/assets/plugins/jquery.min.js" type="text/javascript"></script>

<script src="<?= base_url('frontsite'); ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
  function openModal() {
    $('#myModal').modal('show');
  }
  openModal();
</script>
<!-- BEGIN: PAGE CONTENT -->
<div class="bts-popup" role="alert" onLoad="self.focus();" style="z-index: 99999;">
  <div class="bts-popup-container">
    <img src="<?= !empty($banner->b_img_path) ? base_url($banner->b_img_path) : '#'; ?>" alt="" width="100%" />

    <div class="bts-popup-button">

    </div>
    <a href="#0" class="bts-popup-close img-replace">Close</a>
  </div>
</div>

<div class="c-layout-page">
  <?php $this->load->view('frontsite/home/image_slider_view'); ?>
</div>


<!-- What we do -->
<div id="11" class="c-content-box c-size-lg c-no-bottom-padding c-overflow-hide" style="background-image: url(<?= base_url('frontsite'); ?>/assets/base/img/content/backgrounds/bg-46.jpg)">
  <div class="c-container">

    <div class="row">
      <div class="col-md-12">
        <div class="c-content-title-1">
          <h3 class="c-font-34 c-font-center c-font-bold c-font-uppercase c-margin-b-30">
            What We Do </h3>
          <div class="c-line-center c-theme-bg">
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="c-content-tab-2 c-theme c-opt-1">
          <ul class="nav c-tab-icon-stack c-font-sbold c-font-uppercase">
            <?php
            if (valArr($what_we_dos)) :
              foreach ($what_we_dos as $key => $what_we_do) : ?>

                <li class="<?= $key == 0 ? 'active' : null; ?>">
                  <a href="#c-tab2-opt1-<?= $key ?>" data-toggle="tab">
                    <span class="c-content-line-icon c-icon-25"></span>
                    <!-- <span class="c-title">Skill<br> Development</span> -->
                    <span class="c-title">
                      <?php
                      $arr = explode(" ", $what_we_do->w_menu_title);
                      $str = implode("<br>", $arr);
                      // ddisplay($arr);
                      echo $str;
                      ?></span>
                  </a>
                  <div class="c-arrow">
                  </div>
                </li>
            <?php
              endforeach;
            endif; ?>

          </ul>
          <div class="c-tab-content">
            <div class="c-bg-img-center1" style="background-image: url(<?= base_url('frontsite'); ?>/assets/base/img/content/backgrounds/bg-62.jpg)">
              <div class="container">
                <div class="tab-content">
                  <?php if (valArr($what_we_dos)) :
                    foreach ($what_we_dos as $key => $what_we_do) :
                  ?>
                      <div class="tab-pane fade in <?= $key == 0 ? 'active' : null; ?>" id="c-tab2-opt1-<?= $key ?>">
                        <div class="c-tab-pane">
                          <img class="img-responsive" src="<?= base_url($what_we_do->w_img_path); ?>" alt="" />
                          <h4 class="c-font-30 c-font-uppercase c-font-sbold"><?= $what_we_do->w_menu_title ?></h4>
                          <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin ">
                            <?= $what_we_do->w_menu_desc ?>

                          </p>
                          <a href="#" class="btn btn-sm c-theme-btn c-btn-square c-btn-sbold">
                            EXPLORE </a>
                        </div>
                      </div>
                  <?php endforeach;
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="c-content-box c-size-lg c-bg-parallax" style="background-image: url(<?= base_url('frontsite'); ?>/assets/base/img/content/backgrounds/bg-3.jpg)">

  <!-- Featured Initiatives -->
  <div class="container">
    <div class="c-content-title-1">
      <h3 class="c-font-uppercase c-font-bold c-font-white c-center">Featured Initiatives</h3>
      <div class="c-line-center">
      </div>

    </div>
    <div class="c-content-feature-2-grid" data-auto-height="true" data-mode="base-height">
      <div class="row" style="display: flex; align-items: center; flex-wrap: wrap; justify-content: space-evenly;">

        <?php if (valArr($featured_initatives)) { ?>
          <?php foreach ($featured_initatives as $key => $initative) { ?>
            <div class="col-md-4 col-sm-6">
              <div class="c-content-feature-2" data-wow-delay1="2s" data-height="height">
                <div class="c-icon-wrapper">
                  <div class="c-content-line-icon c-theme c-icon-globe">
                  </div>
                </div>
                <h3 class="c-font-uppercase c-font-bold c-title"><a href="#"><?= $initative->fi_title; ?></a></h3>
                <p>
                  <?= $initative->fi_desc; ?>
                </p>
              </div>
            </div>
        <?php }
        } ?>

      </div>
    </div>
  </div>

  <!-- Projects -->
  <div id="13" class="c-content-box c-size-md c-no-padding c-bg-dark">
    <div class="c-content-feature-4">
      <div class="c-bg-parallax c-feature-bg c-content-right c-diagonal c-border-left-dark widthimage" style="background-image: url(<?= base_url('frontsite'); ?>/assets/base/img/content/backgrounds/bg-5.jpg);">
      </div>
      <div class="c-content-area c-content-left width">
      </div>
      <div class="container">
        <div class="c-feature-content c-left width">
          <div class="c-content-v-center">
            <div class="c-wrapper">
              <div class="c-body">
                <div class="c-content-title-1">
                  <h3 class="c-font-uppercase c-font-bold c-left c-font-white" style="padding-top:20px;">Projects<a href="Projects.html" class="c-font-uppercase c-font-white c-theme-link c-font-15 c-font-sbold c-hide">&nbsp;&nbsp;|&nbsp;&nbsp;View
                      All</a></h3>
                  <div class="c-line-left">
                  </div>

                </div>
                <div class="row" style="display: flex; align-items: center; flex-wrap: wrap; justify-content: space-evenly;">
                  <?php if (valArr($projects)) { ?>
                    <?php foreach ($projects as $key => $project) { ?>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href="<?= $project->pr_url; ?>" target="_blank">
                          <div class="c-content-color-demo tooltips" data-original-title="Click to view the projects">
                            <div class="c-color-view c-bg-white c-bg-white-font c-font-14 c-font-bold c-font-uppercase">
                              <img src="<?= base_url($project->pr_img_path); ?>" class="img-responsive" style="display:inline;" />
                            </div>
                            <div class="c-color-info c-bg-white c-font-12 c-font-sbold c-font-uppercase">
                              <?= $project->pr_caption; ?>
                            </div>
                          </div>
                        </a>
                      </div>
                  <?php }
                  } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Programs -->
  <div id="17" class="c-content-box c-size-md c-no-padding c-bg-dark-3 c-hide">
    <div class="c-content-feature-4">
      <div class="c-bg-parallax c-feature-bg c-content-left c-diagonal c-border-right-dark-3 widthimage" style="background-image: url(<?= base_url('frontsite'); ?>/assets/base/img/content/backgrounds/bg-11.jpg);">
      </div>
      <div class="c-content-area c-content-right width">
      </div>
      <div class="container">
        <div class="c-feature-content c-right width">
          <div class="c-content-v-center">
            <div class="c-wrapper">
              <div class="c-body">
                <div class="c-content-title-1">
                  <h3 class="c-font-uppercase c-font-bold c-font-white" style="padding-top:20px;">Programs</h3>
                  <div class="c-line-right">
                  </div>

                </div>
                <div class="row">
                  <!--<div class="col-md-4 col-sm-4 col-xs-6">
                <a href="https://www.ictacademy.in/emc" target="_blank">
					<div class="c-content-color-demo tooltips" data-original-title="Click to view the programs">
						<div class="c-color-view c-bg-white c-bg-white-font c-font-14 c-font-bold c-font-uppercase">
							<img src="<?= base_url('frontsite'); ?>/assets/base/img/content/stock/3.jpg" class="img-responsive" />
						</div>
						<div class="c-color-info c-bg-white c-font-12 c-font-sbold c-font-uppercase">
							EMC Academic Alliance
						</div>
					</div>
                    </a>
                    </div>
					-->
                  <div class="col-md-4 col-sm-4 col-xs-6">
                    <a href="#" target="_blank">
                      <div class="c-content-color-demo tooltips" data-original-title="Click to view the programs">
                        <div class="c-color-view c-bg-white c-bg-white-font c-font-14 c-font-bold c-font-uppercase">
                          <img src="<?= base_url('frontsite'); ?>/assets/base/img/content/stock/6.jpg" class="img-responsive" />
                        </div>
                        <div class="c-color-info c-bg-white c-font-12 c-font-sbold c-font-uppercase">
                          Wyath Services Design Academy
                        </div>
                      </div>
                    </a>
                  </div>
                  <!--
                    <div class="col-md-4 col-sm-4 col-xs-6">
                    <a href="https://www.ictacademy.in/vmware" target="_blank">
					<div class="c-content-color-demo tooltips" data-original-title="Click to view the programs" >
						<div class="c-color-view c-bg-white c-bg-white-font c-font-14 c-font-bold c-font-uppercase">
							<img src="<?= base_url('frontsite'); ?>/assets/base/img/content/stock/4.jpg" class="img-responsive" />
						</div>
						<div class="c-color-info c-bg-white c-font-12 c-font-sbold c-font-uppercase">
							VmWare IT Academy
						</div>
					</div></a>
                    </div>
                    -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Student beneficiary impacted -->
  <div id="14" class="c-content-box c-size-sm c-bg-grey-1">
    <div class="c-content-bar-2 c-opt-1">
      <div data-auto-height="true">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="c-content-counter-1 c-opt-1 c-content-box">
                <div class="c-content-v-center c-theme-bg">
                  <div class="c-wrapper">
                    <div class="c-body" style="padding: 0px;padding-bottom:22px">
                      <div class=" c-font-bold c-font-85 c-center c-font-white" data-counter="counterup">
                        <?php echo $students_impacted; ?>
                      </div>
                      <h3 class="c-font-black c-font-bold c-center">Students /Beneficaries impacted by Wyath
                        Services in the last 5 years</h3>
                    </div>

                    <div class="c-body c-hide" style="padding: 0px; padding-bottom:22px">
                      <div class=" c-font-bold c-font-85 c-center c-font-white" data-counter="counterup">
                        73
                      </div>
                      <h3 class="c-font-black c-font-bold c-center">Placement Percentage</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Partners -->
  <div class="c-content-box c-size-lg c-bg-white">
    <div class="container">
      <div class="c-content-client-logos-slider-1 c-bordered" data-slider="owl" data-items="5" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="2" data-auto-play="5000">
        <!-- Begin: Title 1 component -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Partners</h3>
          <div class="c-line-center c-theme-bg">
          </div>
        </div>
        <!-- End-->
        <!-- Begin: Owlcarousel -->
        <div class="owl-carousel owl-theme c-theme owl-bordered1">
          <?php if (valArr($partners)) : ?>
            <?php foreach ($partners as $key => $partner) : ?>
              <div class="item">
                <a href="<?= $partner->par_url ?>" target="_BLANK">
                  <img src="<?= base_url($partner->par_img_path); ?>" class="img-responsive" alt="" />
                </a>
              </div>
          <?php endforeach;
          endif; ?>

        </div>
        <!-- End-->
      </div>
    </div>

  </div>

</div>
<!-- Jquery and Bootstrap -->
<script src="<?= base_url('frontsite'); ?>/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {

    window.onload = function() {
      $(".bts-popup").delay(1000).addClass('is-visible');
    }

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