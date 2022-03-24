<!-- LOAD JQUERY LIBRARY -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

<!-- LOADING FONTS AND ICONS -->
<link href="http://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet" property="stylesheet" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('frontsite/revolution/'); ?>revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('frontsite/revolution/'); ?>revolution/fonts/font-awesome/css/font-awesome.css">

<!-- REVOLUTION STYLE SHEETS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('frontsite/revolution/'); ?>revolution/css/settings.css">

<!-- REVOLUTION LAYERS STYLES -->
<style type="text/css">
  .tp-gradientstyle {
    background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.75) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.75)));
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
    background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.75) 100%);
    background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.75) 100%);
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.75) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
  }
</style>
<style type="text/css">
  .gyges .tp-thumb {
    opacity: 1
  }

  .gyges .tp-thumb-img-wrap {
    padding: 3px;
    background-color: rgba(17, 17, 17, 1);
    display: inline-block;
    width: 100%;
    height: 100%;
    position: relative;
    margin: 0px;
    box-sizing: border-box;
    transition: all 0.3s;
    -webkit-transition: all 0.3s
  }

  .gyges .tp-thumb-image {
    padding: 3px;
    display: block;
    box-sizing: border-box;
    position: relative;
    -webkit-box-shadow: inset 5px 5px 10px 0px rgba(17, 17, 17, 1);
    -moz-box-shadow: inset 5px 5px 10px 0px rgba(17, 17, 17, 1);
    box-shadow: inset 5px 5px 10px 0px rgba(17, 17, 17, 1)
  }

  .gyges .tp-thumb:hover .tp-thumb-img-wrap,
  .gyges .tp-thumb.selected .tp-thumb-img-wrap {
    background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(100%, rgba(255, 255, 255, 1)));
    background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%)
  }

  .gyges .tp-tab {
    opacity: 1;
    padding: 10px;
    box-sizing: border-box;
    font-family: "roboto", sans-serif;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15)
  }

  .gyges .tp-tab-image {
    width: 60px;
    height: 60px;
    max-height: 100%;
    max-width: 100%;
    position: relative;
    display: inline-block;
    float: left
  }

  .gyges .tp-tab-content {
    background: rgba(0, 0, 0, 0);
    position: relative;
    padding: 15px 15px 15px 85px;
    left: 0px;
    overflow: hidden;
    margin-top: -15px;
    box-sizing: border-box;
    color: rgba(51, 51, 51, 0);
    display: inline-block;
    width: 100%;
    height: 100%;
    position: absolute
  }

  .gyges .tp-tab-date {
    display: block;
    color: rgba(255, 255, 255, 0.5);
    font-weight: 500;
    font-size: 12px;
    margin-bottom: 0px
  }

  .gyges .tp-tab-title {
    display: block;
    text-align: left;
    color: rgba(255, 255, 255, 1);
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    line-height: 17px
  }

  .gyges .tp-tab:hover,
  .gyges .tp-tab.selected {
    background: rgba(0, 0, 0, 0.51)
  }

  .gyges .tp-tab-mask {}

  @media only screen and (max-width:960px) {}

  @media only screen and (max-width:768px) {}
</style>

<!-- FONT AND STYLE FOR BASIC DOCUMENTS, NO NEED FOR FURTHER USAGE IN YOUR PROJECTS-->
<link href="http://fonts.googleapis.com/css?family=Roboto%3A700%2C300" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontsite/revolution/'); ?>assets/css/noneed.css"> -->

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- SLIDER EXAMPLE -->
<!-- <section class="example"> -->

