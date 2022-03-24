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

            <!-- Gallery -->
            <div class="row">
              <?php if (valArr($gallery)) : ?>
                <?php foreach ($gallery as $key => $img) : ?>
                  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <a href="<?php echo base_url($img['img_path']); ?>" data-lightbox="roadtrip" data-title="My caption">
                      <img src="<?php echo base_url($img['img_path']); ?>" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>


              <table class="table table-hover" cellspacing="1" cellpadding="6" rules="all" border="1" id="ContentPlaceHolder1_GridView1">
                <tr align="center">
                  <th scope="col" style="width:5%;">S.No</th>
                  <th class="hide" align="center" scope="col">&nbsp;</th>
                  <th scope="col" style="width:25%;">Date</th>
                  <th scope="col" style="width:50%;">Event Name</th>
                  <th scope="col">Photo Gallery</th>
                  <th scope="col">Video Gallery</th>
                </tr>

                <tr>
                  <td align="center" style="width:5%;">
                    <span id="ContentPlaceHolder1_GridView1_sno_0">1</span>
                  </td>
                  <td class="hide" align="center">28</td>
                  <td align="center" style="width:10%;">07 Jan 2018</td>
                  <td align="left" style="width:50%;">Wyath Services Gallery</td>
                  <td class="sp" align="center">
                    <a id="ContentPlaceHolder1_GridView1_HyperLink1_0" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://photos.app.goo.gl/0rwkFreiVtrisjaJ3" target="_blank">View</a>
                  </td>
                  <td class="sp">
                    <a id="ContentPlaceHolder1_GridView1_HyperLink2_0" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://youtu.be/iboO2d3zGys" target="_blank">View</a>
                  </td>
                </tr>




                <tr>
                  <td align="center" style="width:5%;">
                    <span id="ContentPlaceHolder1_GridView1_sno_1">2</span>
                  </td>
                  <td class="hide" align="center">27</td>
                  <td align="center" style="width:10%;">24 Feb 2018</td>
                  <td align="left" style="width:50%;">Wyath Services Gallery</td>
                  <td class="sp" align="center">
                    <a id="ContentPlaceHolder1_GridView1_HyperLink1_1" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://photos.app.goo.gl/VhYCDACJKZ96G2cM2" target="_blank">View</a>
                  </td>
                  <td class="sp">
                    <a id="ContentPlaceHolder1_GridView1_HyperLink2_1" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://youtu.be/iboO2d3zGys" target="_blank">View</a>
                  </td>
                </tr>


                <!--
		<tr>
			<td align="center" style="width:5%;">
               <span id="ContentPlaceHolder1_GridView1_sno_2">3</span>
            </td>
			<td class="hide" align="center">26</td>
			<td align="center" style="width:10%;">23 Feb 2016</td>
			<td align="left" style="width:50%;">Event Name and Description 3</td>
			<td class="sp" align="center">
               <a id="ContentPlaceHolder1_GridView1_HyperLink1_2" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://goo.gl/photos/dWxsBNifQCaXs9SL6" target="_blank">View</a>
             </td>
			 <td class="sp">
                <a id="ContentPlaceHolder1_GridView1_HyperLink2_2" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://www.youtube.com/watch?v=X0lGY64LKOA&amp;list=PLD9-cYfAv3m1sm21j2UGKiryywBXBwxSI" target="_blank">View</a>
             </td>
		</tr>
		
		<tr>
			<td align="center" style="width:5%;">
                <span id="ContentPlaceHolder1_GridView1_sno_3">4</span>
            </td>
			<td class="hide" align="center">25</td>
			<td align="center" style="width:10%;">30 Jan 2016</td>
			<td align="left" style="width:50%;">Event Name and Description 4</td>
			<td class="sp" align="center">
				<a id="ContentPlaceHolder1_GridView1_HyperLink1_3" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://goo.gl/photos/jTbGwQSQSbcFEDMV6" target="_blank">View</a>
             </td>
			 <td class="sp">
                <a id="ContentPlaceHolder1_GridView1_HyperLink2_3" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://www.youtube.com/watch?v=9DC7V2jzTEY&amp;list=PLD9-cYfAv3m1VyrAiPQal66zfkaiqQHMD" target="_blank">View</a>
              </td>
		</tr>
		
		<tr>
			<td align="center" style="width:5%;">
                <span id="ContentPlaceHolder1_GridView1_sno_4">5</span>
             </td>
			 <td class="hide" align="center">21</td>
			 <td align="center" style="width:10%;">28 Oct 2015</td>
			 <td align="left" style="width:50%;">Event Name and Description 5</td>
			 <td class="sp" align="center">
                 <a id="ContentPlaceHolder1_GridView1_HyperLink1_4" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://goo.gl/photos/B3qRY2PfyR4FJ2fi7" target="_blank">View</a>
              </td>
			  <td class="sp">
                  <a id="ContentPlaceHolder1_GridView1_HyperLink2_4" class="btn c-btn-red-2 c-btn-uppercase c-btn-bold c-btn-border-1x" href="https://www.youtube.com/watch?v=-kriFDL96MA&amp;list=PLD9-cYfAv3m2v25dtBdbwOeCgwCwgylfi" target="_blank">View</a>
              </td>
		</tr> -->

              </table>
            </div>
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