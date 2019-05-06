<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php fhb_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />

	<meta name="description" content="<?php the_field('seo_description', 'option'); ?>" />
	<meta name="keywords" content="<?php the_field('seo_keywords', 'option'); ?>" />
	<meta property="og:title" content="<?php fhb_title(); ?>" />
	<meta property="og:description" content="<?php the_field('seo_description', 'option'); ?>" />
	<meta property="og:site_name" content="<?php echo home_url(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo get_template_directory_uri()?>/img/screenshot.jpg" />
	<meta property="og:image:alt" content="<?php fhb_title() ?>" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/uikit.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/style.css" />

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri()?>/lib/uikit/js/uikit.min.js"></script>
	<script src="<?php echo get_template_directory_uri()?>/lib/uikit/js/uikit-icons.min.js"></script>

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00474e">
	<meta name="theme-color" content="#559fac">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part('templates/nav-top'); ?>
