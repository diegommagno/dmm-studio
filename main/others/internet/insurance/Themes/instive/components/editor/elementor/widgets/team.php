<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Team_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-team';
    }

    public function get_title() {
        return esc_html__( 'Instive team', 'instive' );
    }

    public function get_icon() { 
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return [ 'instive-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Team settings', 'instive'),
            ]
        );
         
       
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Choose Image', 'instive' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
      );
      
      $this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter team name', 'instive' ),
			]
      );
      
      $this->add_control(
			'team_designation',
			[
				'label' => esc_html__( 'Designation ', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter designation', 'instive' ),
			]
      );
      
      $this->add_control(
         'ts_image_fit',
             [
             'label' => esc_html__( 'Image fit', 'instive' ),
             'type' => \Elementor\Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'instive' ),
             'label_off' => esc_html__( 'No', 'instive' ),
             'return_value' => 'yes',
             'default' => 'no',
             
             ]
      );
      
      $this->add_control(
         'social_enable',
             [
             'label' => esc_html__( 'Social enable', 'instive' ),
             'type' => \Elementor\Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'instive' ),
             'label_off' => esc_html__( 'No', 'instive' ),
             'return_value' => 'yes',
             'default' => 'no',
             ]
      );

      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_title', [
				'label' => esc_html__( 'Title', 'instive' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook' , 'instive' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'social_url', [
				'label' => esc_html__( 'Url', 'instive' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_label' => false,
			]
      );
      
      $repeater->add_control(
			'social_icon', [
				'label' => esc_html__( 'Icon', 'instive' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
				'show_label' => false,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' => esc_html__( 'Social List', 'instive' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
          	'title_field' => '{{{ social_title }}}',
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
                        '{{WRAPPER}} .single-team-wrap' => 'text-align: {{VALUE}};',
   
               ],
            ]
           );//Responsive control end   

      $this->end_controls_section();

      $this->start_controls_section('name_style_section',
         [
            'label'    => esc_html__( 'Name ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('name_color',
         [
            'label'     => esc_html__('color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .single-team-wrap .ts-title' => 'color: {{VALUE}};',
            
            ],
         ]
      );

      $this->add_control('name_hv_color',
         [
            'label'     => esc_html__('Hover color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                     '{{WRAPPER}} .single-team-wrap .ts-title:hover' => 'color: {{VALUE}};',
            
            ],
         ]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => esc_html__( 'Name Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-team-wrap .ts-title',
			]
        );

      $this->end_controls_section();

      $this->start_controls_section('designation_style_section',
         [
            'label'    => esc_html__( 'Designation ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control('designation_color',
            [
               'label'     => esc_html__('color', 'instive'),
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
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-team-wrap p',
			]
      );

      $this->end_controls_section();

      $this->start_controls_section('img_style_section',
         [
            'label'    => esc_html__( 'Image ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
      );
      
      $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Image Shadow', 'instive' ),
				'selector' => '{{WRAPPER}} .team-img',
			]
      ); 

      $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'label' => esc_html__( 'Image Border', 'instive' ),
				'selector' => '{{WRAPPER}} .team-img',
			]
		);
      
      $this->end_controls_section();

      $this->start_controls_section('social_style_section',
        [
         'label'    => esc_html__( 'Social  ', 'instive' ),
         'tab'      => Controls_Manager::TAB_STYLE,
        ]
      );

      
      $this->add_control('social_color',
            [
               'label'     => esc_html__('color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .single-team-wrap-style2 .team-social li a' => 'color: {{VALUE}};',
               
               ],
            ]
      );

      $this->add_control('social_hv_color',
            [
               'label'     => esc_html__('Hover color', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .single-team-wrap-style2 .team-social li:hover a' => 'color: {{VALUE}};',
               
               ],
            ]
      );
      $this->add_control('social_hv_bg_color',
            [
               'label'     => esc_html__('bgcolor', 'instive'),
               'type'      => Controls_Manager::COLOR,
               'default'   => '',
               'selectors' => [
                        '{{WRAPPER}} .single-team-wrap-style2 .team-social li a:hover' => 'background: {{VALUE}};',
               
               ],
            ]
      );

      $this->end_controls_section(); 
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $team_image = $settings['team_image'];
        $team_name = $settings['team_name'];
        $team_designation = $settings['team_designation'];
        $fit_cls = $settings['ts_image_fit']=='yes'?'fit-image':'';
        $social = $settings['social_enable']=='yes'?'single-team-wrap-style2':'';


    ?>
      <div class="team-item">
         <div class="single-team-wrap <?php echo esc_attr($social); ?>">
            <div class="team-img">
                  <img class="img-fluid <?php echo esc_attr($fit_cls); ?>" src="<?php echo esc_url($team_image['url']); ?>" alt="<?php echo esc_attr($team_name); ?>">
                  <?php if($settings['social_enable']=='yes'): ?>
                     <ul class="team-social">
                        <?php foreach($settings['social_list'] as $item): ?>
                           <li>
                              <a href="<?php echo esc_url($item['social_url']['url']); ?>" class="<?php echo esc_attr($item['social_icon']); ?>"></a>
                           </li>
                        <?php endforeach; ?>   
                        </ul>
                  <?php endif; ?>   
            </div>
            <h3 class="ts-title"><?php echo esc_html($team_name); ?></h3>
            <p><?php echo esc_html($team_designation); ?></p>
         </div>
      </div>

    <?php  
    }
    protected function content_template() { }
}