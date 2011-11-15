<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Scooba Steve Productions</title>

<link rel="shortcut icon" href="<?php echo base_url() . 'favicon.ico'; ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/reset.css'; ?>" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/grid_4.css'; ?>" media="all">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>" type="text/css" />

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
	<h1 class="alpha grid_1"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/images/' . $settings['logo_path']; ?>" alt="<?php print $settings['site_name']; ?>" /></a></h1>
	<div class="grid_1 prefix_1">
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