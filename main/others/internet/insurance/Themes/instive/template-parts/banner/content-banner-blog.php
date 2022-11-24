<?php

$default_banner_bg          = INSTIVE_IMG . '/banner/banner_bg.jpg';
$instive_banner_option      = instive_option( 'blog_banner_setting' );
$instive_banner_show        = isset( $instive_banner_option['blog_show_banner'] ) ? $instive_banner_option['blog_show_banner'] : true;
$instive_breadcrumb_show    = isset( $instive_banner_option['blog_show_breadcrumb'] ) ? $instive_banner_option['blog_show_breadcrumb'] : false;
$instive_page_title_disable = isset( $instive_banner_option['page_title_disable'] ) ? $instive_banner_option['page_title_disable'] : false;
$instive_page_title         = ! empty( $instive_banner_option['banner_blog_title'] ) ? $instive_banner_option['banner_blog_title'] : esc_html__( 'Instive Blog', 'instive' );
$instive_banner_image       = ! empty( $instive_banner_option['banner_blog_image']['url'] ) ? $instive_banner_option['banner_blog_image']['url'] : $default_banner_bg;

if ( $instive_banner_image != '' ) {
	$instive_banner_image = 'style="background-image:url(' . esc_url( $instive_banner_image ) . ');"';
}

?>

<?php if ( $instive_banner_show == true ): ?>

    <section
            class="banner-area <?php echo esc_attr( $instive_banner_image == '' ? 'banner-solid' : 'banner-bg' ); ?>" <?php echo instive_kses( $instive_banner_image ); ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="banner-heading text-center">
						<?php if ( $instive_page_title_disable == false ): ?>
                            <h1>
								<?php
								if ( is_archive() ) {
									the_archive_title();
								} else {
									echo esc_html( $instive_page_title );
								}
								?>
                            </h1>
						<?php endif; ?>
						<?php if ( $instive_breadcrumb_show == true ): ?>
							<?php instive_get_breadcrumbs( " " ); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>     



