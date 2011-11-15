<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Scooba Steve Productions</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/reset.css'; ?>" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/grid_4.css'; ?>" media="all">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>" type="text/css" />



<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>

	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
</head>

<body id="index" class="home">
<div class="container container_4">
<header class="grid_4">
	<nav class="grid_1 alpha">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="mailto:<?php echo $settings['email']; ?>">Contact</a></li>
		</ul>
	</nav>
	<h1 class="grid_2"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/images/' . $settings['logo_path']; ?>" alt="<?php print $settings['site_name']; ?>" /></a></h1>
	<nav class="grid_1 omega">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="mailto:<?php echo $settings['email']; ?>">Contact</a></li>
		</ul>
	</nav>
</header>