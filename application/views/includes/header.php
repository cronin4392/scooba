<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Scooba Steve Productions</title>
  <meta name="description" content="Scooba Steve Productions :: Portfolio of Stephen Cronin">
  
  <meta name="keywords" content="Scoobasteve, Scubasteve, scooba, steve, scuba, Stephen, Cronin, Stephen Cronin, Boston, web developer, web designer, HTML, CSS, PHP" /> 
  
  <meta name="author" content="Stephen Cronin">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="<?php echo base_url() . 'favicon.ico'; ?>" />
  
  <!-- CSS: implied media=all -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/reset.css'; ?>" media="all">
  
  <!-- <link rel="stylesheet/less" href="<?php echo base_url() . 'assets/less/bootstrap.less'; ?>" media="all" /> -->
  
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/html5.css'; ?>">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/grid_4.css'; ?>" media="all">
  <!-- GOOGLE FONTS -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
  
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>" type="text/css" />
    <!-- end CSS-->
  
  <!-- <script src="<?php echo base_url() . 'assets/js/less-1.1.3.min.js'; ?>"></script> -->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
<script src="<?php echo base_url(); ?>assets/js/libs/modernizr-2.0.6.min.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11574584-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
//<![CDATA[
base_url = '<?= base_url();?>';
//]]>
</script>

</head>

<body id="index" class="home">
