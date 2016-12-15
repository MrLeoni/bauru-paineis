<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bauru_Painéis
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<section class="error-404 not-found section-wrapper">
		
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( '404', 'bauru-paineis' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e( 'A página que você está procurando não existe.', 'bauru-paineis' ); ?></p>
		</div><!-- .page-content -->
		
	</section><!-- .error-404 -->
</main><!-- #main -->

<?php
get_footer();
