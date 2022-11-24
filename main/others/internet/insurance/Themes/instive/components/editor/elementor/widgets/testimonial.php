<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Testimonial_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-testimonial';
    }

    public function get_title() {

        return esc_html__( 'Instive testimonial', 'instive' );

    }

    public function get_icon() { 
        return 'fa fa-quote-right';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Testimonial settings', 'instive'),
            ]
        );

      $this->add_control(
			'testimonial_style',
			[
				'label' => esc_html__( 'Style', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'instive' ),
               'style2'  => esc_html__( 'Style 2', 'instive' ),
               'style3'  => esc_html__( 'Style 3', 'instive' ),
				
				],
			]
      );

      $this->add_control(
			'ts_bg_image',
			[
				'label' => esc_html__( 'Choose image', 'instive' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => ["testimonial_style" => ['style3']],
			]
      );

      $this->add_control(
			'title_tag',
			[
				'label' => esc_html__( 'Title tag ', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__( 'Our clients say', 'instive' ),
            'condition' => ["testimonial_style" => ['style3']],
			]
      );

      $this->add_control(
         'dot_nav_left',
             [
             'label' => esc_html__( 'Dot nav left', 'instive' ),
             'type' => \Elementor\Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'instive' ),
             'label_off' => esc_html__( 'No', 'instive' ),
             'return_value' => 'yes',
             'default' => 'no',
             'condition' => ["testimonial_style" => ['style1']],
             ]
         );
      
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'ts_name', [
				'label' => esc_html__( 'Name', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Franklin' , 'instive' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ts_designation', [
				'label' => esc_html__( 'Designation', 'instive' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'CEO,wpmet' , 'instive' ),
				'show_label' => true,
			]
      );
      
      $repeater->add_control(
			'ts_image', [
				'label' => esc_html__( 'Choose Image', 'instive' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
      );
      
      $repeater->add_control(
			'ts_details', [
				'label' => esc_html__( 'Description', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
      );

		$this->add_control(
			'ts_list',
			[
				'label' => esc_html__( 'Testimonial List', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
          	'title_field' => '{{{ ts_name }}}',
			]
		);
  

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
                     '{{WRAPPER}} .author-content h3,{{WRAPPER}} .testimonial-meta .ts-title' => 'color: {{VALUE}};',
            ],
         ]
      );

   
      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author-content h3,{{WRAPPER}} .testimonial-meta .ts-title',
			]
        );

      $this->end_controls_section();

      $this->start_controls_section('desg_style_section',
         [
            'label'    => esc_html__( 'Designation ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('desg_color',
            [
               'label'     => esc_html__('color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .author-content p,{{WRAPPER}} .testimonial-meta span' => 'color: {{VALUE}};',
               
               ],
            ]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desg_typography',
				'label' => esc_html__( 'Designation Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author-content p,{{WRAPPER}} .testimonial-meta span',
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
                     '{{WRAPPER}} .ts-testimonial-content p,{{WRAPPER}} .ts-testimonial-content,{{WRAPPER}} .testimonial-content > p' => 'color: {{VALUE}};',
            
            ],
         ]
   );

   $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
         'name' => 'desc_typography',
         'label' => esc_html__( 'Desc Typography', 'instive' ),
         'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
             'selector' => '{{WRAPPER}} .ts-testimonial-content p,{{WRAPPER}} .testimonial-content > p',
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
                  '{{WRAPPER}} .ts-testimonial-slide,{{WRAPPER}} .testimonial-content > p' => 'text-align: {{VALUE}};',

         ],
      ]
     );//Responsive control end   


      $this->end_controls_section();

      $this->start_controls_section('additional_tag_style_section',
      [
         'label'    => esc_html__( 'Additional ', 'instive' ),
         'tab'      => Controls_Manager::TAB_STYLE,
         'condition' => ["testimonial_style" => ['style3']],
      ]
   );

   $this->add_control('title_tag_color',
         [
            'label'     => esc_html__('Title tag color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .testimoial-wrap .testimonial-content h3.ts-title' => 'color: {{VALUE}};',
            
            ],
         ]
   );

   
   $this->add_control('title_tag_bgcolor',
         [
            'label'     => esc_html__('Title tag bgcolor', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .testimoial-wrap .testimonial-content h3.ts-title' => 'background: {{VALUE}};',
            
            ],
         ]
   );
   $this->add_control('quota_tag_bgcolor',
         [
            'label'     => esc_html__('Quota tag color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .testimoial-wrap .testimonial-content p:before' => 'color: {{VALUE}};',
            
            ],
         ]
   );
   $this->add_control('dot_nav_bgcolor',
         [
            'label'     => esc_html__('Dot nav color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot' => 'background: {{VALUE}};',
            
            ],
         ]
   );
   $this->add_control('dot_active_nav_bgcolor',
         [
            'label'     => esc_html__('Dot nav active color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot.active' => 'background: {{VALUE}};',
            
            ],
         ]
   );
   $this->add_control('img_border_bgcolor',
         [
            'label'     => esc_html__('Image border color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .testimoial-wrap .testimonial-content .testimonial-author-img' => 'border-color: {{VALUE}};',
            
            ],
         ]
   );



   $this->end_controls_section();
     
     
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $testimonial_style = 'style1';
        $testimonial_style = $settings['testimonial_style'];
        $testimonial_list  = $settings['ts_list'];
        $dot_nav = $settings['dot_nav_left']!='yes'?'dot-style2':'';
     
    ?>
     <?php if($testimonial_style=='style1'): ?>

         <div class="ts-testimonial ts-testimonial-four justify-content-center">
            <div class="ts-testimonial-slider list-unstyled owl-carousel <?php echo esc_attr($dot_nav); ?>">
               <?php foreach($testimonial_list as $item): ?>
                     <div class="ts-testimonial-author text-center">
                         <div class="ts-testimonial-content">
                         <i class="icon icon-quote1"></i>
                              <p><?php echo esc_html($item['ts_details']); ?> </p>
                        </div>
                        <div class="thumb">
                           <?php if(isset($item['ts_image']['url'])): ?>
                              <div class="thumbanail-image" style="background-image: url('<?php echo esc_url($item['ts_image']['url']); ?>')"></div>
                           <?php endif; ?>
                        </div>
                        <div class="author-content">
                           <h3><?php echo esc_html($item['ts_name']); ?></h3>
                           <p><?php  echo esc_html($item['ts_designation']); ?></p>
                        </div>
                     
                     </div>
               <?php endforeach; ?>  
            </div>
         </div>

      <?php elseif($testimonial_style=="style2"): ?> 
         <div class="ts-testimonial ts-testimonial-three justify-content-center">
               <div class="ts-testimonial-slider-three owl-carousel">
                        <?php foreach($testimonial_list as $item_content): ?>
                           <div class="ts-testimonial-slide" >
                              <div class="content-wrap">
                                 <div class="ts-testimonial-content">
                                    <p>  <?php echo esc_html($item_content['ts_details']); ?>   </p>
                                 </div>
                                 <div class="ts-testimonial-author d-block">
                                       <div class="author-content">
                                          <h3> <?php echo esc_html($item_content['ts_name']); ?> </h3>
                                          <p>  <?php echo esc_html($item_content['ts_designation']); ?> </p>
                                       </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>   
                          
                     </div>
                     <div class="testimonial-thumb">
                           <ul class="list-unstyled testimonial-controls">
                           <?php foreach($testimonial_list as $key => $item): ?>
                              
                              <li class="thumb thumb-a" data="<?php echo esc_attr($key); ?>">
                                <?php if(isset($item['ts_image']['url'])): ?>
                                    <div class="thumbanail-image" style="background-image: url('<?php echo esc_url($item['ts_image']['url']); ?>')"></div>
                                 <?php endif; ?>  
                              </li>
                            
                           <?php endforeach; ?>   
                             
                           </ul>
                     </div>
         </div>
      
      <?php elseif($testimonial_style=="style3"): ?>  
       
         <div class="mx-auto testimonial-slider owl-carousel">
         <?php foreach($testimonial_list as $item):  ?>
            <div class="testimoial-wrap">
               <?php  $bg_img = sprintf('style="background-image:url(%s)"',esc_url($settings['ts_bg_image']['url'])); ?> 
               <div class="testimonial-content"
                 <?php  echo instive_kses($settings['ts_bg_image']['url']!=''?instive_kses($bg_img):''); ?>>
                  <div class="testimonial-author-img">
                     <?php if(isset($item['ts_image']['url'])): ?>
                        <div class="thumbanail-image" style="background-image: url('<?php echo esc_url($item['ts_image']['url']); ?>')"></div>
                     <?php endif; ?>   
                  </div>
                  <h3 class="ts-title">
                     <?php echo esc_html($settings['title_tag']); ?>
                  </h3>
                  <p>
                     <?php echo esc_html($item['ts_details']); ?>
                  </p>

                  <div class="testimonial-meta">
                     <h4 class="ts-title"><?php echo esc_html($item['ts_name']); ?>  </h4>
                     <span><?php echo esc_html($item['ts_designation']); ?> </span>
                  </div>

               </div>
            </div>
         <?php endforeach; ?>   
         </div>
       
      <?php endif; ?>
     

    <?php  
    }
    protected function content_template() { }
}