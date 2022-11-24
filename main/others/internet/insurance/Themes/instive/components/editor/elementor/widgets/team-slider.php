<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Team_Slider_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-team-slider';
    }

    public function get_title() {

        return esc_html__( 'Instive Team slider ', 'instive' );

    }

    public function get_icon() { 
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Team Slider Settings', 'instive'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'team_title', [
                'label' => esc_html__('Team Title','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Jhon wick             
                ', 'instive'),
                'label_block'  => true,
			]
        );
        
        $repeater->add_control(
			'team_designation', [
                'label' => esc_html__('Team designation','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('CEO       
                ', 'instive'),
                'label_block'  => true,
			]
        );
        
        $repeater->add_control(
			'team_image', [
                'label'       => esc_html__('Image', 'instive'),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'separator'   => 'after',
			]
        );
        
        $this->add_control(
			'team_items',
			[
				'label' =>  esc_html__( 'Team Slider', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'team_title' => esc_html__('John Doe', 'instive'),
                    ],
					[
                        'team_title' => esc_html__('David Alone', 'instive'),
                    ],
				],
				'title_field' => '{{{ team_title }}}',
			]
        );
       
        $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Team height', 'instive' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 645,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .banner-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'heading_type',
			[
				'label' => esc_html__( 'Heading type', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1'  => esc_html__( 'H1', 'instive' ),
					'h2' => esc_html__( 'H2', 'instive' ),
					'h3' => esc_html__( 'H3', 'instive' ),
					'h4' => esc_html__( 'H4', 'instive' ),
					'h5' => esc_html__( 'H5', 'instive' ),
					'h6' => esc_html__( 'H6', 'instive' ),
					'p' => esc_html__( 'P', 'instive' ),
				],
			]
      );
    
      $this->end_controls_section();

        //style
        $this->start_controls_section('style_section',
            [
               'label'    => esc_html__( 'Style section', 'instive' ),
               'tab'      => Controls_Manager::TAB_STYLE,
            ]
       ); 
     
       $this->add_control(
            'ts_slider_item',
            [
                'label' => esc_html__( 'Slider items', 'instive' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );
          
       $this->add_control(
        'ts_team_autoplay',
            [
            'label' => esc_html__( 'Autoplay', 'instive' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'instive' ),
            'label_off' => esc_html__( 'No', 'instive' ),
            'return_value' => 'yes',
            'default' => 'no'
            ]
        );

        $this->add_control(
			'ts_team_speed',
            [
               'label' => esc_html__( 'Team speed', 'instive' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter team Speed', 'instive' ),
               'default' => 5000,
               'condition' => ["ts_team_autoplay" => ['yes']],
            ]
		  );

        $this->add_control(
        'ts_team_nav_show',
            [
            'label' => esc_html__( 'Nav show', 'instive' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'instive' ),
            'label_off' => esc_html__( 'No', 'instive' ),
            'return_value' => 'yes',
            'default' => 'no'
            ]
        );
        $this->add_control(
         'ts_team_dot_nav_show',
            [
                'label' => esc_html__( 'Dot nav', 'instive' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'instive' ),
                'label_off' => esc_html__( 'No', 'instive' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'ts_team_loop',
            [
                'label' => esc_html__( 'Loop', 'instive' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'instive' ),
                'label_off' => esc_html__( 'No', 'instive' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('title_style_section',
         [
            'label'    => esc_html__( 'Content  Styling', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
       );

       $this->add_control('team_title_color',
            [
                'label'     => esc_html__('Team title color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .single-team-wrap .ts-title' => 'color: {{VALUE}};',
                ],
            ]
        );
       $this->add_control('team_title_hover_color',
            [
                'label'     => esc_html__('Team title hover color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .single-team-wrap .ts-title:hover ' => 'color: {{VALUE}};',
                
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'team_title_typography',
				'label' => esc_html__( 'Team Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-team-wrap .ts-title',
			]
        );

        $this->add_responsive_control(
            'team_title_margin',
            [
                'label' => esc_html__( 'Top Title Margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}}  .single-team-wrap .ts-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        
        $this->add_control('team_designation_color',
            [
               'label'     => esc_html__('Team designation color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .single-team-wrap p' => 'color: {{VALUE}};',
               
               ],
            ]
        );
     
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'team_designation_typography',
				'label' => esc_html__( 'Team designation Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .single-team-wrap p',
			]
       );
       $this->add_responsive_control(
            'team_designation_margin',
            [
                'label' => esc_html__( 'Team designation margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-team-wrap p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
                'team_image_margin',
                [
                    'label' => esc_html__( 'Team Image Margin', 'instive' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-team-wrap .team-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );

   
    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => esc_html__( 'Box Shadow', 'instive' ),
            'selector' => '{{WRAPPER}} .single-team-wrap img',
        ]
    );

      $this->end_controls_section();

      $this->start_controls_section('advance_style_section',
      [
         'label'    => esc_html__( 'Advance  Styling', 'instive' ),
         'tab'      => Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'border',
            'label' => esc_html__( 'Border', 'instive' ),
            'selector' => '{{WRAPPER}} .single-team-wrap .team-img',
        ]
    );
    $this->add_responsive_control(
        'border_radius',
        [
            'label' => esc_html__( 'Border radius', 'instive' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .single-team-wrap .team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
      $this->end_controls_section();

    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $team_items = $settings['team_items'];
        
        $show_navigation   =      $settings["ts_team_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =      $settings['ts_team_autoplay'];
        $dot_nav_show      =      $settings['ts_team_dot_nav_show'];
        $ts_team_loop      =      $settings['ts_team_loop'];
        $ts_slider_speed   =      $settings['ts_team_speed'];
        $ts_slider_item    =      $settings['ts_slider_item'];

        $team_controls    = [
            'show_nav'=>$show_navigation, 
            'dot_nav_show'=>$dot_nav_show, 
            'auto_nav_slide'=>$auto_nav_slide, 
            'ts_slider_speed'=>$ts_slider_speed, 
            'ts_slider_item'=>$ts_slider_item, 
            'ts_team_loop'=>$ts_team_loop, 
        ];
   
        $team_controls = \json_encode($team_controls); 
     

    ?>
     
      <div class="ts-team-slider owl-carousel dot-style2" data-controls="<?php echo esc_attr($team_controls); ?>">
         <?php foreach($team_items as $item): ?>
         <div class="col team-item">
            <div class="single-team-wrap text-center">
               <div class="team-img">

                     <img class="img-fluid " src="<?php echo esc_url($item['team_image']['url']); ?>" alt="<?php  echo esc_attr($item['team_title']); ?>">
                     
               </div>

               <<?php echo esc_attr($settings['heading_type']); ?> class="ts-title">
                    
                    <?php
                        echo esc_html($item['team_title']);
                     ?>

                </<?php echo esc_attr($settings['heading_type']); ?>>
    
               <p><?php echo esc_html($item['team_designation']); ?></p>
            </div>
         </div>
         <?php endforeach; ?> 
      </div>

    <?php  
    }
    protected function content_template() { }
}