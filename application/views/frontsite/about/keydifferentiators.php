<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <?php $this->load->view('frontsite/about/parts/about_nav'); ?>

  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
  <div class="c-content-box c-size-sm1 c-bg-white">
    <div class="container">
      <div class="c-content-product-1 c-opt-1">
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">KEY DIFFERENTIATORS</h3>
          <p class="c-font-uppercase c-center">

            AT WYATH SKILLS, WE PAY ATTENTION TO THE JOURNEY OF EVERY CANDIDATE FROM MOBILISATION TILL PLACEMENT IN A JOB. WITH A PLACEMENT SUCCESS RATE OF 73%, WE BELIEVE IN A LEARNER CENTRIC APPROACH TOWARDS SKILLS TRAINING. OUR SKILLS AND CAREER COUNSELLING INTERVENTIONS REST ON SOME KEY PRINCIPLES THAT ENSURE SCALABILITY AND REPLICABILITY, MAKING IT A GLOBAL BEST PRACTICE.
          </p>
          <div class="c-line-center">
          </div>

        </div>

      </div>
    </div>
  </div>
  <!-- END: CONTENT/PRODUCTS/PRODUCT-1 -->


  <!-- Key Differentiators ROW 1 -->
  <?php if (valArr($key_differentiators)) : ?>
    <?php foreach ($key_differentiators as $key => $key_differentiator) : ?>
      <?php if (($key + 2) % 2 == 0) : ?>
        <div class="c-content-box c-bg-brown-3">
          <div class="featured_section56">
            <!-- Key Differentiators Left-->
            <div class="left">
              <div class="cont">
                <div class="c-content-title-1">
                  <h3 class="c-center c-font-uppercase c-font-bold c-font-dark"><?php echo $key_differentiator->kd_title ?></h3>
                  <div class="c-line-center"> </div>
                  <p class="c-font-open c-center">
                    <?php echo $key_differentiator->kd_des ?>
                  </p>
                </div>
              </div>
            </div>
          <?php else : ?>

            <!-- Key Differentiators Right -->
            <div class="right">
              <div class="cont">
                <div class="c-content-title-1">
                  <h3 class="c-center c-font-uppercase c-font-bold c-font-dark"><?php echo $key_differentiator->kd_title ?> </h3>
                  <div class="c-line-center"> </div>
                  <p class="c-font-open c-center">
                    <?php echo $key_differentiator->kd_des ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>

  <!-- 	Key Differentiators ROW 5 -->

  <!-- END: CONTENT/BARS/BAR-3 -->

  <!-- BEGIN: CONTENT/SLIDERS/TESTIMONIALS-3 -->
  <div class="c-content-box c-size-lg c-bg-parallax" style="background-image: url(assets/base/img/content/backgrounds/bg-3.jpg)">
    <div class="container">
      <div class="c-content-counter-1 c-opt-1 c-content-box">

        <div class="row">
          <div class="col-md-12 c-size-md c-theme-bg">
            <br /><br />
            <div class=" c-font-bold c-font-75 c-center c-font-white" data-counter="counterup">
              <?= $students_impacted; ?>
            </div>
            <h4 class="c-font-25 c-font-black c-font-bold c-center  ">Students/Beneficiaries impacted by Wyath Services in the last 5 years</h4>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- END: CONTENT/SLIDERS/TESTIMONIALS-3 -->

  <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->