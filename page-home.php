<?php
/**
 * Template name: Home
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// ACF Fields
// Banner
$banner_text = get_field('home-banner-text');
$banner_link_check = get_field('home-banner-link-check');
$banner_link_text = get_field('home-banner-link-text');
$banner_link_url = get_field('home-banner-link-url');
$banner_link_target = get_field('home-banner-link-target');

get_header(); ?>

  <section class="banner-text" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center 10%">
    <div class="container">
      <h1><?php echo $banner_text; ?></h1>
      <a class="btn btn-white bg-red" href="<?php echo $banner_link_url; ?>" target="<?php echo $banner_link_target ?>" title="<?php echo $banner_link_text; ?>"><?php echo $banner_link_text; ?></a>
    </div>
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
