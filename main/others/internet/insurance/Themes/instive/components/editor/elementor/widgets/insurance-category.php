<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Instive_Insurance_Category_Widget extends Widget_Base {

	public $base;

	public function get_name() {
		return 'instive-category';
	}

	public function get_title() {
		return esc_html__( 'Instive Insurance Category', 'instive' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'instive-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_tab',
			[
				'label' => esc_html__( 'Category', 'instive' ),
			]
		);


		$this->add_control(
			'cat_title_color',
			[
				'label'     => esc_html__( 'Title color', 'instive' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-category-list li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cat_bgcolor',
			[
				'label'     => esc_html__( 'Category background color', 'instive' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ts-category-list-classic .ts-category-list li a span' => 'background-color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'category_count',
			[
				'label'   => esc_html__( 'Category count', 'instive' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '3',

			]
		);

		$this->add_responsive_control(
			'thumbnail_height',
			[
				'label'           => esc_html__( 'Image Height', 'instive' ),
				'type'            => \Elementor\Controls_Manager::SLIDER,
				'range'           => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices'         => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 230,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 230,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 230,
					'unit' => 'px',
				],
				'selectors'       => [
					'{{WRAPPER}} .ts-category-list li a' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'instive' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Desc', 'instive' ),
					'ASC'  => esc_html__( 'Asc', 'instive' ),


				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'   => 'cat_title_typography',
				'label'  => esc_html__( 'Category title', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .ts-category-list li a',
			]
		);
		$this->add_control(
			'show_cat_selector',
			[
				'label'     => esc_html__( 'Custom Category ', 'instive' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'instive' ),
				'label_off' => esc_html__( 'No', 'instive' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'ts_offset_enable',
			[
				'label'     => esc_html__( 'Enable category skip', 'instive' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'instive' ),
				'label_off' => esc_html__( 'No', 'instive' ),
				'default'   => 'no',

			]
		);

		$this->add_control(
			'ts_offset_item_num',
			[
				'label'     => esc_html__( 'Skip category count', 'instive' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '1',
				'condition' => [ 'ts_offset_enable' => 'yes' ]

			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$arg      = [
			'orderby'          => 'name',
			'number'           => $settings['category_count'],
			'order'            => $settings['order'],
			'suppress_filters' => false,
			'taxonomy'         => 'instive-insurance-type',
			'hide_empty'       => false
		];

		if ( $settings['ts_offset_enable'] == 'yes' ) {
			$arg['offset'] = $settings['ts_offset_item_num'];
		}

		$categories = get_categories( $arg );

		?>
		<?php if ( $settings['show_cat_selector'] == 'yes' ): ?>
			<?php if ( ! empty( $categories ) ) { ?>
                <div class="ts-insurance-category ts-category-list-classic ts-category-list-item">
                    <div class="ts-category-list">
						<?php foreach ( $categories as $cat ) {
							$category                = get_category( $cat );
							$category_image          = '';
							$category_featured_image = '';

							if ( isset( $category->cat_ID ) ) {
								$category_featured_image = get_term_meta( $category->cat_ID, 'insurance_taxonomy', true );
							}
							if ( isset( $category_featured_image['instive_insurance_cat']['url'] ) ) {
								$category_image = $category_featured_image['instive_insurance_cat']['url'];
							}

							?>
							<?php if ( ! is_null( $category ) ) { ?>
                                <div class="insurance-content">
                                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
										<?php echo instive_kses( $category_image ); ?>
                                    >
                                        <img src="<?php echo esc_html( $category_image ); ?>" alt="">
                                        <span> <?php echo esc_html( $category->name ); ?> </span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
							<?php } ?>
						<?php } ?>
                    </div>
                </div>
			<?php } ?>

		<?php endif; ?>
		<?php


	}

	protected function content_template() {
	}

}