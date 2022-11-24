<div class="post-media post-image">
	<?php if(has_post_thumbnail()): ?>
    <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
             alt=" <?php the_title_attribute(); ?>">
    </a>
	<?php
	if(is_sticky()) {
		echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__('Sticky', 'instive') . ' </sup>';
	}
	?>
</div>
<?php endif; ?>

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
	<?php
	if(is_sticky() && !has_post_thumbnail()) {
		echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__('Sticky', 'instive') . ' </sup>';
	}

	?>
    <div class="post-content">
        <div class="entry-content">
            <p>
				<?php instive_excerpt(40, null); ?>
            </p>
        </div>
		<?php
		if(!is_single()):

			printf('<div class="post-footer readmore-btn-area"><a class="btn btn-primary" href="%1$s"> %2$s  <i class="tsicon tsicon-arrow-right"></i></a></div>',
				get_the_permalink(),
				esc_html__('Learn more', 'instive')
			);
		endif;
		?>
    </div>

</div>
<!-- post-body end-->