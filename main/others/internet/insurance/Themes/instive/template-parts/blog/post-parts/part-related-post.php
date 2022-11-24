<?php

$blog_related_post = instive_option('blog_related_post', false);
$blog_related_post_number = instive_option('blog_related_post_number', 3);

?>
<?php if($blog_related_post == true): ?>
    <div class="related-post-area">
        <h3 class="related-title"><?php echo esc_html__("Related Posts", 'instive') ?></h3>
        <div class="row">
			<?php
			$related_post = instive_related_posts_by_tags($post->ID, $blog_related_post_number);

			if($related_post->have_posts()) {
				while($related_post->have_posts()) : $related_post->the_post(); ?>

                    <div class="recent-project-wrapper col-lg-4">
                        <div class="recent-project-img">

                            <img class="img-responsive" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                 alt=" <?php the_title_attribute(); ?> ">
                        </div>
                        <!-- end recent-project-img -->
                        <div class="recent-project-info">
                            <h3 class="ts-title"><a
                                        href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), '6')); ?></a>
                            </h3>
                            <div class="post-meta">
                                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                            </div>
                        </div>
                        <!-- end recent-project-info -->
                    </div>

				<?php
				endwhile;
			}
			wp_reset_postdata();

			?>
        </div>
    </div>
<?php endif; ?>
