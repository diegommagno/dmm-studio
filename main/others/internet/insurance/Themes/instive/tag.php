<?php
/**
 * the template for displaying archive pages.
 */

get_header(); 
get_template_part( 'template-parts/banner/content', 'banner-blog' );


$instive_blog_sidebar = instive_option('blog_sidebar',3); 

$instive_column = ($instive_blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-8 mx-auto' : 'col-lg-8 col-md-12';
?>

<section id="main-content" class="blog main-container" role="main">
	<div class="container">
		<div class="row">
      <?php if($instive_blog_sidebar == 2){
				get_sidebar();
			}  ?>
			<div class="<?php echo esc_attr($instive_column);?>">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog/contents/content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php get_template_part( 'template-parts/blog/paginations/pagination', 'style1' ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/blog/contents/content', 'none' ); ?>
				<?php endif; ?>
			</div><!-- .col-md-8 -->

		   <?php if($instive_blog_sidebar == 3){
				get_sidebar();
			}  ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #main-content -->
<?php get_footer(); ?>