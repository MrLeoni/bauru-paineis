<?php
/**
 * Template name: Institucional
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// ACF Fields
// Aside image
$aside_img = get_field('aside-img');

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="about" class="section-wrapper">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 hidden-xs hidden-sm">
						<aside class="about-img">
							<img src="<?php echo $aside_img['url']; ?>" alt="<?php echo $aside_img['alt']; ?>">
						</aside>
					</div>
					<div class="col-xs-offset-1 col-xs-10 col-md-offset-1 col-md-7">
						<article class="about">
							<?php
							while ( have_posts() ) : the_post();
								the_content();
							endwhile; // End of the loop.
							?>
						</article>
					</div>
					
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
