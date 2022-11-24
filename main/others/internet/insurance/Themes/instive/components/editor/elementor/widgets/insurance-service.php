<?php

namespace Elementor;

if(!defined('ABSPATH')) {
	exit;
}


class Instive_Insurance_Widget extends Widget_Base {


	public $base;
	private $post_id = null;

	public function get_name() {
		return 'instive-insurance';
	}

	public function get_title() {

		return esc_html__('Instive Service', 'instive');

	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

	public function get_categories() {
		return ['instive-elements'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_tab',
			[
				'label' => esc_html__('Insurance settings', 'instive'),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__('Style', 'instive'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Style 1', 'instive'),
					'style2' => esc_html__('Style 2', 'instive'),
					'style3' => esc_html__('Style 3', 'instive'),
					'style4' => esc_html__('Style 4', 'instive'),

				],
			]
		);

		$this->add_control(
			'ajax_load_enable',
			[
				'label'     => esc_html__('Ajax load more button', 'instive'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__('Yes', 'instive'),
				'label_off' => esc_html__('No', 'instive'),
				'default'   => 'no',
				'condition' => ["style" => ['style4']],

			]
		);

		$this->add_control('category',
			[
				'label'     => esc_html__('Category', 'instive'),
				'type'      => \Elementor\Controls_Manager::SELECT2,
				'multiple'  => true,
				'options'   => $this->getCategories(),
				'condition' => ["style" => ['style3', 'style4']],

			]
		);

		$this->add_control('post_id',
			[
				'label'     => esc_html__('Post', 'instive'),
				'type'      => \Elementor\Controls_Manager::SELECT2,
				'multiple'  => false,
				'options'   => $this->getPosts(),
				'default'   => $this->post_id,
				'condition' => ["style" => ['style1', 'style2']],

			]
		);

		$this->add_control(
			'post_title_crop',
			[
				'label'   => esc_html__('Post Title Limit', 'instive'),
				'type'    => Controls_Manager::NUMBER,
				'default' => '35',

			]
		);

		$this->add_control(
			'post_content_crop',
			[
				'label'   => esc_html__('Post Content Limit', 'instive'),
				'type'    => Controls_Manager::NUMBER,
				'default' => '20',

			]
		);

		$this->add_control(
			'readmore',
			[
				'label'     => esc_html__('Read More', 'instive'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__('Yes', 'instive'),
				'label_off' => esc_html__('No', 'instive'),
				'default'   => 'yes',

			]
		);

		$this->add_control(
			'feature_icon_show',
			[
				'label'     => esc_html__('Show Feature Icon', 'instive'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__('Yes', 'instive'),
				'label_off' => esc_html__('No', 'instive'),
				'default'   => 'yes',

			]
		);
		$this->add_control(
			'feature_desc_show',
			[
				'label'     => esc_html__('Show Desc', 'instive'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__('Yes', 'instive'),
				'label_off' => esc_html__('No', 'instive'),
				'default'   => 'yes',

			]
		);

		$this->add_control(
			'post_readmore_text',
			[
				'label'     => esc_html__('Read More Text', 'instive'),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'read more',
				'condition' => ["readmore" => ['yes']],
			]
		);


		$this->add_control('count',
			[
				'label'     => esc_html__('Count', 'instive'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '4',
				'condition' => ["style" => ['style3', 'style4']],
			]
		);
		$this->add_control('item_count',
			[
				'label'     => esc_html__('Slider Count', 'instive'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '4',
				'condition' => ["style" => ['style3']],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__('Order', 'instive'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('Desc', 'instive'),
					'ASC'  => esc_html__('Asc', 'instive'),


				],
			]
		);

		$this->add_control(
			'offset_enable',
			[
				'label'     => esc_html__('Post skip', 'instive'),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__('Yes', 'instive'),
				'label_off' => esc_html__('No', 'instive'),
				'default'   => 'no',
				'condition' => [
					'style' => ['style3']
				],

			]
		);

		$this->add_control(
			'offset_item_num',
			[
				'label'     => esc_html__('Skip post count', 'instive'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '1',
				'condition' => ['offset_enable' => 'yes']

			]
		);


		$this->add_responsive_control(
			'text_align', [
				'label'   => esc_html__('Alignment', 'instive'),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [

					'left'    => [

						'title' => esc_html__('Left', 'instive'),
						'icon'  => 'fa fa-align-left',

					],
					'center'  => [

						'title' => esc_html__('Center', 'instive'),
						'icon'  => 'fa fa-align-center',

					],
					'right'   => [

						'title' => esc_html__('Right', 'instive'),
						'icon'  => 'fa fa-align-right',

					],
					'justify' => [

						'title' => esc_html__('Justified', 'instive'),
						'icon'  => 'fa fa-align-justify',

					],
				],
				'default' => 'left',

				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .ts-title, {{WRAPPER}} .media-body, {{WRAPPER}} .ts-feature-box .feature-icon' => 'text-align: {{VALUE}};',

				],
			]
		);//Responsive control end

		$this->end_controls_section();

		$this->start_controls_section('title_style_section',
			[
				'label' => esc_html__('Title ', 'instive'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ts_slider_autoplay',
			[
				'label'        => esc_html__('Autoplay', 'instive'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'instive'),
				'label_off'    => esc_html__('No', 'instive'),
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
			'ts_slider_dot_nav_show',
			[
				'label'        => esc_html__('Dot nav', 'instive'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'instive'),
				'label_off'    => esc_html__('No', 'instive'),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);


		$this->add_control('title_color',
			[
				'label'     => esc_html__('Color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .ts-title a' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_control('title_hv_color',
			[
				'label'     => esc_html__('Hover color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .ts-title:hover a' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__('Name Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ts-feature-box .ts-title a',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__('Title Margin', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ts-feature-box .ts-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section('details_style_section',
			[
				'label' => esc_html__('Description', 'instive'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control('details_color',
			[
				'label'     => esc_html__('color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .media-body p' => 'color: {{VALUE}};',

				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'details_typography',
				'label'    => esc_html__('Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ts-feature-box .media-body p',
			]
		);

		$this->add_responsive_control(
			'details_margin',
			[
				'label'      => esc_html__('Description Margin', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ts-feature-box .media-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section('img_style_section',
			[
				'label' => esc_html__('Image ', 'instive'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__('Image Shadow', 'instive'),
				'selector' => '{{WRAPPER}} .feature-icon img',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'label'    => esc_html__('Image Border', 'instive'),
				'selector' => '{{WRAPPER}} .feature-icon img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section('additional_section',
			[
				'label' => esc_html__('Additional ', 'instive'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control('service_box_bg',
			[
				'label'     => esc_html__('Background color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'service_box_padding',
			[
				'label'      => esc_html__('Service Box Padding', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ts-feature-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('service_box_style');

		$this->start_controls_tab(
			'service_box_style_normal',
			[
				'label' => esc_html__('Normal', 'instive'),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'service_box_shadow',
				'label'    => esc_html__('Service Box Shadow', 'instive'),
				'selector' => '{{WRAPPER}} .ts-feature-box',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'service_box_style_hover',
			[
				'label' => esc_html__('Hover', 'instive'),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'service_box_hover_shadow',
				'label'    => esc_html__('Service hover Shadow', 'instive'),
				'selector' => '{{WRAPPER}} .ts-feature-box:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'readmore_bottom',
			[
				'label'              => esc_html__('Readmore position', 'instive'),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => ['px'],
				'allowed_dimensions' => ['bottom', 'left'],
				'selectors'          => [
					'{{WRAPPER}} .ts-feature-box' => 'margin-bottom: {{BOTTOM}}{{UNIT}}{{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->add_control('readmore_color',
			[
				'label'     => esc_html__('Readmore color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .readmore' => 'color: {{VALUE}};',

				],
			]
		);
		$this->add_control(
			'box_bottom',
			[
				'label'              => esc_html__('Box gap ', 'instive'),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => ['px'],
				'allowed_dimensions' => ['bottom',],
				'default'            => ['bottom' => 30],
				'selectors'          => [
					'{{WRAPPER}} .ts-feature-box' => 'margin-bottom: {{BOTTOM}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'background',
				'label'    => esc_html__('Box Background', 'instive'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .ts-feature-box',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'  => 'border',
				'label' => esc_html__('Border', 'instive'),

				'selector' => '{{WRAPPER}} .ts-feature-box',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label'      => esc_html__('Border Radius', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ts-feature-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section('btn_style',
			[
				'label'     => esc_html__('Button Style ', 'instive'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => ["style" => ['style4']],
			]
		);

		$this->add_control('btn_bg_color',
			[
				'label'     => esc_html__('Button BG color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [

					'{{WRAPPER}} .instive-load-more-service .btn-primary' => 'background-color: {{VALUE}};',

				],
			]
		);

		$this->add_control('btn_color',
			[
				'label'     => esc_html__('Button color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [

					'{{WRAPPER}} .instive-load-more-service .btn-primary' => 'color: {{VALUE}};',

				],
			]
		);
		$this->add_control('btn_bg_hover_color',
			[
				'label'     => esc_html__('Button BG Hover color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .instive-load-more-service .btn-primary:hover' => 'background-color: {{VALUE}};',

				],
			]
		);
		$this->add_control('btn_hover_color',
			[
				'label'     => esc_html__('Button Hover color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .instive-load-more-service .btn-primary:hover' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'btn_border',
				'label'    => esc_html__('Border', 'instive'),
				'selector' => '{{WRAPPER}} .instive-load-more-service .btn',
			]
		);

		$this->add_responsive_control(
			'btn_radius',
			[
				'label'      => esc_html__('Button border radius', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .instive-load-more-service .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_margin',
			[
				'label'      => esc_html__('Button Margin', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .instive-load-more-service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label'      => esc_html__('Button padding', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .instive-load-more-service .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_align', [
				'label'   => esc_html__('Alignment', 'instive'),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [

					'left'    => [

						'title' => esc_html__('Left', 'instive'),
						'icon'  => 'fa fa-align-left',

					],
					'center'  => [

						'title' => esc_html__('Center', 'instive'),
						'icon'  => 'fa fa-align-center',

					],
					'right'   => [

						'title' => esc_html__('Right', 'instive'),
						'icon'  => 'fa fa-align-right',

					],
					'justify' => [

						'title' => esc_html__('Justified', 'instive'),
						'icon'  => 'fa fa-align-justify',

					],
				],
				'default' => 'center',

				'selectors' => [
					'{{WRAPPER}} .instive-load-more-service' => 'text-align: {{VALUE}};',

				],
			]
		);//Responsive control end

		$this->end_controls_section();


	}

	public function getCategories() {
		$cat_list = [];
		if(post_type_exists('instive-insurance')) {

			$terms = get_terms(
				array(
					'taxonomy'   => 'instive-insurance-type',
					'hide_empty' => false,
					'number'     => '350',
				)
			);


			foreach($terms as $post) {
				$cat_list[$post->slug] = [$post->name];
			}
		}

		return $cat_list;
	}

	public function getPosts() {
		$post_list = [];
		global $wpdb;
		$posts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type LIKE '%instive-insurance%'", OBJECT);
		foreach($posts as $post) {
			$this->post_id = $post->ID;
			$post_list[$post->ID] = $post->post_title;
		}

		return $post_list;
	}

	protected function render() {

		$settings = $this->get_settings();

		$feature_icon_show = $settings['feature_icon_show'];
		$feature_desc_show = $settings['feature_desc_show'];

		$arg = [
			'post_type'      => 'instive-insurance',
			'post_status'    => 'publish',
			'order'          => $settings['order'],
			'posts_per_page' => $settings['count'],


		];
		$auto_nav_slide = $settings['ts_slider_autoplay'];
		$dot_nav_show = $settings['ts_slider_dot_nav_show'];
		$item_count = $settings['item_count'];

		$slide_controls = [
			'dot_nav_show'   => $dot_nav_show,
			'auto_nav_slide' => $auto_nav_slide,
			'item_count'     => $item_count,
		];

		$slide_controls = \json_encode($slide_controls);


		if($settings['offset_enable'] == 'yes') {
			$arg['offset'] = $settings['offset_item_num'];
		}
		if($settings['style'] == 'style1'):
			?>
			<?php $single_post = get_post($settings['post_id']); ?>
			<?php
			$insurance_content = get_the_content();
			?>
            <div class="ts-feature-box style1 box-align-<?php echo esc_attr($settings['text_align']); ?>">
				<?php if($feature_icon_show == 'yes'): ?>
                    <div class="feature-icon">
						<?php echo instive_kses(get_the_post_thumbnail($single_post->ID, 'full')); ?>
                    </div>
				<?php endif; ?>

                <h3 class="ts-title md">
                    <a href="<?php the_permalink($single_post->ID); ?>"> <?php echo esc_html(wp_trim_words(get_the_title($single_post->ID), $settings['post_title_crop'], '')); ?> </a>
                </h3>

                <div class="media-body">

					<?php if($feature_desc_show == 'yes'): ?>
                        <p>
							<?php echo esc_html(wp_trim_words(get_the_excerpt($single_post->ID), $settings['post_content_crop'], '')); ?>
                        </p>
					<?php endif; ?>

					<?php if($settings['readmore']): ?>
                        <a href="<?php the_permalink($single_post->ID); ?>"
                           class="btn-link readmore"> <?php echo esc_html($settings['post_readmore_text']); ?> </a>
					<?php endif; ?>

                </div>

            </div>

		<?php endif; ?>

		<?php if($settings['style'] == 'style2'): ?>
			<?php
			$single_post = get_post($settings['post_id']);

			?>
            <div class="ts-feature-box style2">
                <h3 class="ts-title md">
                    <a href="<?php the_permalink($single_post->ID); ?>"> <?php echo esc_html(wp_trim_words(get_the_title($single_post->ID), $settings['post_title_crop'], '')); ?> </a>
                </h3>
                <div class="media">
					<?php if($feature_icon_show == 'yes'): ?>
                        <div class="feature-icon d-flex">
							<?php echo instive_kses(get_the_post_thumbnail($single_post->ID, 'full')); ?>
                        </div>
					<?php endif; ?>
                    <div class="media-body">
                        <p>
							<?php
							echo esc_html(wp_trim_words(get_the_excerpt($single_post->ID), $settings['post_content_crop'], ''));
							?>
                        </p>
						<?php if($settings['readmore']): ?>
                            <a href="<?php the_permalink($single_post->ID); ?>"
                               class="btn-link readmore"> <?php echo esc_html($settings['post_readmore_text']); ?> </a>
						<?php endif; ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>

		<?php

		if($settings['style'] == 'style3'):
			if(is_array($settings['category']) && count($settings['category'])):
				$arg['tax_query'] = array(
					array(
						'taxonomy' => 'instive-insurance-type',
						'field'    => 'slug',
						'terms'    => $settings['category'],
						'operator' => 'IN'
					)
				);
			endif;
			$insurance = new \WP_Query($arg);

			if($insurance->have_posts()) : ?>
                <div class="ts-service-slider owl-carousel  dot-style2"
                     data-controls="<?php echo esc_attr($slide_controls); ?>">

					<?php while($insurance->have_posts()) : $insurance->the_post(); ?>
						<?php

						$insurance_content = get_the_excerpt();
						$quote_btn = instive_meta_option(get_the_ID(), 'quote_btn', true);
						$quote_btn_url = instive_meta_option(get_the_ID(), 'quote_btn_url', true);
						$quote_btn_icon = instive_meta_option(get_the_ID(), 'quote_btn_icon', true);
						$intro_image = instive_meta_option(get_the_ID(), 'intro_image', true);
						?>
                        <div class="ts-feature-box">
							<?php if($feature_icon_show == 'yes'): ?>
                                <div class="feature-icon">
									<?php if(isset($intro_image['url']) && $intro_image['url'] != ''): ?>
                                        <img src="<?php echo esc_url($intro_image['url']); ?>"
                                             alt="<?php the_title_attribute(); ?>">
									<?php else: ?>
										<?php the_post_thumbnail(); ?>
									<?php endif; ?>
                                </div>
							<?php endif; ?>

                            <h3 class="ts-title md">
                                <a href="<?php the_permalink(); ?>"> <?php echo esc_html(wp_trim_words(get_the_title(), $settings['post_title_crop'], '')); ?> </a>
                            </h3>


                            <div class="media-body">
								<?php if($feature_desc_show == 'yes'): ?>
                                    <p>
										<?php echo esc_html(wp_trim_words($insurance_content, $settings['post_content_crop'], '')); ?>
                                    </p>
								<?php endif; ?>

								<?php if(isset($quote_btn) && $settings['readmore']): ?>
                                    <a href="<?php echo esc_url($quote_btn_url); ?>" class="quote-btn readmore btn"> <i
                                                class="<?php echo esc_attr($quote_btn_icon); ?>"></i> <?php echo esc_html($quote_btn); ?>
                                    </a>
								<?php endif; ?>
                            </div>

                        </div>
					<?php endwhile;
					wp_reset_postdata(); ?>
                </div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if($settings['style'] == 'style4'): ?>
			<?php

			if(is_array($settings['category']) && count($settings['category'])):
				$arg['tax_query'] = array(
					array(
						'taxonomy' => 'instive-insurance-type',
						'field'    => 'slug',
						'terms'    => $settings['category'],
						'operator' => 'IN'
					)
				);
			endif;

			$insurance = new \WP_Query($arg);
			$ajax_json_data = [
				'category'           => $settings['category'],
				'order'              => $settings['order'],
				'posts_per_page'     => $settings['count'],
				'total_post'         => $insurance->found_posts,
				'post_title_crop'    => $settings['post_title_crop'],
				'post_content_crop'  => $settings['post_content_crop'],
				'readmore'           => $settings['readmore'],
				'feature_icon_show'  => $settings['feature_icon_show'],
				'post_readmore_text' => $settings['post_readmore_text']
			];
			$ajax_json_data = json_encode($ajax_json_data);

			if($insurance->have_posts()) : ?>
                <div class="row instive-style4-service-list">

					<?php while($insurance->have_posts()) : $insurance->the_post(); ?>
						<?php

						$insurance_content = get_the_excerpt();
						$quote_btn = instive_meta_option(get_the_ID(), 'quote_btn', true);
						$quote_btn_url = instive_meta_option(get_the_ID(), 'quote_btn_url', true);
						$quote_btn_icon = instive_meta_option(get_the_ID(), 'quote_btn_icon', true);
						$intro_image = instive_meta_option(get_the_ID(), 'intro_image', true);

						?>

						<?php require 'style/service/style4.php' ?>

					<?php endwhile;
					wp_reset_postdata(); ?>
                </div>
				<?php if($settings['ajax_load_enable'] == 'yes'): ?>
					<?php if($insurance->max_num_pages > 1): ?>
                        <div class="instive-load-more-service">
                            <button data-json_grid_meta="<?php echo esc_attr($ajax_json_data); ?>"
                                    class="btn btn-primary instive-load-more-btn"><i
                                        class="fas fa-sync-alt"></i> <?php echo esc_html__('Load more', 'instive') ?>
                            </button>
                        </div>
					<?php endif; // end max_num_pages ?>
				<?php endif; // ajax_load_enable ?>
			<?php endif; //have_posts ?>
		<?php endif; // end style4 ?>

		<?php
	}

	protected function content_template() {
	}


}


