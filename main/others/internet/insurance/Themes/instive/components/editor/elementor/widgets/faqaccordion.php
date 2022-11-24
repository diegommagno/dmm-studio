<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Faq_Accordian_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-faq-accordian';
    }

    public function get_title() {

        return esc_html__( 'Instive Accordian', 'instive' );

    }

    public function get_icon() { 
        return 'icon-edit';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Accordian settings', 'instive'),
            ]
        );
         
       
		$this->add_control(
			'faq_image',
			[
				'label' => esc_html__( 'Choose Image', 'instive' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
      );
      
      $this->add_control(
			'faq_title',
			[
				'label' => esc_html__( 'Title', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'I love my passport', 'instive' ),
			]
      );
      
      $this->add_control(
			'faq_details',
			[
				'label' => esc_html__( 'Description ', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter description', 'instive' ),
			]
      );
      

      $this->add_responsive_control(
            'text_align', [
               'label'			 => esc_html__( 'Alignment', 'instive' ),
               'type'			 => Controls_Manager::CHOOSE,
               'options'		 => [
   
                  'left'		 => [
                     
                     'title'	 => esc_html__( 'Left', 'instive' ),
                 'icon'	 => 'fa fa-align-left',
                  
                  ],
               'center'	     => [
                     
                     'title'	 => esc_html__( 'Center', 'instive' ),
                 'icon'	 => 'fa fa-align-center',
                  
                  ],
               'right'		 => [
   
                 'title'	 => esc_html__( 'Right', 'instive' ),
                     'icon'	 => 'fa fa-align-right',
                     
                  ],
               'justify'	 => [
   
                 'title'	 => esc_html__( 'Justified', 'instive' ),
                     'icon'	 => 'fa fa-align-justify',
                     
                  ],
               ],
               'default'		 => 'center',
               
               'selectors' => [
                  '{{WRAPPER}} .faq-heading,{{WRAPPER}} .faq-content' => 'text-align: {{VALUE}};',
   
               ],
            ]
           );//Responsive control end   

      $this->end_controls_section();

      $this->start_controls_section('title_style_section',
         [
            'label'    => esc_html__( 'Title ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('title_color',
         [
            'label'     => esc_html__('color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .ts-faq-single .faq-heading .ts-title' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control('title_hover_color',
         [
            'label'     => esc_html__('Hover color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .ts-faq-single:hover .faq-heading .ts-title' => 'color: {{VALUE}};',
            ],
         ]
      );

   
      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .ts-faq-single .faq-heading .ts-title',
			]
        );

      $this->end_controls_section();

      $this->start_controls_section('details_style_section',
         [
            'label'    => esc_html__( 'Description ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('desc_color',
            [
               'label'     => esc_html__('color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .ts-faq-single .faq-content p' => 'color: {{VALUE}};',
               
               ],
            ]
      );
      $this->add_control('desc_hover_color',
            [
               'label'     => esc_html__('Hover color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .ts-faq-single:hover .faq-content p' => 'color: {{VALUE}};',
               
               ],
            ]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Desc Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .ts-faq-single .faq-content p',
			]
        );

      $this->end_controls_section();

      $this->start_controls_section('indecator_style_section',
         [
            'label'    => esc_html__( 'Indecator ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('indicator_color',
      [
            'label'     => esc_html__('Color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .ts-faq-single .indecator i' => 'color: {{VALUE}};',
            
            ],
         ]
      );
      $this->add_control('indicator_hover_color',
      [
            'label'     => esc_html__('Hover color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .ts-faq-single:hover .indecator i' => 'color: {{VALUE}};',
            
            ],
         ]
      );

      $this->end_controls_section();

      $this->start_controls_section('box_style_section',
         [
            'label'    => esc_html__( 'Box ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('box_color',
      [
            'label'     => esc_html__('Hover color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .ts-faq-single:hover ' => 'background: {{VALUE}};',
                     '{{WRAPPER}} .ts-faq-single:hover::before ' => 'background: {{VALUE}};',
            
            ],
         ]
      );

      $this->end_controls_section();
     
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $id =  $this->get_id();
     
    ?>
      <div class="ts-faq">
         <div class="ts-faq-single">
            <div class="faq-heading collapsed" data-toggle="collapse" data-target="#<?php echo esc_attr($id); ?>-faqone" aria-expanded="true">
                  <div class="faq-img">
                     <img src="<?php echo esc_url($settings['faq_image']['url']); ?>" alt=" <?php echo esc_attr($settings['faq_title']); ?> ">
                  </div>
                  <h3 class="ts-title"> <?php echo esc_html($settings['faq_title']); ?> </h3>
                  <div class="indecator">
                     <i class="plus fa fa-plus"></i>
                     <i class="minus fa fa-minus"></i>
                  </div>
            </div> 
            <div class="faq-content collapse" id="<?php echo esc_attr($id); ?>-faqone" data-parent="#faqaccordion">
                  <p> <?php echo esc_html($settings['faq_details']); ?> </p>
            </div>
         </div>
      </div>   

     

    <?php  
    }
    protected function content_template() { }
}