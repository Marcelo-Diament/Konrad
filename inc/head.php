<?php
require('./inc/functions.php');
include('./wp/wp-load.php');
define('WP_USE_THEMES', false);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

<script src="<?php local() ?>js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery.easing.1.3.js" type="text/javascript"></script>

<script src="<?php local() ?>js/jquery.maskedinput.min.js" type="text/javascript"></script>
<!-- <script src="<?php local() ?>js/jquery.mousewheel.js" type="text/javascript"></script> -->
<script src="<?php local() ?>js/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery.watermark.min.js" type="text/javascript"></script>

<script src="<?php local() ?>js/jquery.carouFredSel-6.1.0-packed.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/jquery.cycle2.center.min.js" type="text/javascript"></script>
<script src="<?php local() ?>js/masonry.js" type="text/javascript"></script>
<!-- <script src="<?php local() ?>js/jScrollPane.js" type="text/javascript"></script> -->

<link href="<?php local() ?>css/grid.css" rel="stylesheet" type="text/css"/>
<link href="<?php local() ?>css/estilo.css?v=465105413534123423423434123123651" rel="stylesheet" type="text/css"/>


<script src="<?php local() ?>js/script.js" type="text/javascript"></script>

<link href="<?php local() ?>css/mobile.css?v=132132123423423432" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" type="image/x-icon" href="<?php local() ?>favicons/konrad_64x64.ico" />


<!--[if lt IE 9]>
<script src="<?php local() ?>js/html5.js"></script>
<![endif]-->

<!--[if (lt IE 9) & (!IEMobile)]>
<link rel="stylesheet" href="<?php local() ?>css/ie.css" />
<![endif]-->

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30102253-1', 'auto');
  ga('send', 'pageview');

</script>