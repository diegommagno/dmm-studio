<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Back_To_Top_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-back-to-top';
    }

    public function get_title() {

        return esc_html__( 'Instive back to top', 'instive' );

    }

    public function get_icon() { 
        return 'eicon-spacer';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('back to top settings', 'instive'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'button_style',
			[
				'label' => esc_html__( 'Back to Style', 'instive'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [

					'style1'  => esc_html__( 'Style 1', 'instive'),
                    'style2'  => esc_html__( 'Style 2', 'instive')
                    
                ],
                
			]
		);
    

        $this->add_control(
            'scroll_top_field_bg_color',
            [
                'label' => esc_html__('Scroll bg color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .scroll-button a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Scroll color', 'instive'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .scroll-button a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
			'btn_align', [
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
			
				],
            'default'		 => 'center',
            'selectors' => [
                     '{{WRAPPER}} .ts-scroll-box .scroll-button' => 'text-align: {{VALUE}};',

				],
			]
        );//Responsive control end

		$this->end_controls_section();


     
     
    }

    protected function render( ) { 
        
        $settings = $this->get_settings();

    

    ?>
     <?php if($settings['button_style']=='style1'): ?> 
      <div class="ts-scroll-box">
            <div class="scroll-button">
               <a href="#" class="scroll-top" aria-hidden="true">
                   <i class="tsicon tsicon-arrow-up"></i>
               </a>
            </div>
      </div>
    <?php endif; ?> 

     <?php if($settings['button_style']=='style2'): ?> 
      <div class="ts-scroll-box style2">
            <div class="scroll-button">
                <a href="#" class="scroll-top" aria-hidden="true">
                    <i class="tsicon tsicon-arrow-up"></i>
                </a>
            </div>
      </div>
    <?php endif; ?> 

    <?php  
    }
    protected function content_template() { }
}