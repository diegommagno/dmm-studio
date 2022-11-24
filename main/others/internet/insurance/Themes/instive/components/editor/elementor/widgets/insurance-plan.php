<?php

namespace Elementor;

if(!defined('ABSPATH')) {
	exit;
}


class Instive_Insurance_Plan_Widget extends Widget_Base {


	public $base;
	private $post_id = null;

	public function get_name() {
		return 'instive-insurance-plan';
	}

	public function get_title() {

		return esc_html__('Instive Insurance Plan', 'instive');

	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return ['instive-elements'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_tab',
			[
				'label' => esc_html__( 'Insurance Plan', 'instive' ),
			]
		);

		$this->add_control('category',
			[
				'label'     => esc_html__('Category', 'instive'),
				'type'      => \Elementor\Controls_Manager::SELECT2,
				'multiple'  => true,
				'options'   => $this->getCategories(),

			]
		);

		$this->add_control(
			'know_more_text',
			[
				'label'     => esc_html__('Know more text', 'instive'),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Know More',
			]
		);

		$this->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'List Icon', 'instive' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

		

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_settings_tab',
			[
				'label' => esc_html__('Slider Settings', 'instive'),
			]
		);

		$this->add_control(
			'slider_item_count',
			[
				'label'     => esc_html__('Slider Count', 'instive'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '3',
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
			'ts_slider_loop',
			[
				'label'        => esc_html__('Loop', 'instive'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'instive'),
				'label_off'    => esc_html__('No', 'instive'),
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
            'show_navigation',
            [
                'label'       => esc_html__('Show Navigation', 'cuinare'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'cuinare'),
                'label_off'   => esc_html__('No', 'cuinare'),
                'default'     => 'yes'
            ]
        );

		$this->add_control(
			'left_arrow_icon',
			[
				'label' => esc_html__( 'Left Arrow Icon', 'cuinare' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'tsicon tsicon-left-arrow3',
					'library' => 'solid',
				],
                'condition' => ['show_navigation' => 'yes']
			]
		);

		$this->add_control(
			'right_arrow_icon',
			[
				'label' => esc_html__( 'Right Arrow Icon', 'cuinare' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'tsicon tsicon-right-arrow3',
					'library' => 'solid',
				],
                'condition' => ['show_navigation' => 'yes']
			]
		);

		$this->end_controls_section();

		//Style Tab Section

        $this->start_controls_section('style_section',
            [
               'label'    => esc_html__( 'Thumbnail Style', 'instive' ),
               'tab'      => Controls_Manager::TAB_STYLE,
            ]
       	); 

		$this->add_control('thumbnail_icon_color',
		   [
			   'label'     => esc_html__('Thumnail Icon Color', 'instive'),
			   'type'      => Controls_Manager::COLOR,
			   'default'   => '',
			   'selectors' => [
				   '{{WRAPPER}} .insurance-slider-wrapper .thumbnail i' => 'color: {{VALUE}};',
			   ],
		   ]
	   	);

		$this->add_control('thumbnail_bg_color',
		   [
			   'label'     => esc_html__('Thumnail Background Color', 'instive'),
			   'type'      => Controls_Manager::COLOR,
			   'default'   => '',
			   'selectors' => [
				   '{{WRAPPER}} .insurance-slider-wrapper .thumbnail::before' => 'background-color: {{VALUE}};',

			   ],
		   ]
	   	);

		$this->add_control('thumbnail_shape_bg_color',
		   [
			   'label'     => esc_html__('Thumnail Shape Background Color', 'instive'),
			   'type'      => Controls_Manager::COLOR,
			   'default'   => '',
			   'selectors' => [
				   '{{WRAPPER}} .insurance-slider-wrapper .thumbnail::after' => 'background-color: {{VALUE}};',

			   ],
		   ]
	   	);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'thumbnail_icon_typography',
				'label'    => esc_html__('Icon Size Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .thumbnail',
			]
		);

	   	$this->end_controls_section();

		$this->start_controls_section('content_section',
		[
			'label'    => esc_html__( 'Plan Content Style', 'instive' ),
			'tab'      => Controls_Manager::TAB_STYLE,
		]
		); 

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__('Title Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .plan-title',
			]
		);

		$this->add_control('title_color',
			[
				'label'     => esc_html__('Title Color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .plan-title' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__('Title Margin', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .plan-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'label'    => esc_html__('Sub Title Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .content-wrapper ul li .subtitle',
			]
		);

		$this->add_control('sub_title_color',
			[
				'label'     => esc_html__('Sub Title Color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper ul li .subtitle' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_responsive_control(
			'plan_list_padding',
			[
				'label'      => esc_html__('List Item Padding', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	  	$this->end_controls_section();

		$this->start_controls_section('button_section',
		[
			'label'    => esc_html__( 'Button Style', 'instive' ),
			'tab'      => Controls_Manager::TAB_STYLE,
		]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'    => esc_html__('Button Typography', 'instive'),
				'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn',
			]
		);

		$this->start_controls_tabs('insurance_button_style');

		$this->start_controls_tab(
			'plan_button_normal_style',
			[
				'label' => esc_html__('Normal', 'instive'),
			]
		);

		$this->add_control('button_color',
			[
				'label'     => esc_html__('Button Color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control('button_bg_color',
			[
				'label'     => esc_html__('Button Background', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'insurance_button_border',
				'label' => esc_html__( 'Border', 'instive' ),
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'plan_button_hover_style',
			[
				'label' => esc_html__('Hover', 'instive'),
			]
		);

		$this->add_control('button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control('button_hover_bg_color',
			[
				'label'     => esc_html__('Hover Background', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'insurance_button_hover_border',
				'label' => esc_html__( 'Border', 'instive' ),
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn:hover',
				]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'border_radius',
			[
				'label'      => esc_html__('Border Radius', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label'      => esc_html__('Button Margin', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper .content-wrapper .know-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section('slider_nav_section',
			[
				'label'    => esc_html__( 'Slider Nav Style', 'instive' ),
				'tab'      => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'width', 'cuinare' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 200,
					],
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
			
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'cuinare' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' , '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 200,
					],
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
			
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
            'navigation_style_tabs'
        );

		$this->start_controls_tab(
			'navigation_style_normal_tab',
			[
			  'label' => __( 'Normal', 'cuinare' ),
			]
		  );

		  $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'cuinare' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'cuinare' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'navigation_style_hover_tab',
			[
			  'label' => __( 'Hover', 'cuinare' ),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Color', 'cuinare' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Background Color', 'cuinare' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => esc_html__( 'Typography', 'cuinare' ),
				'selector' => '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev',
			]
		);

		$this->add_responsive_control(
			'nav_border_radius',
			[
				'label' => esc_html__( 'Nav Border Radius', 'cuinare' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slide_prev_position',
			[
				'label'       => esc_html__('Previous Button Position (x-axis)', 'cuinare'),
				'description' => esc_html__('(-) Negative values are allowed', 'cuinare'),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => ['px', '%'],
				'range'       => [
					'%'  => [
						'min' => -10,
						'max' => 100,
					],
					'px' => [
						'min' => -500,
						'max' => 1100,
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slide_next_position',
			[
				'label'       => esc_html__('Next Button Position (x-axis)', 'cuinare'),
				'description' => esc_html__('(-) Negative values are allowed', 'cuinare'),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => ['px', '%'],
				'range'       => [
					'%'  => [
						'min' => -100,
						'max' => 200,
					],
					'px' => [
						'min' => -300,
						'max' => 300,
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section('wrapper_section',
			[
				'label'    => esc_html__( 'Wrapper Style', 'instive' ),
				'tab'      => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control('wrapper_bg_color',
			[
				'label'     => esc_html__('Plan Wrapper Background', 'instive'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .insurance-slider-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wrapper_padding',
			[
				'label'      => esc_html__('Wrapper Padding', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wrapper_border_radius',
			[
				'label'      => esc_html__('Wrapper Border Radius', 'instive'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .insurance-slider-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_box_shadow',
				'label' => esc_html__( 'Wrapper Box Shadow', 'instive' ),
				'selector' => '{{WRAPPER}} .insurance-slider-wrapper',
			]
		);

		$this->end_controls_section();

	}

	public function getCategories() {
		$cat_list = [];
		if(post_type_exists('insurance_plan')) {

			$terms = get_terms(
				array(
					'taxonomy'   => 'plan_categories',
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

	protected function render() {

		$settings = $this->get_settings();


		$arg = [
			'post_type'      => 'insurance_plan',
			'post_status'    => 'publish',
		];

		if(is_array($settings['category']) && count($settings['category'])):
			$arg['tax_query'] = array(
				array(
					'taxonomy' => 'plan_categories',
					'field'    => 'slug',
					'terms'    => $settings['category'],
					'operator' => 'IN'
				)
			);
		endif;
		$insurance_plan = new \WP_Query($arg);

		$autoplay = $settings['ts_slider_autoplay'];
		$loop = $settings['ts_slider_loop'];
		$show_navigation = $settings['show_navigation'];
		$slider_count = $settings['slider_item_count'];

		$slide_controls = [
			'slider_autoplay' => $autoplay,
			'slider_loop' => $loop,
			'show_nav'    => $show_navigation,
			'slider_count'    => $slider_count,
			'widget_id'          => $this->get_id()
		];

		$slide_controls = \json_encode($slide_controls);

		?>

		<div class="insurance-plan-slider dot-style2" data-controls="<?php echo esc_attr($slide_controls); ?>">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php if($insurance_plan->have_posts()): ?>
						<?php while($insurance_plan->have_posts()) : $insurance_plan->the_post(); ?>
							<?php 
								$insurace_plans = instive_meta_option(get_the_ID(), 'insurace_plans', true);
								
								$plan_icon        = instive_meta_option(get_the_ID(), 'plan_icon', '');
								$plan_title       = get_the_title();
								$button_text      = instive_meta_option(get_the_ID(), 'btn_text', '');
								$button_icon      = instive_meta_option(get_the_ID(), 'btn_icon', true);
							?>
							<div class="swiper-slide">
								<div class="insurance-slider-wrapper">
									<div class="thumbnail">
										<i class="<?php echo esc_attr($plan_icon); ?>"></i>
									</div>
									<div class="content-wrapper">
										<h2 class="plan-title"><?php echo esc_html($plan_title); ?></h2>
										<ul>
											<?php foreach($insurace_plans as $insurace_plan) { ?>
												<li>
													<div class="list-icon">
														<?php \Elementor\Icons_Manager::render_icon( $settings['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
													</div>
													<?php
														$subtitle_text = $insurace_plan['subtitle_text'];
														$description_text = $insurace_plan['des_text'];
														?>
														<div class="contents">
														<span class="subtitle"><?php echo esc_html( !empty($subtitle_text) ? $subtitle_text : ''); ?> </span>
															<span><?php echo esc_html( !empty($description_text) ? $description_text : ''); ?></span>
														</div>
												</li>
											<?php } ?>
											<?php if(!empty($button_text) && isset($button_icon)): ?>
												<a href="<?php the_permalink(); ?>" class="btn know-more-btn"><?php echo esc_html($button_text); ?> <i class="<?php echo esc_attr($button_icon); ?>"></i></a>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
							
						<?php 
						endwhile;
						wp_reset_postdata();
					endif;	  ?>
				</div>
			</div>
			<!-- next / prev arrows -->
			<?php if($show_navigation == 'yes') { ?>
				<div class="swiper-button-next swiper-next-<?php echo esc_attr($this->get_id()); ?>"> 
					<?php \Elementor\Icons_Manager::render_icon( $settings['right_arrow_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="swiper-button-prev swiper-prev-<?php echo esc_attr($this->get_id()); ?>">
					<?php \Elementor\Icons_Manager::render_icon( $settings['left_arrow_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			<?php } ?>
		</div>
		<?php
	}

	protected function content_template() {	}

}


