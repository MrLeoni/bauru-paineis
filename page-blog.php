<?php
/**
 * Template name: Blog
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center top">
		<!-- empty -->
	</section>

  <main id="main" class="site-main" role="main">
    <?php get_template_part( 'template-parts/content', 'blog' ); ?>
  </main><!-- #main -->

<?php
get_footer();
