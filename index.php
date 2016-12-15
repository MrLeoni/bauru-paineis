<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bauru_Painéis
 */

get_header(); ?>
  
  <section class="banner-text" style="background: url(wp-content/themes/bauru-paineis/assets/img/background/home-banner.jpg) no-repeat center 10%">
    <div class="container">
      <h1>Quem não é visto não é lembrado</h1>
      <a class="btn btn-white bg-red" href="#" title="Conheça nossa empresa">Conheça nossa empresa</a>
    </div>
  </section>
	
  <main id="main" class="site-main" role="main">
      <?php get_template_part( 'template-parts/content', 'blog' ); ?>
  </main><!-- #main -->

<?php
get_footer();
