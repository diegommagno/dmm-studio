<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_contact_form_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'instive-cf-form';
    }

    public function get_title() {
        return esc_html__( 'Instive Contact Form', 'instive' );
    }

    public function get_icon() { 
        return 'eicon-price-list';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Contact Content', 'instive'),
            ]
        );

       
        
       
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label'        => esc_html__( 'Title', 'instive' ),
				'type'         => \Elementor\Controls_Manager::TEXT,
				'default'      => esc_html__( 'List Title' , 'instive' ),
				'label_block'  => true,
			]
		);

	
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List title' , 'instive' ),
				'label_block' => true,
			]
        );
        
		$repeater->add_control(
			'list_desc', [
				'label' => esc_html__( 'Description', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List description' , 'instive' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'list_shortcode', [
				'label' => esc_html__( 'Shortcode', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List shortcode' , 'instive' ),
				'label_block' => true,
			]
        );
     

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Lits content', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				
				'title_field' => '{{{ list_title }}}',
			]
        );
        $this->end_controls_section();
  
        $this->start_controls_section('style_section',
            [
                'label'    => esc_html__( 'Style Section', 'instive' ),
                'tab'      => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control('box_text_color',
            [
               'label'		 => esc_html__( 'Tab menu color', 'instive' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .ts-tab .nav-tabs .nav-link' => 'color: {{VALUE}};',
                           
               ],
			  ]
        );
        $this->add_control('tab_menu_active',
            [
               'label'		 => esc_html__( 'Tab menu active color', 'instive' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .ts-tab .nav-tabs .nav-link.active'  => 'color: {{VALUE}};',
                  '{{WRAPPER}} .ts-tab .nav-tabs .nav-link.active'  => 'border-bottom-color: {{VALUE}};',
                           
               ],
			  ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Tab Menu Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ts-tab .nav-tabs .nav-link',
			]
       );


        $this->add_control('desc_color',
            [
               'label'		 => esc_html__( 'Tab desc color', 'instive' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .ts-form-wrap p'  => 'color: {{VALUE}};',
                           
               ],
			  ]
        );

        $this->add_control('box_btn_background_color',
           [
            'label'		 => esc_html__( 'Btn background color', 'instive' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ts-form-submit' => 'background: {{VALUE}};',
                            
				],
			 ]
        );
        $this->add_control('box_btn_background_hover_color',
           [
            'label'		 => esc_html__( 'Btn Background Hover color', 'instive' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ts-form-submit:hover' => 'background: {{VALUE}};',
                            
				],
			 ]
        );
      
        $this->end_controls_section();

    } //Register control end

    protected function render( ) { 
     
        $settings  =  $this->get_settings();
       
        $list = $settings['list'];
       
        ?>  
        

       <div class="ts-form-wrap ts-tab ts-form-wrap-home">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <?php foreach ($list as $key=> $value) { ?>
               
                    <li class="nav-item">
                       <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" data-toggle="tab" href="#<?php echo esc_attr($value['_id']); ?>" role="tab" aria-selected="true"><?php echo esc_html($value['list_title']); ?></a>
                    </li>

                <?php } ?>
            </ul>
           
            <div class="tab-content">    
            <!-- Tab panes -->
               <?php foreach ($list as $k=> $item) { ?>
               
                     <div class="tab-pane <?php echo esc_attr($k==0?'active':''); ?>" id="<?php echo esc_attr($item['_id']); ?>" role="tabpanel">
                        <p><?php echo esc_html($item['list_desc']); ?></p>
                           <?php 
                              echo do_shortcode( $item['list_shortcode'] );
                           ?>    
                     </div>
                     
               <?php } ?>
            </div>
            
      
            
            <!-- extra  content -->
        </div>
    <?php  
    }
    protected function content_template() { }

   
}