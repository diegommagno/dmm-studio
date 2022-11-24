<?php
 $banner_settings  = instive_option('page_banner_setting'); 
 $page_show_banner = isset($banner_settings['page_show_banner'])?$banner_settings['page_show_banner']:'no';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="entry-thumbnail post-media post-image">
			<?php 
			  the_post_thumbnail( 'full' );
			?>
		</div>
	<?php endif; ?>
	<div class="post-body clearfix">
	    <?php if($page_show_banner=='no'): ?>
			<header class="entry-header clearfix">
			
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
		
			</header><!-- header end -->
        <?php endif; ?>
		<!-- Article content -->
		<div class="entry-content clearfix">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading &rarr;', 'instive' ) );

				instive_link_pages();
			}
			?>
		</div> <!-- end entry-content -->
    </div> <!-- end post-body -->
</article>