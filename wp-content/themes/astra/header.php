<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
} 
?>
<?php wp_head(); ?>
<style>
.stickyAdTopWrapper{position:fixed;top:0;left:50%;width:auto;transform:translate(-50%);z-index:1000;justify-content:center;background-color:transparent;min-height:50px;display:flex;flex-direction:column;justify-content:flex-start;align-items:center;width:100%}
.adBoxTop{max-width:500px}
.adBoxBottom{max-width:500px}
.stickyAdBottomWrapper{position:fixed;bottom:0;left:50%;width:auto;transform:translate(-50%);display:flex;align-items:center;justify-content:center;z-index:1000;background-color:transparent;min-height:50px}
#closeStickyTop{position:absolute;width:fit-content;background-color:#39b7ff;color:#fff;font-size:14px;padding:2px 8px;border-radius:0 0 5px 5px;z-index:1000000}
#closeStickyBottom{position:absolute;width:fit-content;top:-23px;right:0;background-color:#39b7ff;color:#fff;font-size:14px;padding:2px 8px;border-radius:5px 5px 0 0;z-index:1000000}
.stickyCloseBtn{cursor:text}
</style>

	<?php include 'links/header.php'; ?>
<?php astra_head_bottom(); ?>

</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
			
		<?php astra_content_top(); ?>
