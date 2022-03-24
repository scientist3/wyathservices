<link href="<?= base_url('frontsite/'); ?>lightbox2/dist/css/lightbox.min.css" rel="stylesheet" />

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
  <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/bg1.jpg)">
    <div class="container">
      <div class="c-page-title c-pull-left">
        <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">Gallery</h3>
        <h4 class="c-font-white c-font-thin c-opacity-07">
        </h4>
      </div>
      <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
        <li>
          <a href="index-2.html" class="c-font-white">Home</a>
        </li>
        <li class="c-font-white">
          /
        </li>



        <li class="c-state_active c-font-brown-3">
          Gallery
        </li>
      </ul>
    </div>
  </div>

  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
  <div class="c-content-box c-size-sm1 c-bg-grey-1">
    <div class="container">
      <div class="c-content-product-1 c-opt-1">
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Gallery</h3>

          <div class="c-line-center">
          </div>

          <div class="col-md-12">
            <style>
              .lb-data .lb-caption {
                font-size: 27px;
              }
            </style>
            <!-- Gallery -->
            <!-- <div class="row" style="display: flex;flex-wrap: wrap;"> -->
            <?php if (valArr($event_gallery)) : ?>
              <?php foreach ($event_gallery as $event_id => $arrGallery) : ?>
                <h1><?= $event_list[$event_id]; ?></h1>
                <div class="row" style="display: flex;flex-wrap: wrap;;">
                  <?php foreach ($arrGallery as $key => $image) : ?>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 label">
                      <a href="<?php echo base_url($image->gal_img_path); ?>" data-lightbox="roadtrip" data-title="<?= $image->gal_img_caption; ?>">
                        <img src="<?php echo base_url($image->gal_img_thumb); ?>" class="w-100 shadow-1-strong img-rounded mb-4" alt="Boat on Calm Water" />
                      </a>
                    </div>

                  <?php endforeach; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>


            <!-- </div> -->
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
<!-- END: PAGE CONTAINER -->

<script src="<?= base_url('frontsite/'); ?>lightbox2/dist/js/lightbox-plus-jquery.js"></script>
<script src="<?= base_url('frontsite/'); ?>lightbox2/dist/js/lightbox.min.js"></script>

<script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
  })
</script>