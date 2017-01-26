<?php
/**
 * Template name: Locais
 *
 * @package Bauru_Painéis
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);



/**============================================================================
 * 
 * On this page we'll make a loop trough the categories of "Locais" post type.
 * Inside of the "categorie's loop" we'll make a 'while loop' to display only 
 * the posts related with the category (category that is going trough the
 * "categorie's loop");
 * 
 =============================================================================*/
 
 

// Get all taxonomy terms inside the 'locais-categorias'
$cats = get_terms(array('taxonomy' => 'locais-categorias'));
// The constant part of the arguments for the WP_Query
$locais_taxonomy = array(
  'taxonomy'  => 'locais-categorias',
  'field' => 'slug'
);

get_header(); ?>

  <section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
		<!-- empty -->
	</section>

	<main id="main" class="site-main" role="main">
		<section id="locals" class="section-wrapper">
			<article class="locals">
				
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
				
				<div class="container">
          <div class="locals-wrapper">
            <?php
              // Initiating the "categorie's loop"
              foreach($cats as $cat) {
              
              // Get the category slug
              $cat_slug = $cat->slug;
              $cat_ID = $cat->term_id;
              
              // Push the category slug in the '$locais_taxonomy' array
              $locais_taxonomy['terms'] = "$cat_slug";
              
              // Creating posts query arguments
              $locais_posts_args = array(
                'post_type' => 'locais',
                'tax_query' => array( $locais_taxonomy ),
              );
              // Creating the query with the arguments
              $locais_posts = new WP_Query( $locais_posts_args ); ?>
              
              <div class="locals-category">
                  
                <h2 id="category-<?php echo $cat_ID; ?>" class="js-expand" title="Clique para expandir"><?php echo $cat->name; ?> <span class="title-icon"><i class="fa fa-caret-down" aria-hidden="true"></i></span></h2>
                
                <section data-target="category-<?php echo $cat_ID; ?>" class="local-post-wrapper">
                  <?php
                  // Starting the 'while loop' to display the post that belong to
                  // this category
                  while($locais_posts->have_posts()): $locais_posts->the_post();
                  
                  // Using id to differentiate posts
                  $post_ID = get_the_ID();
                  ?>
                    <div class="local-post">
                      <button id="post-<?php echo $post_ID; ?>" title="Clique para expandir" class="local-post-trigger js-expand">
                        <h3><?php the_title(); ?> <span class="title-icon"><i class="fa fa-caret-down" aria-hidden="true"></i></span></h3>
                      </button>
                      <article class="local-post-content" data-target="post-<?php echo $post_ID; ?>">
                        <?php the_content(); ?>
                      </article>
                    </div>
                  <?php
                  // Ending 'while loop'
                  endwhile;
                  // Reset post data
                  wp_reset_postdata(); ?>
                </section>
              </div>
                
              <?php 
              } // Ending "categorie's loop"
            ?>
				</div>
				
			</article>
		</section>
	</main><!-- #main -->

<?php
get_footer();
