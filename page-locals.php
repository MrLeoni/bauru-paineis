<?php
/**
 * Template name: Locais
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

  <section class="banner narrow-banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="locals" class="section-wrapper">
			<article class="locals">
				
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				
				get_template_part( 'template-parts/content', 'locals' );
				
				?>
				
			</article>
		</section>
	</main><!-- #main -->

<?php
get_footer();
