<?php
/**
 * Template name: Contato
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
		<section id="contact" class="section-wrapper">
			<article class="contact">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			</article>
			<article class="map-contact">
				<iframe src="https://www.google.com/maps/embed/v1/place?q=Rua%20Agenor%20Meira%2C%201-80&zoom=15&key=AIzaSyA5_b0MGmI8qCt0kz3hFAQn3LBYZYbkodY" allowfullscreen></iframe>
			</article>
		</section>
	</main><!-- #main -->

<?php
get_footer();
