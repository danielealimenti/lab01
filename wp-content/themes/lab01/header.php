<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lab01
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:200i,300,400,500,600,600i,800,800i" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="top_menu">
	<div class="logo">
		<a href="<?php echo site_url(); ?>" class="LogoLink" ></a>
	</div>
	<?php
	$args = array(
			'menu' => "HeaderMenu",
			'container' => "",
			'menu_class' => "nav"
	);
	wp_nav_menu($args);
	?>
</div>
