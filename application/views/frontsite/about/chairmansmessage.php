<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <?php $this->load->view('frontsite/about/parts/about_nav'); ?>
  <!-- BEGIN: PAGE CONTENT -->



  <div class="c-content-box c-size-lg c-bg-grey-1">
    <div class="container">
      <div class="">
        <div class="row">
          <div class="col-md-7">
            <div class="c-content-feature-5">
              <div class="c-content-title-1">
                <h3 class="c-left c-font-dark c-font-uppercase c-font-bold"><?php echo "CHAIRMAN'S<br>MESSAGE"; ?></h3>
                <div class="c-line-left c-bg-blue-3 c-theme-bg">
                </div>
              </div>
              <div class="c-text c-font-sbold">
                <?php echo $chairman_msg->bm_desig; ?>
              </div>

              <img class="c-photo img-responsive" width="420" alt="" src="<?= !empty($chairman_msg->bm_img_path) ? base_url($chairman_msg->bm_img_path) : '#'; ?>" style="right:40px;" />
            </div>
          </div>
          <div class="col-md-5">
            <div class="c-content-box">


              <div class="c-content-panel">

                <div class="c-body">
                  <blockquote class="c-theme-border">
                    <?php echo $chairman_msg->bm_chairman_msg; ?>
                  </blockquote>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->