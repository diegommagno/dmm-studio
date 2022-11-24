<?php
/**
 * instive-insurance.php
 *
 * Template Name: Insurance
 * Template Post Type: instive-insurance
 */



get_header();
get_template_part( 'template-parts/banner/content', 'banner-insurance' );
$instive_blog_sidebar = 1;
$instive_column = 'col-md-12'
?>

<section id="main-content" class="insurance-main" role="main">
        <?php while ( have_posts() ) : the_post();

            get_template_part('template-parts/blog/contents/content', 'insurance');

        endwhile; ?>
</section><!-- #main-content -->
<?php get_footer(); ?>