<div id="rev_slider_18_1_wrapper" class="rev_slider_wrapper " data-alias="carousel-gallery" data-source="gallery" style="margin:0px auto;background:#000000;padding:0px;margin-top:0px;margin-bottom:0px;">
  <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
  <div id="rev_slider_18_1" class="rev_slider " style="display:none;" data-version="5.4.1">
    <ul>
      <?php
      if (valArr($sliders)) :
        foreach ($sliders as $key => $image) :  ?>
          <!-- SLIDE  -->
          <li data-index="rs-<?php echo $key; ?>" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo base_url($image->s_img_path); ?>" data-rotate="0" data-saveperformance="off" data-title="<?php echo $image->s_title; ?>" data-param1="Photography" data-description="">
            <!-- MAIN IMAGE -->
            <img src="<?php echo base_url($image->s_img_path); ?>" alt="" data-lazyload="<?php echo base_url($image->s_img_path); ?>" data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
            <?php print_r() ?>
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme  tp-gradientstyle" id="slide-<?php echo $key; ?>-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-width="full" data-height="['200','200','200','250']" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":2000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"> </div>

            <!-- LAYER NR. 2 -->
            <a class="tp-caption   tp-resizeme" href="#" target="_self" id="slide-<?php echo $key; ?>-layer-1" data-x="['left','left','left','left']" data-hoffset="['40','40','30','20']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['90','90','79','99']" data-fontsize="['40','40','25','20']" data-lineheight="['40','40','25','20']" data-width="['580','480','340','260']" data-height="none" data-whitespace="normal" data-type="text" data-actions='' data-basealign="slide" data-responsive_offset="on" data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; min-width: 580px; max-width: 580px; white-space: normal; font-size: 40px; line-height: 40px; font-weight: 500; color: rgba(255,255,255,1);font-family:Roboto;text-decoration: none;"><?php echo $image->s_title; ?></a>

            <!-- LAYER NR. 3 -->
            <div class="tp-caption   tp-resizeme" id="slide-<?php echo $key; ?>-layer-3" data-x="['left','left','left','left']" data-hoffset="['40','40','30','20']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['35','35','20','20']" data-width="['580','480','340','260']" data-height="none" data-whitespace="normal" data-type="text" data-basealign="slide" data-responsive_offset="on" data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; min-width: 580px; max-width: 580px; white-space: normal; font-size: 15px; line-height: 20px; font-weight: 500; color: rgba(255,255,255,0.75);font-family:Roboto;"><?php echo substr($image->s_title, 0, 100); ?>
            </div>

            <!-- LAYER NR. 4 -->
            <div class="tp-caption   tp-resizeme tp-svg-layer" id="slide-<?php echo $key; ?>-layer-4" data-x="['left','left','left','left']" data-hoffset="['721','620','510','367']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['29','29','9','16']" data-width="50" data-height="50" data-whitespace="nowrap" data-visibility="['on','on','off','off']" data-type="svg" data-actions='[{"event":"click","action":"togglefullscreen","delay":""}]' data-svg_src="<?php echo base_url($image->s_img_path); ?>" data-svg_idle="sc:transparent;sw:0;sda:0;sdo:0;" data-svg_hover="sc:transparent;sw:0;sda:0;sdo:0;" data-basealign="slide" data-responsive_offset="on" data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"150","ease":"Power2.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; min-width: 50px; max-width: 50px; max-width: 50px; max-width: 50px; color: rgba(255,255,255,0.50);cursor:pointer;">
              <div class="rs-untoggled-content"> </div>
              <div class="rs-toggled-content"></div>
            </div>
          </li>
      <?php endforeach;
      endif; ?>
    </ul>
    <div class="tp-bannertimer" style="height: 8px; background: rgba(255,255,255,0.25);"></div>
  </div>
</div><!-- END REVOLUTION SLIDER -->

<script type="text/javascript">
  var tpj = jQuery;
  var revapi18;
  tpj(document).ready(function() {
    if (tpj("#rev_slider_18_1").revolution == undefined) {
      revslider_showDoubleJqueryError("#rev_slider_18_1");
    } else {
      revapi18 = tpj("#rev_slider_18_1").show().revolution({
        sliderType: "carousel",
        jsFileLocation: "<?php echo base_url('frontsite/revolution/'); ?>revolution/js/",
        sliderLayout: "auto",
        autoHeight: 'on',
        dottedOverlay: "none",
        delay: 9000,
        // gridheight: 500,
        /* Lazy Load options are "all", "smart", "single" and "none" */
        lazyType: "smart",
        navigation: {
          arrows: {
            enable: true,
            style: 'hesperiden',
            hide_onleave: false
          },
          bullets: {
            enable: false,
            style: "hesperiden",
            hide_onleave: true,
            h_align: "center",
            v_align: "bottom",
            h_offset: 0,
            v_offset: 20,
            space: 5
          },
          keyboardNavigation: "on",
          keyboard_direction: "horizontal",
          mouseScrollNavigation: "off",
          mouseScrollReverse: "default",
          onHoverStop: "on",
          thumbnails: {
            style: "gyges",
            enable: false,
            width: 50,
            height: 50,
            min_width: 50,
            wrapper_padding: 5,
            wrapper_color: "transparent",
            tmp: '<span class="tp-thumb-img-wrap">  <span class="tp-thumb-image"></span></span>',
            visibleAmount: 5,
            hide_onmobile: false,
            hide_over: 1240,
            hide_onleave: false,
            direction: "vertical",
            span: false,
            position: "inner",
            space: 5,
            h_align: "center",
            v_align: "top",
            h_offset: 0,
            v_offset: 20
          },
          tabs: {
            style: "gyges",
            enable: false,
            width: 220,
            height: 80,
            min_width: 220,
            wrapper_padding: 0,
            wrapper_color: "transparent",
            tmp: '<div class="tp-tab-content">  <span class="tp-tab-date">{{param1}}</span>  <span class="tp-tab-title">{{title}}</span></div><div class="tp-tab-image"></div>',
            visibleAmount: 6,
            hide_onmobile: true,
            hide_under: 900,
            hide_onleave: true,
            hide_delay: 200,
            direction: "vertical",
            span: true,
            position: "inner",
            space: 0,
            h_align: "left",
            v_align: "center",
            h_offset: 0,
            v_offset: 0
          }
        },
        carousel: {
          horizontal_align: "center",
          vertical_align: "center",
          fadeout: "off",
          maxVisibleItems: 5,
          infinity: "on",
          space: 0,
          stretch: "on",
          showLayersAllTime: "off",
          easing: "Power3.easeInOut",
          speed: "800"
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [800, 700, 400, 300],
        gridheight: [600, 400, 300, 200],
        lazyType: "single",
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        }
      });
    }
  }); /*ready*/
</script>

<!-- </section> -->

<script type="text/javascript" src="<?php echo base_url('frontsite/revolution/'); ?>assets/warning.js"></script>