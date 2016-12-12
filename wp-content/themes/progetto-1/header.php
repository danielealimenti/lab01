<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Progetto_1
 */

?><!DOCTYPE html>

<!-- NELL'HEADER APRO HTML E BODY -->

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!--  il metodo bloginfo('template-directory') mi restituite la root del tema specifico. Un metodo più professionale è lavorare sul function.php, funzione tema_scripts()-->
<link rel="stylesheet" href="<?php bloginfo( 'template-directory' ); ?>/assets/css/master.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
