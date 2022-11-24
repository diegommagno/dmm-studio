<div class="post-media post-video">
	<?php if(has_post_thumbnail()): ?>
        <img class="img-fluid" alt="<?php the_title_attribute(); ?>"
             src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
		<?php
		if(is_sticky()) {
			echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__('Sticky', 'instive') . ' </sup>';
		}
		?>

		<?php
		if(class_exists('CSF') && instive_meta_option(get_the_ID(), 'featured_video') != ''): ?>
            <div class="video-link-btn">
                <a href="<?php echo esc_url(instive_meta_option(get_the_ID(), 'featured_video')); ?>"
                   class="play-btn popup-btn"><i class="tsicon tsicon-play"></i></a>
            </div>

		<?php endif; ?>

	<?php endif; ?>
</div>
<div class="post-body clearfix">
    <div class="entry-header">

		<?php $blog_meta_post = instive_option('blog_meta_post', true);
		if($blog_meta_post == true) {
			instive_post_meta();
		}
		?>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

    </div>


    <div class="post-content">
        <div class="entry-content">
            <p>
				<?php instive_excerpt(40, null); ?>
            </p>
        </div>
		<?php
		if(!is_single()):

			printf('<div class="post-footer readmore-btn-area"><a class="btn btn-primary" href="%1$s"> %2$s  <i class="tsicon tsicon-arrow-right"></i> </a></div>',
				get_the_permalink(),
				esc_html__('Learn more', 'instive')
			);

		endif;
		?>
    </div>
    <!-- Post content right-->

</div>
<!-- post-body end-->