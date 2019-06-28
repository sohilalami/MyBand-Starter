<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?></title>
	<meta name="author" content="Sohil Alami MD1A">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body>
<header class="header" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/banner.jpg')">
	<div class="container">
		<nav>
			<?php $arguments = array('helden' => 'hoofd'); ?>
			<?php wp_nav_menu($arguments); ?>
		</nav>
		<a href="<?php echo home_url(); ?>"><h1><?php bloginfo('name'); ?></h1></a>
		<p><?php bloginfo('description'); ?></p>
	</div>
</header>
