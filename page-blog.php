<?php
/**
 * Template name: Blog
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

// Get ACF Field and use as parameter to query post
$post_type = get_field('post-type');

// Creating a post query
$post_query = new WP_Query(array( "post_type" => "$post_type" ));

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center top">
		<!-- empty -->
	</section>

  <main id="main" class="site-main" role="main">
    <section id="blog" class="section-wrapper">
      <div class="container">
        <div class="blog-title">
          <h1><?php echo get_the_title(); ?></h1>
        </div>
        <div class="blog-gallery">
          <?php
          while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
            <a href="<?php the_post_thumbnail_url('full'); ?>">
              <?php the_post_thumbnail('medium'); ?>
            </a>
          <?php
          endwhile; // End of the loop.
          ?>
        </div>
        <div class="blog-text">
          <?php
          while ( have_posts() ) : the_post();
            the_content();
          endwhile; // End of the loop.
          ?>
        </div>
      </div>
    </section>
  </main><!-- #main -->

<?php
get_footer();
