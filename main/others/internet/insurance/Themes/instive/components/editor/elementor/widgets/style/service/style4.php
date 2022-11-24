    
    <div class="col-md-6 instive-grid-item">
        <div class="ts-feature-box style2 ">
            <h3 class="ts-title md">
                <a href="<?php the_permalink(); ?>"> <?php echo esc_html(wp_trim_words(get_the_title(), $settings['post_title_crop'],'')); ?> </a>
            </h3>
            <div class="media service-thumb-bg">
                <?php if( $feature_icon_show == 'yes'): ?>
                <div class="feature-icon d-flex post-thumb">
                    <a href="<?php the_permalink(); ?>">
                    <span class="blog-bg-img" style="background-image: url(<?php echo esc_url(the_post_thumbnail_url()) ?>);"></span>
                    </a>
                    <?php //the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
                <div class="media-body">
                <p>
                    <?php
                        echo esc_html(wp_trim_words(get_the_excerpt(),$settings['post_content_crop'],''));
                    ?>
                </p>
                <?php if($settings['readmore']): ?>
                    <a href="<?php the_permalink(); ?>" class="btn-link readmore"> <?php echo esc_html($settings['post_readmore_text']); ?> </a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>