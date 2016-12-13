<?php
/**
 * Template name: Mídias
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 10%">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
