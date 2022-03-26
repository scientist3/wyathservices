<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
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
          <a href="index-2.html" class="c-font-white">Home</a>
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

  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: CONTENT/PRODUCTS/PRODUCT-1 -->
  <div class="c-content-box c-size-sm1 c-bg-grey-1">
    <div class="container">
      <div class="c-content-product-1 c-opt-1">
        <!-- News -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">News</h3>
          <div class="c-line-center"></div>
          <div class="col-md-12">
            <table class="table table-hover" cellspacing="1" cellpadding="6" rules="all" border="1" id="">
              <tbody>
                <tr align="center">
                  <th scope="col" style="width:5%;">S.No</th>
                  <th scope="col" style="width:10%;">Date</th>
                  <th scope="col" style="width:25%;">Title</th>
                  <th scope="col" style="width:55%;">Contents</th>
                  <th scope="col" style="width:5%;">Link</th>
                </tr>
                <?php if (valArr($news)) :
                  $s = 0; ?>
                  <?php foreach ($news as $event_id => $new) :
                    $s++; ?>
                    <tr>
                      <td align="center">
                        <span><?= $s; ?></span>
                      </td>
                      <td align="center"><?= date('d-M-Y', strtotime($new->news_doc)); ?></td>
                      <td align="left"><?= $new->news_title ?></td>
                      <td class="sp" align="center">
                        <?= $new->news_desc ?>
                      </td>
                      <td class="sp">
                        <a id="" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="<?= $new->news_link; ?>" target="_blank">View</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>

        <!-- Notification -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Notification</h3>
          <div class="c-line-center"></div>
          <div class="col-md-12">
            <table class="table table-hover" cellspacing="1" cellpadding="6" rules="all" border="1" id="">
              <tbody>
                <tr align="center">
                  <th scope="col" style="width:5%;">S.No</th>
                  <th scope="col" style="width:10%;">Date</th>
                  <th scope="col" style="width:25%;">Title</th>
                  <th scope="col" style="width:55%;">Contents</th>
                  <th scope="col" style="width:5%;">Link</th>
                </tr>
                <?php if (valArr($notices)) :
                  $s = 0; ?>
                  <?php foreach ($notices as $event_id => $new) :
                    $s++; ?>
                    <tr>
                      <td align="center">
                        <span><?= $s; ?></span>
                      </td>
                      <td align="center"><?= date('d-M-Y', strtotime($new->news_doc)); ?></td>
                      <td align="left"><?= $new->news_title ?></td>
                      <td class="sp" align="center">
                        <?= $new->news_desc ?>
                      </td>
                      <td class="sp">
                        <a id="" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="<?= $new->news_link; ?>" target="_blank">View</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>

        <!-- Events -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Events</h3>
          <div class="c-line-center"></div>
          <div class="col-md-12">
            <table class="table table-hover" cellspacing="1" cellpadding="6" rules="all" border="1" id="">
              <tbody>
                <tr align="center">
                  <th scope="col" style="width:5%;">S.No</th>
                  <th scope="col" style="width:10%;">Date</th>
                  <th scope="col" style="width:25%;">Title</th>
                  <th scope="col" style="width:52%;">Contents</th>
                  <th scope="col" style="width:8%;">Link</th>
                </tr>
                <?php if (valArr($events)) :
                  $s = 0; ?>
                  <?php foreach ($events as $event_id => $new) :
                    $s++; ?>
                    <tr>
                      <td align="center">
                        <span><?= $s; ?></span>
                      </td>
                      <td align="center"><?= date('d-M-Y', strtotime($new->news_doc)); ?></td>
                      <td align="left"><?= $new->news_title ?></td>
                      <td class="sp" align="center">
                        <?= $new->news_desc ?>
                      </td>
                      <td class="sp">
                        <?php if (!empty($new->news_link)) : ?>
                          <a id="" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="<?= $new->news_link; ?>" target="_blank">View</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>
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