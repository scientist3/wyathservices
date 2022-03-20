<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <?php $this->load->view('frontsite/about/parts/about_nav'); ?>

  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
  <div class="c-content-box c-size-sm1 c-bg-white">
    <div class="container">
      <div class="c-content-product-1 c-opt-1">
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Our Impact</h3>
          <p class="c-font-uppercase c-center">

            IN INDIA LARGE NUMBER OF PEOPLE ARE STILL LIVING IN BELOW THE POVERTY LINE
            (BPL) AND FACE A NUMBER OF ISSUES RELATED TO EDUCATION AND EMPLOYMENT.
            PROVIDING MEANINGFUL EMPLOYMENT AND LIVELIHOOD OPPORTUNITIES TO YOUTH IS
            AN ABSOLUTE NECESSITY TO ACHIEVE INCLUSIVE AND SUSTAINABLE GROWTH GIVEN
            THE FAVOURABLE DEMOGRAPHICS. WYATH SKILLS HAS BEEN A FRONT RUNNER IN
            PROVIDING SKILLS AND LIVELIHOOD TRAINING TO PEOPLE FROM DIFFERENT SOCIAL
            GROUPS. OUR PROGRAMMES HAVE YIELDED IMPACT THROUGH IMPROVEMENT IN
            INCOME AND STANDARD OF LIVING, NOT ONLY FOR INDIVIDUALS BUT ALSO THEIR
            FAMILIES AND COMMUNITIES.
            WE HAVE SUCCESSFULLY SKILLED MORE THAN 5000 TRAINEES WITHIN A PERIOD OF 5
            YEARS PAN- J&K CAPACITATING THEM FOR EMPLOYMENT. ALL OF THESE HAVE BEEN
            SKILLED THROUGH PLACEMENT LINKED PROGRAMMES AND ARE FROM BOTTOM OF THE
            PYRAMID (BOP) GROUPS, AND ARE MOSTLY SCHOOL DROPOUTS MAJORITY OF WHOM
            ARE 8TH OR 10TH PASS. SINCE OUR VISION IS OF ENGENDERED & INCLUSIVE SKILLING
            60% OF OUR SUCCESSFUL TRAINEES ARE WOMEN, LARGELY FROM BACKWARD
            REGIONS OF THE J&K. MANY OF THEM ARE FIRST TIME ENTRANTS INTO THE FORMAL
            WORK SET UP AND HAVE EVOLVED FROM BEING UNSKILLED HELPERS TO SKILLED
            OPERATORS AND SUPERVISORS. THE SUCCESSFUL INCLUSION OF WOMEN INTO THE
            WORLD OF WORK THROUGH JOBS AND SAFE WORKING CONDITIONS HAS ALSO
            BENEFITTED THEIR FAMILIES AND HELPED IMPROVE THEIR OVERALL ATTITUDE
            TOWARDS SKILLS.
          </p>
          <div class="c-line-center">
          </div>


        </div>

      </div>
    </div>
  </div>
  <!-- END: CONTENT/PRODUCTS/PRODUCT-1 -->


  <!-- Key Differentiators ROW 1 -->
  <?php if (valArr($our_impact)) : ?>
    <?php foreach ($our_impact as $key => $impact) : ?>
      <?php if (($key + 2) % 2 == 0) : ?>
        <div class="c-content-box c-bg-brown-3">
          <div class="featured_section56">
            <!-- Key Differentiators Left-->
            <div class="left">
              <div class="cont">
                <div class="c-content-title-1">
                  <h3 class="c-center c-font-uppercase c-font-bold c-font-dark"><?php echo $impact->kd_title ?></h3>
                  <div class="c-line-center"> </div>
                  <p class="c-font-open c-center">
                    <?php echo $impact->kd_des ?>
                  </p>
                </div>
              </div>
            </div>
          <?php else : ?>

            <!-- Key Differentiators Right -->
            <div class="right">
              <div class="cont">
                <div class="c-content-title-1">
                  <h3 class="c-center c-font-uppercase c-font-bold c-font-dark"><?php echo $impact->kd_title ?> </h3>
                  <div class="c-line-center"> </div>
                  <p class="c-font-open c-center">
                    <?php echo $impact->kd_des ?>
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