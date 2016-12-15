<?php
/**
 * Template name: Mídias
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// Get ACF Fields
$text_01 = get_field('block-text-01');
$img_01 = get_field('block-img-01');
$text_02 = get_field('block-text-02');
$img_02 = get_field('block-img-02');
$text_03 = get_field('block-text-03');
$img_03 = get_field('block-img-03');
$text_04 = get_field('block-text-04');
$img_04 = get_field('block-img-04');

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 10%">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="midia" class="section-wrapper">
			<article class="midia-info">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			</article>
			
			<article class="midias-wrapper">
				
				<div class="midia-container">
					<div class="midia-content">
						<div class="content-position">
							<?php echo $text_01; ?>
						</div>
					</div>
					<div class="midia-img">
						<img src="<?php echo $img_01['url']; ?>" alt="<?php echo $img_01['alt']; ?>">
					</div>
				</div>
				
				<div class="midia-container">
					<div class="midia-content">
						<div class="content-position">
							<?php echo $text_02; ?>
						</div>
					</div>
					<div class="midia-img">
						<img src="<?php echo $img_02['url']; ?>" alt="<?php echo $img_02['alt']; ?>">
					</div>
				</div>
				
				<div class="midia-container">
					<div class="midia-img">
						<img src="<?php echo $img_03['url']; ?>" alt="<?php echo $img_03['alt']; ?>">
					</div>
					<div class="midia-content">
						<div class="content-position">
							<?php echo $text_03; ?>
						</div>
					</div>
				</div>
				
				<div class="midia-container">
					<div class="midia-img">
						<img src="<?php echo $img_04['url']; ?>" alt="<?php echo $img_04['alt']; ?>">
					</div>
					<div class="midia-content">
						<div class="content-position">
							<?php echo $text_04; ?>
						</div>
					</div>
				</div>
				
			</article>
			
		</section>
	</main><!-- #main -->

<?php
get_footer();
