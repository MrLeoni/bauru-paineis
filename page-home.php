<?php
/**
 * Template name: Home
 *
 * @package Bauru_Painéis
 */
 
// ACF Fields
// Resume
$resume_bg_01 = get_field('block-img-01');
$resume_text_01 = get_field('block-text-01');
$resume_bg_02 = get_field('block-img-02');
$resume_text_02 = get_field('block-text-02');
$resume_bg_03 = get_field('block-img-03');
$resume_text_03 = get_field('block-text-03');

// Midia and Local
$home_local_text = get_field('home-local-text');
$home_local_img = get_field('home-local-img');
$home_midia_text = get_field('home-midia-text');
$home_midia_img = get_field('home-midia-img');

// Parallax
$parallax_text = get_field('parallax-text');
$parallax_img = get_field('parallax-img');

/**=====================================================
 * 
 * Clients post query
 * 
 *=====================================================*/
 
$clients_args = array(

  'post_type' => 'clientes',
  'tax_query' => array(array(
    'taxonomy' => 'cliente-categorias',
    'field' => 'slug',
    'terms' => 'exibir-na-home'
  ))
  
);
$clients_query = new WP_Query( $clients_args );

get_header(); ?>

  <?php get_template_part( 'template-parts/content', 'banner' ); ?>
  
  <?php // get_template_part( 'template-parts/content', 'locals' ); ?>

  <main id="main" class="site-main" role="main">
    <article id="home">
      
      <section id="home-content" class="section-wrapper">
        <?php
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; // End of the loop.
        ?>
      </section>
      
      <section id="home-resume" class="resume-wrapper">
        <div class="banner-resume" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo $resume_bg_01['url']; ?>) no-repeat center">
          <div class="text-resume">
            <?php echo $resume_text_01; ?>
          </div>
        </div>
        <div class="banner-resume" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo $resume_bg_02['url']; ?>) no-repeat center">
          <div class="text-resume">
            <?php echo $resume_text_02; ?>
          </div>
        </div>
        <div class="banner-resume" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo $resume_bg_03['url']; ?>) no-repeat center">
          <div class="text-resume">
            <?php echo $resume_text_03; ?>
          </div>
        </div>
      </section>
      
      <section id="home-locals" class="section-wrapper">
  			<article class="locals">
          <?php get_template_part( 'template-parts/content', 'locals' ); ?>
          <div class="blog-link">
            <a class="btn btn-red" href="<?php echo esc_html(home_url('/locais')); ?>" title="Ver todos">Ver Todos</a>
          </div>
        </article>
      </section>
      
      <section id="home-midia-local" class="section-wrapper">
        <div class="midias-wrapper">
        
          <div class="midia-container">
            <div class="midia-content">
              <div class="content-position">
                <?php echo $home_local_text; ?>
              </div>
            </div>
            <div class="midia-img">
              <img src="<?php echo $home_local_img['url']; ?>" alt="<?php echo $home_local_img['alt']; ?>">
            </div>
          </div>
          
          <div class="midia-container">
            <div class="midia-img">
              <img src="<?php echo $home_midia_img['url']; ?>" alt="<?php echo $home_midia_img['alt']; ?>">
            </div>
            <div class="midia-content">
              <div class="content-position">
                <?php echo $home_midia_text; ?>
              </div>
            </div>
          </div>
        
        </div>
      </section>
      
      <section id="home-parallax" class="banner-text parallax" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(<?php echo $parallax_img; ?>) no-repeat center">
        <h3><?php echo $parallax_text; ?></h3>
      </section>
      
      <section id="home-clients" class="section-wrapper">
        <h2>Clientes</h2>
        <div class="container">
          <div class="row">
            <div class="col-md-offset-1 col-md-10">
              <div class="clients-wrapper">
                <ul class="clients-slider">
                  <?php
                  while ( $clients_query->have_posts() ) : $clients_query->the_post(); ?>
                    
                    <li><?php the_post_thumbnail('medium'); ?></li>
                    
                  <?php endwhile; // End of the loop.
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </article>
  </main><!-- #main -->

<?php
get_footer();
