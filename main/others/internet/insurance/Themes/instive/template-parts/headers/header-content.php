<?php
$default_class = 'header_default';
$header_search_icon = instive_option('header_nav_search_section', false);
?>

<header id="header"
        class="header header-wrapper <?php echo esc_attr($default_class); ?>  <?php if(!is_user_logged_in()) {
			echo esc_attr("pt-3 pb-3");
		} ?>">
    <div class="header-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- logo-->
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="img-fluid" src="<?php
					echo esc_url(
						instive_src(
							'general_main_logo',
							INSTIVE_IMG . '/logo/logo.png'
						)
					);
					?>" alt="<?php bloginfo('name'); ?>">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="tsicon tsicon-menu"></i></span>
                </button>

				<?php get_template_part('template-parts/navigations/nav', 'primary'); ?>
				<?php if(class_exists('CSF')): ?>
                    <div class="nav-search-area">
						<?php if($header_search_icon == true): ?>
                            <div class="nav-search">
                                    <span id="search">
                                       <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                            </div>
						<?php endif; ?>
                        <!--Search End-->
                        <div class="search-block" style="display: none;">
							<?php get_search_form(); ?>
                            <span class="search-close"><i class="fa fa-close"></i></span>
                        </div>
                    </div>
				<?php endif; ?>
            </nav>
        </div><!-- container end-->
    </div><!-- header wrapper end-->
</header>

