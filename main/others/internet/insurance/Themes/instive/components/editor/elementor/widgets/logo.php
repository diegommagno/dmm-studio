<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Site_Logo_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-logo';
    }

    public function get_title() {

        return esc_html__( 'Site Logo', 'instive' );

    }

    public function get_icon() { 
        return 'eicon-image';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

      $this->start_controls_section(
         'section_tab',
         [
               'label' => esc_html__('Logo settings', 'instive'),
         ]
      );
		$this->add_control(
			'logo_type',
			[
				'label' => esc_html__( 'Use light logo?', 'instive' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'instive' ),
				'label_off' => esc_html__( 'No', 'instive' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
            'logo_bg_color',
            [
                'label' => esc_html__('Background Color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .instive-widget-logo' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_size_width',
            [
                'label' => esc_html__('Logo Width', 'instive'),
                'type' => Controls_Manager::NUMBER,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .instive-widget-logo img' => 'max-width: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_size_height',
            [
                'label' => esc_html__('Logo Height', 'instive'),
                'type' => Controls_Manager::NUMBER,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .instive-widget-logo img' => 'max-height: {{VALUE}}px;',
                    '{{WRAPPER}} .instive-widget-logo a' => 'line-height: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_text_align', [
                'label'          => esc_html__( 'Alignment', 'instive' ),
                'type'           => Controls_Manager::CHOOSE,
                'options'        => [
    
                    'left'         => [
                        'title'    => esc_html__( 'Left', 'instive' ),
                        'icon'     => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title'    => esc_html__( 'Center', 'instive' ),
                        'icon'     => 'fa fa-align-center',
                    ],
                    'right'         => [
                        'title'     => esc_html__( 'Right', 'instive' ),
                        'icon'     => 'fa fa-align-right',
                    ],
                ],
               'default'         => '',
               'selectors' => [
                   '{{WRAPPER}} .instive-widget-logo' => 'text-align: {{VALUE}};'
               ],
            ]
        );
 

        $this->add_responsive_control(
			'logo_padding',
			[
				'label' =>esc_html__( 'Padding', 'instive' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .instive-widget-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );
       
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();

        if($settings['logo_type'] == 'yes'){
            $logo_type = ['general_light_logo', 'logo_light.png'];
        }else{
            $logo_type = ['general_main_logo', 'logo_main.png'];
        }
    ?>
    <div class="instive-widget-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php 
                echo esc_url(
                    instive_src(
                        $logo_type[0],
                        INSTIVE_IMG . '/logo/' . $logo_type[1]
                    )
                );
            ?>" alt="<?php bloginfo('name'); ?>">
        </a>
    </div>

    <?php  
    }
    protected function content_template() { }
}