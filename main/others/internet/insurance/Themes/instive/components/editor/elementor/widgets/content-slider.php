<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Content_Slider_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-content-slider';
    }

    public function get_title() {

        return esc_html__( 'Instive Content slider', 'instive' );

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

        $this->add_control(
			'style',
			[
				'label' => esc_html__( 'Slider Style', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'instive' ),
					'style2'  => esc_html__( 'Style 2', 'instive' ),
				],
			]
         );
         
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'content_slider_main_title', [
				'label' => esc_html__('Slider Main Title','instive'),
                'type'         => Controls_Manager::TEXT,
                'label_block'  => true,
			]
		);
        $repeater->add_control(
			'content_slider_desc', [
                'label' =>     esc_html__('Slider description','instive'),
                'type'         => Controls_Manager::TEXTAREA,
                'default'      => esc_html__('Since 1914, the New York Mutual Insurance Company has been serving policyholders protecting businesses       
                ', 'instive'),
                'label_block'  => true,
			]
        );
        $repeater->add_control(
			'button_text_one', [
                'label'        => esc_html__('Button Text one', 'instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Learn More ', 'instive'),
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
        
        $this->add_control(
			'content_slider_items',
			[
				'label' =>  esc_html__( 'Content Slider', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'content_slider_main_title' => esc_html__('Protect what you love', 'instive'),
                    ],
					[
                        'content_slider_main_title' => esc_html__('Protect what you love', 'instive'),
                    ],
				],
				'title_field' => '{{{ content_slider_main_title }}}',
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
				'default' => 'h2',
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
      $this->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Image', 'instive' ),
				'type'        => Controls_Manager::MEDIA,
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
        'ts_content_slider_autoplay',
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
			'ts_content_slider_speed',
            [
               'label' => esc_html__( 'Slider Speed', 'instive' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter Slider Speed', 'instive' ),
               'default' => 5000,
               'condition' => ["ts_content_slider_autoplay" => ['yes']],
            ]
		  );

        $this->add_control(
        'ts_content_slider_nav_show',
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
         'ts_content_slider_dot_nav_show',
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
            'label'    => esc_html__( 'Title ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
       );

       $this->add_control('slider_top_title_color',
            [
                'label'     => esc_html__('Title color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .intro-content-area .intro-wrap .section-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .intro-wrap .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .intro-content-area .intro-wrap .section-title',
                'selector' => '{{WRAPPER}} .intro-wrap .section-title',
			]
        );
        
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .intro-content-area .intro-wrap .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .intro-wrap .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        
        $this->add_control('content_text_color',
            [
               'label'     => esc_html__('Content color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .intro-wrap p' => 'color: {{VALUE}};',
               
               ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_text_typography',
				'label' => esc_html__( 'Content  Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .intro-wrap p',
			]
        );
       

      $this->end_controls_section();  

      $this->start_controls_section('button_style_section',
         [
            'label'    => esc_html__( 'Button ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('slider_button_text_color',
      [
      'label'     => esc_html__('Button color', 'instive'),
      'type'      => Controls_Manager::COLOR,
      'default'   => '',
      'selectors' => [

            '{{WRAPPER}} .intro-wrap .btn.btn-primary' => 'color: {{VALUE}};',
      
          ],
        ]
      );

      $this->add_control('slider_button_text_bgcolor',
         [
         'label'     => esc_html__('Button BG color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .intro-wrap .btn.btn-primary' => 'background: {{VALUE}};',
         
            ],
         ]
      );

      $this->add_control('slider_button_hover_text_bgcolor',
         [
         'label'     => esc_html__('Button BG Hover color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
               '{{WRAPPER}} .intro-wrap .btn.btn-primary:hover' => 'background: {{VALUE}};',
         
            ],
         ]
      );

      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'btn_typography',
            'label' => esc_html__( 'Button Typography', 'instive' ),
            'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .intro-wrap .btn.btn-primary',
        ]
    );

      $this->add_group_control(
        Group_Control_Border::get_type(),
         [
               'name' => 'btn_border',
               'label' => esc_html__( 'Border', 'instive' ),
               'selector' => '{{WRAPPER}} .intro-wrap .btn.btn-primary',
         ]
      );
   
      $this->add_responsive_control(
        'btn_margin',
         [
               'label' => esc_html__( 'Button Margin', 'instive' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                  '{{WRAPPER}} .intro-wrap .btn.btn-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .intro-content-area .intro-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );

      $this->end_controls_section();  
    

    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $slider_items = $settings['content_slider_items'];
        $show_navigation   =  $settings["ts_content_slider_nav_show"]=="yes"? true:false;
        $auto_nav_slide    =  $settings['ts_content_slider_autoplay'];
        $dot_nav_show      =  $settings['ts_content_slider_dot_nav_show'];
        $ts_slider_speed   =  $settings['ts_content_slider_speed'];

        $slide_controls    = [
         'show_nav'=>$show_navigation, 
         'dot_nav_show'=>$dot_nav_show, 
         'auto_nav_slide'=>$auto_nav_slide, 
         'ts_content_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 
        $slider_image = $settings['slider_image']['url'];
    ?>
    <?php if($settings['style']=='style1'): ?>   
    <div class="slider-section">
        <div class="image-box">
            <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url($slider_image); ?>";>
        </div>
        <div class="row align-items-center justify-content-md-end">
                <div class="col-md-6">
                    <div class="content-slider owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
                            
                    <?php foreach($slider_items as $item): ?>   
                    
                        <div class="slide-item">
                                <div class="intro-wrap section-padding">
                    
                                <<?php echo esc_attr($settings['heading_type']); ?> class="section-title">
                                    
                                    <?php echo esc_html($item['content_slider_main_title']); ?>

                                </<?php echo esc_attr($settings['heading_type']); ?>>

                                <p>
                                    <?php echo instive_kses($item['content_slider_desc']); ?>
                                </p>
                                <?php if($item['button_text_one']!=''): ?>
                                    <a href="<?php echo esc_url($item['button_url_one']['url']); ?>" class="btn btn-primary"><i class="tsicon tsicon-button_icon03"></i> <?php echo esc_html($item['button_text_one']); ?> </a>
                                <?php endif; ?>  
                                </div>
                            </div>
                            <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($settings['style']=='style2'): ?>  
    <div class="content-slider content-slider-two owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
                        
                <?php foreach($slider_items as $item): ?>   
                
                    <div class="slide-item">
                            <div class="intro-wrap content-wrap">
                
                            <<?php echo esc_attr($settings['heading_type']); ?> class="section-title">
                                
                                <?php echo esc_html($item['content_slider_main_title']); ?>

                            </<?php echo esc_attr($settings['heading_type']); ?>>

                            <p>
                                <?php echo instive_kses($item['content_slider_desc']); ?>
                            </p>
                            <?php if($item['button_text_one']!=''): ?>
                               <div class="button-area">
                                    <a href="<?php echo esc_url($item['button_url_one']['url']); ?>" class="btn btn-primary"><i class="tsicon tsicon-button_icon03"></i> <?php echo esc_html($item['button_text_one']); ?> </a>
                               </div>
                            <?php endif; ?>  
                            </div>
                        </div>
                        <?php endforeach;?>
                </div>
    <?php endif; ?>
    <?php  
    }
    protected function content_template() { }
}