<?php
/**
 * Template name: Resp. Social e Amb.
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// Get ACF Fields
$text_01 = get_field('resp-text-01');
$img_01 = get_field('resp-img-01');
$text_02 = get_field('resp-text-02');
$img_02 = get_field('resp-img-02');
$text_03 = get_field('resp-text-03');
$img_03 = get_field('resp-img-03');
$text_04 = get_field('resp-text-04');
$img_04 = get_field('resp-img-04');

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 10%">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="responsability" class="section-wrapper even">
			
			<article class="content-container">
				<div class="content-box">
					<img class="hidden-xs hidden-sm" src="<?php echo $img_01['url']; ?>" alt="<?php echo $img_01['alt']; ?>">
				</div>
				<div class="content-box">
					<?php echo $text_01; ?>
				</div>
			</article>
			
			<article class="content-container">
				<div class="content-box">
					<?php echo $text_02; ?>
				</div>
				<div class="content-box">
					<img class="hidden-xs hidden-sm" src="<?php echo $img_02['url']; ?>" alt="<?php echo $img_02['alt']; ?>">
				</div>
			</article>
			
			<article class="content-container">
				<div class="content-box">
					<img class="hidden-xs hidden-sm" src="<?php echo $img_03['url']; ?>" alt="<?php echo $img_03['alt']; ?>">
				</div>
				<div class="content-box">
					<?php echo $text_03; ?>
				</div>
			</article>
			
			<article class="content-container">
				<div class="content-box">
					<?php echo $text_04; ?>
				</div>
				<div class="content-box">
					<img class="hidden-xs hidden-sm" src="<?php echo $img_04['url']; ?>" alt="<?php echo $img_04['alt']; ?>">
				</div>
			</article>
			
		</section>
	</main><!-- #main -->

<?php
get_footer();
