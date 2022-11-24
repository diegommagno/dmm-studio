<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Quote_Slider_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-quote-slider';
    }

    public function get_title() {

        return esc_html__( 'Instive Quote slider ', 'instive' );

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
                'label' => esc_html__('Quote Slider Settings', 'instive'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'btn_icon',
            [
                'label' => esc_html__('Icon', 'instive'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-envelope',
                    'library' => 'solid',
				],
            ]
        );

        $repeater->add_control(
			'title', [
                'label' => esc_html__('Title','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('For you and your family', 'instive'),
                'label_block'  => true,
			]
        );
        
        $repeater->add_control(
			'description', [
                'label' => esc_html__('Description','instive'),
                'type'         => Controls_Manager::TEXT,
                'default'      => esc_html__('Our ability equipped program empowers life', 'instive'),
                'label_block'  => true,
			]
        );

        $repeater->add_control(
            'btn_text',
            [
                'label'         => esc_html__('Button Text', 'instive'),
                'type'          => Controls_Manager::TEXT,
                'default' => esc_html__('Get a quote', 'instive'),
            ]
        );
        $repeater->add_control(
            'popup_shorcode',
            [
                'label'         => esc_html__('Shortcode For Popup', 'instive'),
                'type'          => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder'   => esc_html__('[enter your shortcode]', 'instive'),
            ]
        );
        
        $this->add_control(
			'items',
			[
				'label' =>  esc_html__( 'Quote Slider', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__('For you and your family', 'instive'),
                    ],
					[
                        'title' => esc_html__('For you and your family', 'instive'),
                    ],
				],
				'title_field' => '{{{ title }}}',
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
        'ts_quote_autoplay',
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
			'ts_quote_speed',
            [
               'label' => esc_html__( 'Quote speed', 'instive' ),
               'type' => \Elementor\Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter quote Speed', 'instive' ),
               'default' => 5000,
               'condition' => ["ts_quote_autoplay" => ['yes']],
            ]
		  );

        $this->add_control(
        'ts_quote_nav_show',
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
         'ts_quote_dot_nav_show',
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
            'label'    => esc_html__( 'Content  Styling', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
       );

       $this->add_control('quote_title_color',
            [
                'label'     => esc_html__('Quote title color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .single-quote-wrap .ts-title' => 'color: {{VALUE}};',
                ],
            ]
        );
       $this->add_control('quote_title_hover_color',
            [
                'label'     => esc_html__('Quote title hover color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                        '{{WRAPPER}} .single-quote-wrap .ts-title:hover ' => 'color: {{VALUE}};',
                
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quote_title_typography',
				'label' => esc_html__( 'Quote Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-quote-wrap .ts-title',
			]
        );

        $this->add_responsive_control(
            'quote_title_margin',
            [
                'label' => esc_html__( 'Top Title Margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}}  .single-quote-wrap .ts-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        
        $this->add_control('quote_designation_color',
            [
               'label'     => esc_html__('Quote designation color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                     '{{WRAPPER}} .single-quote-wrap p' => 'color: {{VALUE}};',
               
               ],
            ]
        );
     
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quote_designation_typography',
				'label' => esc_html__( 'Quote designation Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .single-quote-wrap p',
			]
       );
       $this->add_responsive_control(
            'quote_designation_margin',
            [
                'label' => esc_html__( 'Quote designation margin', 'instive' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-quote-wrap p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
                'quote_image_margin',
                [
                    'label' => esc_html__( 'Quote Image Margin', 'instive' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-quote-wrap .quote-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );

   
    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => esc_html__( 'Box Shadow', 'instive' ),
            'selector' => '{{WRAPPER}} .single-quote-wrap img',
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
            'selector' => '{{WRAPPER}} .single-quote-wrap .quote-img',
        ]
    );
    $this->add_responsive_control(
        'border_radius',
        [
            'label' => esc_html__( 'Border radius', 'instive' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .single-quote-wrap .quote-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
      $this->end_controls_section();

    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $items = $settings['items'];
        
        $show_navigation   =      $settings["ts_quote_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =      $settings['ts_quote_autoplay'];
        $dot_nav_show      =      $settings['ts_quote_dot_nav_show'];
        $ts_slider_speed   =      $settings['ts_quote_speed'];
        $ts_slider_item    =      $settings['ts_slider_item'];

        $controls    = [
            'show_nav'=>$show_navigation, 
            'dot_nav_show'=>$dot_nav_show, 
            'auto_nav_slide'=>$auto_nav_slide, 
            'ts_slider_speed'=>$ts_slider_speed, 
            'ts_slider_item'=>$ts_slider_item, 
        ];
   
        $controls = \json_encode($controls); 
     

    ?>
     
    <div class="ts-quote-slider owl-carousel" data-controls="<?php echo esc_attr($controls); ?>">
        <?php $i = 0 ; ?>
        <?php foreach($items as $item): ?>
        
        <div class="col text-center">
            <div class="quote-item">
                <div class="quote-icon">
                    <?php \Elementor\Icons_Manager::render_icon($item['btn_icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <h3><?php echo esc_html($item['title']); ?></h3>
                <p><?php echo esc_html($item['description']); ?></p>
                <a href="#popup<?php echo esc_attr($i); ?>" class="instive-popup btn btn-primary" data-effect="instivebounceInDown">
                    <?php echo esc_html($item['btn_text']); ?>
                </a>
                
            </div>
            <div id="popup<?php echo esc_attr($i); ?>" class="container mfp-hide instive-shortcode-popup instive_animated instivebounceInDown">
                <div class="instive-popup-wrap">
                    <?php echo do_shortcode($item['popup_shorcode']); ?>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; ?> 
    </div>

    <?php  
    }
    protected function content_template() { }
}