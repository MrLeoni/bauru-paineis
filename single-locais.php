<?php
/**
 * Template file for display 'Locais' post type
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

$post_cat = get_the_terms( $post->ID, 'locais-categorias');
$cat_slug = $post_cat[0]->slug;

$post_query_args = array(
  'post_type' => 'locais',
  'tax_query' => array(array(
    'taxonomy'  => 'locais-categorias',
    'field' => 'slug',
    'terms'  => "$cat_slug"
  )),
);

$post_query = new WP_Query( $post_query_args );

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="local" class="section-wrapper">
			<article class="single-local">
			  
        <div class="container">
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php
            while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
              <h2 class="other-locals"><a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php endwhile; // End of the loop.
            ?>
          </div>
          <div class="col-md-offset-1 col-md-8">
            <?php
            while ( have_posts() ) : the_post();
            
              // Get ACF Fields
              $img_01 = get_field('local-img-01');
              $img_02 = get_field('local-img-02');
              $img_03 = get_field('local-img-03');
            
              the_title('<h1>', '</h1>'); ?>
              
              <div class="local-slider-wrapper">
                <ul class="local-slider">
                  <li><a href="<?php echo $img_01['url']; ?>"><img src="<?php echo $img_01['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                  <li><a href="<?php echo $img_02['url']; ?>"><img src="<?php echo $img_02['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                  <li><a href="<?php echo $img_03['url']; ?>"><img src="<?php echo $img_03['url']; ?>" alt="<?php echo $img_01['alt']; ?>"></a></li>
                </ul>
              </div>
              <div class="local-content">
                <?php the_content(); ?>
              </div>
            <?php endwhile; // End of the loop. ?>  
          </div>
        </div>
				
				
				
			</article>
		</section>
	</main><!-- #main -->

<?php
get_footer();
