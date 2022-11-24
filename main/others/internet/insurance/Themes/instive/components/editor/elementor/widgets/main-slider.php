<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Main_Slider_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-main-slider';
    }

    public function get_title() {

        return esc_html__( 'Instive main slider', 'instive' );

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
                'label' => esc_html__('Slider settings', 'instive'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_top_title', [
                'label' => esc_html__('Slider Sub Title','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Live your dream', 'instive'),
                'label_block'  => true,
            ]
        );
        
        $repeater->add_control(
            'slider_main_title', [
                'label' => esc_html__('Slider Main Title','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('RELIABLE INSURANCE FOR ANY PURPO SE', 'instive'),
                'label_block'  => true,
            ]
        );

        $repeater->add_control(
            'slider_desc', [
                'label' => esc_html__('Slider description','instive'),
                'type'         => Controls_Manager::TEXTAREA,
                'default'      => esc_html__('For nearly 50 years life       
                ', 'instive'),
                'label_block'  => true,
            ]
        );

        $repeater->add_control(
            'slider_bg_image', [
                'label'       => esc_html__('Background Image', 'instive'),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'separator'   => 'after',
            ]
        );
        $repeater->add_control(
            'button_text_one', [
                'label'        => esc_html__('Button Text one', 'instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Button', 'instive'),
                'label_block'  => true,
            ]
        );
        $repeater->add_control(
            'button_url_one', [
                'label'            => esc_html__( 'Button url one', 'instive' ),
                'type'             => \Elementor\Controls_Manager::URL,
                'label_block'      => true,
                'separator'        => 'after', 
            ]
        );
        $repeater->add_control(
            'button_text_two', [
                'label'        => esc_html__('Button Text two', 'instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Button ', 'instive'),
                'label_block'  => true,
            ]
        );
        $repeater->add_control(
            'button_url_two', [
                'label'            => esc_html__( 'Button url two', 'instive' ),
                'type'             => \Elementor\Controls_Manager::URL,
                'label_block'      => true,
                'separator'        => 'after', 
            ]
        );
        $repeater->add_control(
            'content_align_text', [
                'label' => esc_html__( 'Content Alignment', 'instive' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'mr-auto',
                'options' => [
                   'mr-auto'  => esc_html__( 'Left', 'instive' ),
                   'mx-auto text-center' => esc_html__( 'Center', 'instive' ),
                   'ml-auto text-right' => esc_html__( 'Right', 'instive' ),
                ],
            ]
        );
        $repeater->add_control(
            'justify_content_text', [
                'label' => esc_html__( 'Justify content', 'instive' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'instive' ),
                'label_off' => esc_html__( 'No', 'instive' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
			'slider_items',
			[
				'label' =>  esc_html__( 'Main Slider', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slider_main_title' => esc_html__('RELIABLE INSURANCE FOR ANY PURPO SE', 'instive'),
                    ],
					[
                        'slider_main_title' => esc_html__('RELIABLE INSURANCE FOR ANY PURPO SE', 'instive'),
                    ],
				],
				'title_field' => '{{{ slider_main_title }}}',
			]
        );
       
        
        $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Slider Height', 'instive' ),
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
				'label' => esc_html__( 'Heading Type', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'h1'  => esc_html__( 'H1', 'instive' ),
					'h2' => esc_html__( 'H2', 'instive' ),
					'h3' => esc_html__( 'H3', 'instive' ),
					'h4' => esc_html__( 'H4', 'instive' ),
					'h5' => esc_html__( 'H5', 'instive' ),
					'h6' => esc_html__( 'H6', 'instive' ),
					'p' =>  esc_html__( 'P', 'instive' ),
				],
			]
      );
      $this->add_control(
			'title_position',
			[
				'label' => esc_html__( 'Title position', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'after',
				'options' => [
					'after'  => esc_html__( 'After', 'instive' ),
					'before' => esc_html__( 'Before', 'instive' ),
				
				],
			]
		);
      $this->end_controls_section();

        //style
        $this->start_controls_section('style_section',
            [
               'label'    => esc_html__( 'Style Section', 'instive' ),
               'tab'      => Controls_Manager::TAB_STYLE,
            ]
       ); 
     
          
       $this->add_control(
        'ts_slider_autoplay',
            [
            'label' => esc_html__( 'Autoplay', 'instive' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'instive' ),
            'label_off' => esc_html__( 'No', 'instive' ),
            'return_value' => 'yes',
            'default' => 'yes'
            ]
        );

        $this->add_control(
			'ts_slider_speed',
            [
               'label' => esc_html__( 'Slider Speed', 'instive' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter Slider Speed', 'instive' ),
               'default' => 5000,
               'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
		  );

        $this->add_control(
        'ts_slider_nav_show',
            [
            'label' => esc_html__( 'Nav show', 'instive' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'instive' ),
            'label_off' => esc_html__( 'No', 'instive' ),
            'return_value' => 'yes',
            'default' => 'yes'
            ]
        );
        $this->add_control(
         'ts_slider_dot_nav_show',
             [
             'label' => esc_html__( 'Dot nav', 'instive' ),
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
            'label'    => esc_html__( 'Slider Content ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
       );

       $this->add_control('slider_content',
            [
                'label'     => esc_html__('Slider content BG', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .slider-content ' => 'background: {{VALUE}};',
                
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_content_padding',
            [
                'label' => esc_html__( 'Slider content padding', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_content_radius',
            [
                'label' => esc_html__( 'Slider content Radius', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


       $this->add_control('slider_top_title_color',
            [
                'label'     => esc_html__('Top title color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .slider-content .slide-title > .banner-top-info' => 'color: {{VALUE}};',
                
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'top_title_typography',
				'label' => esc_html__( 'Top Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .slider-content .slide-title > .banner-top-info',
			]
        );
        
        $this->add_responsive_control(
            'top_title_margin',
            [
                'label' => esc_html__( 'Top TItle Margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .slide-title > .banner-top-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        
        $this->add_control('slider_text_color',
            [
               'label'     => esc_html__('Title color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .slider-content > .slide-title' => 'color: {{VALUE}};',
               
               ],
            ]
        );
      
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .slider-content > .slide-title',
			]
       );
       $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'TItle Margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content > .slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

       
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_sub_typography',
				'label' => esc_html__( 'Desc  Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .slider-content > p',
			]
        );
        $this->add_control('slider_sub_text_color',
            [
            'label'     => esc_html__('Desc color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                    '{{WRAPPER}} .slider-content > p' => 'color: {{VALUE}};',
                  
            
                ],
            ]
        );
   
      $this->end_controls_section();  

      $this->start_controls_section('button_style_section',
         [
            'label'    => esc_html__( 'Button', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('slider_button_text_color',
      [
      'label'     => esc_html__('Button color', 'instive'),
      'type'      => Controls_Manager::COLOR,
      'default'   => '',
      'selectors' => [
              '{{WRAPPER}} .slider-content .btn' => 'color: {{VALUE}};',
      
          ],
        ]
      );

      $this->add_control('slider_button_text_bgcolor',
         [
         'label'     => esc_html__('Button BG color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn' => 'background: {{VALUE}};',
         
            ],
         ]
      );
      $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'border',
            'label' => esc_html__( 'Border', 'instive' ),
            'selector' => '{{WRAPPER}} .slider-content .btn',
        ]
    );
 

      $this->add_control('slider_button_hover_text_bgcolor',
         [
         'label'     => esc_html__('Button BG Hover color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn:hover' => 'background: {{VALUE}};',
            ],
         ]
      );

      $this->add_control('slider_button_two_bgcolor',
         [
         'label'     => esc_html__('Button Two BG color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn-border' => 'background: {{VALUE}};',
            ],
         ]
      );
    
      $this->add_control('slider_button_two_color',
         [
         'label'     => esc_html__('Button Two color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn-border' => 'color: {{VALUE}};',
            ],
         ]
      );

      $this->add_control('slider_button_two_bdrcolor',
         [
         'label'     => esc_html__('Button Two Border color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn-border' => 'border: {{VALUE}};',
            ],
         ]
      );
      $this->add_control('slider_button_two_hov_bg_bdr',
         [
         'label'     => esc_html__('Button Two Hover BG color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .slider-content .btn-border:hover' => 'background-color: {{VALUE}};',
               '{{WRAPPER}} .slider-content .btn-border:hover' => 'border-color: {{VALUE}};',
            ],
         ]
      );

      $this->add_control('slider_button_hover_shadow_color',
          [
            'label'     => esc_html__('Btn Hover Shadow color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                  '{{WRAPPER}} .slider-content .btn:hover' => 'box-shadow: 5px 5px 0px 0px  {{VALUE}};',
            
               ],
         ]
      );

     
      $this->add_group_control(
        Group_Control_Border::get_type(),
         [
               'name' => 'btn_border',
               'label' => esc_html__( 'Border', 'instive' ),
               'selector' => '{{WRAPPER}} .slider-content .btn',
         ]
      );
   
      $this->add_responsive_control(
        'btn_margin',
         [
               'label' => esc_html__( 'TItle Margin', 'instive' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                  '{{WRAPPER}} .slider-content .slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
         ]
      );
   
      $this->end_controls_section(); 
   
      $this->start_controls_section('additional_style_section',
            [
               'label'    => esc_html__( 'Additional', 'instive' ),
               'tab'      => Controls_Manager::TAB_STYLE,
            ]
      );

      $this->add_responsive_control(
			'slider_padding',
			[
				'label' => esc_html__( 'Padding', 'instive' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );
 

      $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => esc_html__( 'Background', 'instive' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .banner-item::before',
        ]
    );

      $this->end_controls_section();  

   
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $slider_items = $settings['slider_items'];
        $title_position =  $settings['title_position'];

        $show_navigation   =   $settings["ts_slider_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'];

        $slide_controls    = [
         'show_nav'=>$show_navigation, 
         'dot_nav_show'=>$dot_nav_show, 
         'auto_nav_slide'=>$auto_nav_slide, 
         'ts_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 


    ?>
     <div class="hero-area main-slider owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
         <?php foreach($slider_items as $item): ?>
         
            <?php
               $bg_img = $item['slider_bg_image']['url']!=''?"style=background-image:url({$item['slider_bg_image']['url']})":'';
               $col = $item['content_align_text']=='mr-auto'?'col-lg-8':'col-lg-8'     
               ?>
               <div class="banner-item" <?php echo instive_kses($bg_img); ?>>
                  <div class="slider-table">
                     <div class="slider-table-cell">
                        <div class="container">
                           <div class="row <?php echo esc_attr($item["justify_content_text"]=='yes'?"justify-content-end slider-right-content":''); ?>">
                              <div class="<?php echo esc_attr($col); ?> <?php echo esc_attr($item["justify_content_text"]=='yes'?'':$item['content_align_text']); ?>">
                                 <div class="slider-content <?php echo esc_attr($item['content_align_text']);  ?>">
                                 
                                    <<?php echo esc_attr($settings['heading_type']); ?> class="slide-title">
                                       <?php if($title_position=="before"): ?> 
                                          <span class="banner-top-info"> <?php echo esc_html($item['slider_top_title']); ?> </span>
                                       <?php endif; ?>
                                       
                                       <?php echo esc_html($item['slider_main_title']); ?>

                                       <?php if($title_position=="after"): ?> 
                                          <span class="banner-top-info"> <?php echo esc_html($item['slider_top_title']); ?> </span>
                                       <?php endif; ?>

                                    </<?php echo esc_attr($settings['heading_type']); ?>>

                                    <p>
                                      <?php echo esc_html($item['slider_desc']); ?>
                                    </p>
                                    <div class="btn-wrapper">
                                       <?php if($item['button_text_one']!=''): ?>
                                          <a href="<?php echo esc_url($item['button_url_one']['url']); ?>" class="btn btn-primary"><i class="tsicon tsicon-chart-bars"></i> <?php echo esc_html($item['button_text_one']); ?> </a>
                                       <?php endif; ?>  
                                       <?php if($item['button_text_two']!=''): ?>
                                           <a href="<?php echo esc_url($item['button_url_two']['url']); ?>" class="btn btn-border"><i class="tsicon tsicon-user"></i> <?php echo esc_html($item['button_text_two']); ?> </a>
                                       <?php endif; ?>  
                                    </div>
                                 </div><!-- Slider content end -->
                              </div><!-- col end-->

                           </div><!-- row end-->
                        </div>
                        <!-- Container end -->
                     </div>
                     <!-- end slider table cell -->
                  </div>
                  <!-- end slider table -->
               </div>
               <!-- end  banner item -->
         
         <?php endforeach; ?> 
      </div>
    <?php  
    }
    protected function content_template() { }
}