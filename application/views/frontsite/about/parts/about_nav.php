<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/bg1.jpg)">
  <div class="container">
    <div class="c-page-title c-pull-left">
      <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim"><?= $title; ?></h3>
      <h4 class="c-font-white c-font-thin c-opacity-07">
      </h4>
    </div>
    <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
      <li>
        <a href="Index-3.html" class="c-font-white">Home</a>
      </li>
      <li class="c-font-white">
        /
      </li>

      <li class="c-state_active c-font-brown-3">
        <?= $title; ?>
      </li>
    </ul>
  </div>
</div>

<div id="sticky-anchor"></div>

<div id="sticky">
  <div class="c-layout-breadcrumbs-1 c-font-bold c-bordered c-bordered-both">
    <div class="container" style="text-align:center;">

      <ul class="c-page-breadcrumbs c-theme-nav c-font-open  c-font-13 c-font-thin">
        <li>
          <a href="<?= base_url('front/aboutwyathservices'); ?>" <?php echo ($this->uri->segment(2) == "aboutwyathservices") ? 'class="c-font-brown-3"' : null; ?>>About</a>
        </li>
        <li>
          |
        </li>
        <li class="c-state_active">
          <a href="<?= base_url('front/boardofdirectors'); ?>" <?php echo ($this->uri->segment(2) == "boardofdirectors") ? 'class="c-font-brown-3"' : null; ?>>Board of Directors</a>
        </li>
        <li>
          |
        </li>

        <li class="c-state_active">
          <a href="<?= base_url('front/boardofadvisors'); ?>" <?php echo ($this->uri->segment(2) == "boardofadvisors") ? 'class="c-font-brown-3"' : null; ?>>Board of Advisors</a>
        </li>
        <li>
          |
        </li>
        <li class="c-state_active">
          <a href="<?= base_url('front/fourpillars'); ?>" <?php echo ($this->uri->segment(2) == "fourpillars") ? 'class="c-font-brown-3"' : null; ?>>5 Core Pillars</a>
        </li>
        <li>
          |
        </li>
        <li class="c-state_active">
          <a href="<?= base_url('front/keydifferentiators'); ?>" <?php echo ($this->uri->segment(2) == "keydifferentiators") ? 'class="c-font-brown-3"' : null; ?>>Key Differentiators</a>
        </li>
        <li>
          |
        </li>
        <li class="c-state_active">
          <a href="<?= base_url('front/ourimpact'); ?>" <?php echo ($this->uri->segment(2) == "ourimpact") ? 'class="c-font-brown-3"' : null; ?>>Our Impact</a>
        </li>
        <li>
          |
        </li>
        <li>
          <a href="<?= base_url('front/chairmansmessage'); ?>" <?php echo ($this->uri->segment(2) == "chairmansmessage") ? 'class="c-font-brown-3"' : null; ?>>Chairman's Message</a>
        </li>
        <li>
          |
        </li>

        <li class="c-state_active">
          <a href="<?= base_url('front/partners'); ?>" <?php echo ($this->uri->segment(2) == "partners") ? 'class="c-font-brown-3"' : null; ?>>Partners</a>
        </li>
        <style>
          .d-none {
            display: none !important;
          }
        </style>

        <li class="d-none">
          |
        </li>

        <li class="c-state_active d-none">
          <a href="<?= base_url('front/areacovered'); ?>" <?php echo ($this->uri->segment(2) == "areacovered") ? 'class="c-font-brown-3"' : null; ?>>Areas Covered</a>
        </li>
        <li class="d-none">
          |
        </li>

        <li class="c-state_active d-none">
          <a href="<?= base_url('front/news'); ?>" <?php echo ($this->uri->segment(2) == "news") ? 'class="c-font-brown-3"' : null; ?>>News</a>
        </li>



      </ul>


    </div>
  </div>
</div>
<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->