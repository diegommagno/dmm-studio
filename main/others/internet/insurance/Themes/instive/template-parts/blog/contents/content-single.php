<?php if(has_post_thumbnail() && !post_password_required()) : ?>

    <div class="post-media post-image">
        <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt=" <?php the_title_attribute(); ?>">
    </div>

<?php endif; ?>
<div class="post-body clearfix">

    <!-- Article header -->
    <header class="entry-header clearfix">
		<?php $blog_meta_post = instive_option('blog_meta_post', true);
		if($blog_meta_post == true) {
			instive_post_meta();
		}
		?>
        <h1 class="entry-title">
			<?php the_title(); ?>
        </h1>

    </header><!-- header end -->

    <!-- Article content -->
    <div class="entry-content clearfix">
		<?php
		if(is_search()) {
			the_excerpt();
		} else {
			the_content(esc_html__('Continue reading &rarr;', 'instive'));
			instive_link_pages();
		}
		?>
        <div class="post-footer clearfix">
			<?php get_template_part('template-parts/blog/post-parts/part', 'tags'); ?>
        </div> <!-- .entry-footer -->

		<?php
		if(is_user_logged_in() && is_single()) {
			?>

            <p style="float:left;margin-top:20px;">
				<?php
				edit_post_link(
					esc_html__('Edit', 'instive'),
					'<span class="meta-edit">',
					'</span>'
				);
				?>

            </p>
			<?php
		}
		?>
    </div> <!-- end entry-content -->
</div> <!-- end post-body -->
