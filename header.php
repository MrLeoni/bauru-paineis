<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bauru_Painéis
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- favicon -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo/favicon_16.png" rel="icon" size="16x16">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo/favicon_32.png" rel="icon" size="32x32">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
	
