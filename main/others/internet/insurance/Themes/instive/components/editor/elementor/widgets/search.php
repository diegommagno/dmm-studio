<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Search_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-search';
    }

    public function get_title() {

        return esc_html__( 'Instive Search', 'instive' );

    }

    public function get_icon() { 
        return 'eicon-search';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Search settings', 'instive'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    

        $this->add_control(
            'seach_field_bg_color',
            [
                'label' => esc_html__('Search BG color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-search-box .instive-serach' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'seach_field_color',
            [
                'label' => esc_html__('Search color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-search-box .form-control' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_border',
				'label' => esc_html__( 'Border', 'instive' ),
				'selector' => '{{WRAPPER}} .ts-search-box .form-control',
			]
		);
      
      $this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'instive' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-search-box .form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );
      $this->add_responsive_control(
			'searchPadding',
			[
				'label' => esc_html__( 'Search Field Padding', 'instive' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .instive-serach' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );
      $this->add_responsive_control(
			'search_field_height',
			[
			'label' =>esc_html__( 'Search field height', 'instive' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 40,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 40,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 40,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .ts-search-box .form-control' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
      );

        $this->end_controls_section();

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'BTN Settings', 'instive' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
      );
      

        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html__('Search btn color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-search-box .search-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Search btn BG color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-search-box .search-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
			'search_btn_position',
			[
				'label' =>esc_html__( 'btn position', 'instive' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .ts-search-box .search-button' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
      );
      
      $this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__('Btn Padding', 'instive' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-search-box .search-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );
        $this->end_controls_section();
    }

    protected function render( ) { 

        $settings = $this->get_settings();

    ?>
      <div class="ts-search-box">
         <?php  get_search_form(); ?>
      </div>

    <?php  
    }
    protected function content_template() { }
}