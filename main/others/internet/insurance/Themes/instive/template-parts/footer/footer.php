<div class="copy-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 align-self-center">
                <div class="copyright-text">
					<?php
					$copyright_text = instive_option('footer_copyright', 'Copyright &copy; 2019 Instive. All Right Reserved.');
					echo instive_kses($copyright_text);
					?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <div class="copyright-logo text-center">
                    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <img class="img-fluid" src="<?php
						echo esc_url(
							instive_src(
								'general_light_logo',
								INSTIVE_IMG . '/logo/logo-light.png'
							)
						);
						?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
				<?php if(class_exists('CSF')) : ?>
                <div class="footer-social">
                    <ul>
						<?php
						$social_links = instive_option('footer_social_links', []);
						foreach($social_links as $sl):
							$class = 'ts-' . str_replace('fa fa-', '', $sl['icon_class']);
							?>
                            <li class="<?php echo esc_attr($class); ?>">
                                <a href="<?php echo esc_url($sl['url']); ?>">
                                    <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i>
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
					<?php endif; ?>
                </div>
                <!--Footer Social End-->
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end footer -->