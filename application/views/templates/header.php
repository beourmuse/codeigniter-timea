<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $Page_Title; ?></title>
	<meta name="description" content="<?php echo $Page_Meta; ?>">
</head>
<body>

<nav>
	<ul>
		<li><?php 
			// anchor function is from url helper
			// arg 1 is the controller to load
			// arg 2 is the click text
			echo anchor('home', 'Home'); ?></li>
		<li><?php echo anchor('about', 'About'); ?></li>
		<li><?php echo anchor('registration', 'Registration'); ?></li>
	</ul>
</nav>