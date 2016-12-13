<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

	<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="page-default" class="section-wrapper">
			<div class="container">
				<article class="page-content">
					<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile; // End of the loop.
					?>
				</article>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
