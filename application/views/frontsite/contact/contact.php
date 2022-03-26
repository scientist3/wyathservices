<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
  <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?= base_url('frontsite/'); ?>assets/base/img/content/backgrounds/bg1.jpg)">
    <div class="container">
      <div class="c-page-title c-pull-left">
        <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">Contact Us</h3>
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
          Contact Us
        </li>
      </ul>
    </div>
  </div>

  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
  <div class="c-content-box c-size-sm c-bg-grey-1">
    <div class="container">
      <div class="c-content-contact-1 c-opt-1">
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Contact Us</h3>
          <div class="c-line-center">
          </div>
        </div>

        <div class="row" data-auto-height=".c-height">
          <?php if ($this->session->flashdata('message') != null) {  ?>
            <div class="alert alert-success alert-dismissible show" role="alert">
              <strong></strong> <?php echo $this->session->flashdata('message'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          <?php } ?>
          <?php if ($this->session->flashdata('exception') != null) {  ?>
            <div class="alert <?= $this->session->flashdata('class_name') ?> alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $this->session->flashdata('exception'); ?>
            </div>
          <?php } ?>

          <div class="col-sm-8 c-body">
            <div class="row">
              <div class="col-sm-12">


                <form class="row" action="<?= base_url('front/contact'); ?>" method="post">
                  <!-- Name -->
                  <div class="form-group col-sm-4 col-12">
                    <label for="con_us_name">Name</label>
                    <input type="text" class="form-control" id="con_us_name" aria-describedby="namehelp" placeholder="Enter your name" name="con_us_name" value="<?= $input->con_us_name; ?>">
                    <?php echo form_error('con_us_name', '<small class="form-text text-danger bg-danger label">', '</small>'); ?>
                  </div>

                  <!-- Email -->
                  <div class="form-group col-sm-4 col-12">
                    <label for="con_us_email">Email</label>
                    <input type="email" class="form-control" id="con_us_email" aria-describedby="con_us_email_help" placeholder="Enter your Email" name="con_us_email" value="<?= $input->con_us_email; ?>">
                    <?php echo form_error('con_us_email', '<small class="form-text text-danger bg-danger label">', '</small>'); ?>
                  </div>

                  <!-- Phone Number -->
                  <div class="form-group col-sm-4 col-12">
                    <label for="con_us_phoneno">Phone Number</label>
                    <input type="text" class="form-control" id="con_us_phoneno" aria-describedby="con_us_phoneno_help" placeholder="Enter your Phone Number" name="con_us_phoneno" value="<?= $input->con_us_phoneno; ?>">
                    <?php echo form_error('con_us_phoneno', '<small class="form-text text-danger bg-danger label">', '</small>'); ?>
                  </div>

                  <!-- Subject -->
                  <div class="form-group col-sm-12 col-12">
                    <label for="con_us_subject">Subject</label>
                    <input type="text" class="form-control" id="con_us_subject" aria-describedby="con_us_subject_help" placeholder="Enter your subject" name="con_us_subject" value="<?= $input->con_us_subject; ?>">
                    <?php echo form_error('con_us_subject', '<small class="form-text text-danger bg-danger label">', '</small>'); ?>
                  </div>

                  <!-- Message -->
                  <div class="form-group col-sm-12 col-12">
                    <label for="con_us_message">Name</label>
                    <textarea type="text" class="form-control" id="con_us_message" aria-describedby="con_us_message_help" placeholder="Enter your message." name="con_us_message" rows="6"><?= $input->con_us_message; ?></textarea>
                    <?php echo form_error('con_us_message', '<small class="form-text text-danger bg-danger label">', '</small>'); ?>
                  </div>

                  <div class="form-check col-sm-offset-10 col-sm-2 pull-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="c-body">
              <div class="c-section">
                <h3>Wyath Services</h3>
              </div>
              <div class="c-section">
                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                  Address
                </div>
                <p>
                  Top Floor, MEGA MALL, <br />
                  Pantha Chowk, Srinagar,<br />
                  (191 101)<br />J & K, India

                </p>
                <p>
                  DAL LOCK GATE, <br />
                  Dalgate,<br />
                  Srinagar – 190 001<br />J & K, India

                </p>
              </div>
              <div class="c-section">
                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                  Contacts
                </div>
                <p>
                  <!--<strong>M </strong>+91 7006 580 488<br/>-->
                  <strong>L </strong>+91 194 245 1597<br />
                  <strong>E </strong><a href="mailto:info@wyathservices.com">info@wyathservices.com</a>
                </p>
              </div>
              <div class="c-section">
                <div class="c-content-label c-font-uppercase c-font-bold c-theme-bg">
                  Social
                </div>
                <br />
                <ul class="c-content-iconlist-1 c-theme">
                  <li>
                    <a href="https://twitter.com/wyathservices/" target="_blank"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/wyathservices/" target="_blank"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="https://youtube.com/wyathservices/" target="_blank"><i class="fa fa-youtube-play"></i></a>
                  </li>
                  <li>
                    <a href="https://linkedin.com/wyathservices/"><i class="fa fa-linkedin"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- END: CONTENT/CONTACT/CONTACT-1 -->
  <!-- BEGIN: CONTENT/CONTACT/FEEDBACK-1 -->
  <div class="c-content-box c-size-md c-bg-white">
    <div class="container">
      <div class="c-content-feedback-1 c-option-1">
        <div class="row">
          <div class="col-md-6">
            <div class="c-container c-bg-green c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_1.html)">
              <div class="c-content-title-1 c-inverse">
                <h3 class="c-font-uppercase c-font-bold">Need to know more?</h3>
                <div class="c-line-left">
                </div>
                <p class="c-font-lowercase">
                  Please feel free to drop us an email @
                  <a href="mailto:info@wyathservices.com">info@wyathservices.com</a> and we will get back to you as
                  soon as we can.
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.html)">
              <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Have a question?</h3>
                <div class="c-line-left">
                </div>

                <p>
                  Ask your questions @ <a href="mailto:info@wyathservices.com">info@wyathservices.com</a> and let us
                  help you to get your questions answered!
                </p>
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