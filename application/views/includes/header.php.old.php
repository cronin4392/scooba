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
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="<?php echo base_url() . 'favicon.ico'; ?>" />

  <!-- CSS: implied media=all -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/reset.css'; ?>" media="all">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/grid_4.css'; ?>" media="all">
  <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>" type="text/css" />
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="<?php echo base_url() . 'css/html5.css'; ?>">
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<!-- MEEEEEE -->


<!-- JQUERY PLUGIN -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/custom-theme/jquery-ui-1.8.16.custom.css'; ?>" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-animate-css-rotate-scale.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.quicksand.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/myCode.js"></script>


<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

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

</head>

<body id="index" class="home">
<div class="container container_4">
<header class="grid_4">
	<h1 class="alpha grid_1"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/images/logo_5.gif';?>" alt="<?php print $settings['site_name']; ?>" /></a></h1>
	<div class="grid_1 suffix_1">
		<h1><?php echo $settings['name']; ?></h1>
		<h2><?php echo $settings['tagline']; ?></h2>
		Northeast, U.S.A.
	</div>
	<nav class="grid_1 omega">
		<ul>
			<li><a href="<?php echo base_url() . 'index.php' ?>">Home</a></li>
			<li><a href="<?php echo base_url() . 'assets/files/SCronin_Resume.pdf' ?>">Resume</a></li>
			<li><a href="mailto:<?php echo $settings['email']; ?>">Contact</a></li>
		</ul>
	</nav>
</header>