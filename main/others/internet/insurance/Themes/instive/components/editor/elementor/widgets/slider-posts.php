<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Instive_Slider_Post_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'instive-post-slider';
    }

    public function get_title() {

        return esc_html__( 'Instive Post slider', 'instive' );

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
                'label' => esc_html__('Post Slider settings', 'instive'),
            ]
        );

        $this->add_control('category',
        [
           'label'     => esc_html__( 'Category', 'instive' ),
           'type' => \Elementor\Controls_Manager::SELECT2,
           'multiple' => true,
           'options'   => $this->getCategories(),
         
        
        ]
      );
      
       $this->add_control(
         'post_title_crop',
         [
           'label'         => esc_html__( 'Post Title limit', 'instive' ),
           'type'          => Controls_Manager::NUMBER,
           'default' => '35',
          
         ]
       ); 
      
     ; 

      $this->add_control(
         'post_content_crop',
         [
           'label'         => esc_html__( 'Post content limit', 'instive' ),
           'type'          => Controls_Manager::NUMBER,
           'default' => '35',
          
         ]
       ); 

      $this->add_control(
         'show_desc',
            [
               'label' => esc_html__('Show desc', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'yes',
               
            ]
      );
      $this->add_control(
         'readmore',
            [
               'label' => esc_html__('Read more', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'yes',
               'condition' => ["show_desc" => ['yes']],
               
            ]
      );
      
      $this->add_control(
         'post_readmore_text',
         [
           'label'         => esc_html__( 'Read more text', 'instive' ),
           'type'          => Controls_Manager::TEXT,
           'default' => 'read more',
           'condition' => ["readmore" => ['yes'],"show_desc" => ['yes']],
         ]
       ); 

      $this->add_control(
         'show_date',
            [
               'label' => esc_html__('Show Date', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'yes',
               
            ]
      );

      $this->add_control(
         'show_cat',
            [
               'label' => esc_html__('Show Category', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'no',
               
            ]
      );

      $this->add_control(
         'show_author',
            [
               'label' => esc_html__('Show Author', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'no',
               
            ]
      );



      $this->add_control('count',
            [
               'label'         => esc_html__( 'Count', 'instive' ),
               'type'          => Controls_Manager::NUMBER,
               'default'       => '4',
             
            ]
       );

       $this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'instive' ),
				'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
           
				'options' => [
					'DESC'  => esc_html__( 'Desc', 'instive' ),
               'ASC' => esc_html__( 'Asc', 'instive' ),
               
				
				],
			]
      );

      $this->add_control(
         'offset_enable',
            [
               'label' => esc_html__('Post skip', 'instive'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'instive'),
               'label_off' => esc_html__('No', 'instive'),
               'default' => 'no',
              
               
            ]
      );
   
      $this->add_control(
         'offset_item_num',
         [
         'label'         => esc_html__( 'Skip post count', 'instive' ),
         'type'          => Controls_Manager::NUMBER,
         'default'       => '1',
         'condition' => [ 'offset_enable' => 'yes' ]

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
            'default' => 'no'
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
            'label'    => esc_html__( 'Style  ', 'instive' ),
            'tab'      => Controls_Manager::TAB_STYLE,
         ]
       );

       $this->add_control('title_color',
       [
          'label'     => esc_html__('Title color', 'instive'),
          'type'      => Controls_Manager::COLOR,
          'default'   => '',
          'selectors' => [
                   '{{WRAPPER}} .post-title h3 a' => 'color: {{VALUE}};',
          
          ],
       ]
      );
  
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-title h3',
			]
       );

      $this->add_control('meta_color',
       [
          'label'     => esc_html__('Post meta color', 'instive'),
          'type'      => Controls_Manager::COLOR,
          'default'   => '',
          'selectors' => [
                   '{{WRAPPER}} .post-meta span,{{WRAPPER}} .post-meta span a' => 'color: {{VALUE}};',
          
          ],
       ]
      );  

      $this->add_control('meta_icon_color',
      [
         'label'     => esc_html__('Post meta icon color', 'instive'),
         'type'      => Controls_Manager::COLOR,
         'default'   => '',
         'selectors' => [
                  '{{WRAPPER}} .post-meta span i' => 'color: {{VALUE}};',
         
         ],
      ]
     );  
       
      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_sub_typography',
				'label' => esc_html__( 'Desc Typography', 'instive' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-content > p',
			]
        );
        
        $this->add_control('slider_sub_text_color',
            [
            'label'     => esc_html__('Desc color', 'instive'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
                    '{{WRAPPER}} .post-content > p' => 'color: {{VALUE}};',
                  
            
                ],
            ]
        );
   
      $this->end_controls_section();  
  
    }

    protected function render( ) { 
        $settings = $this->get_settings();
       
        $arg =  array(
         'post_type' => 'post',
         'orderby'   => 'date',
         'order'     => $settings['order'],
         'post_per_page' => $settings['count'],
        );
        
        if($settings['offset_enable']=='yes'){
         $arg['offset'] = $settings['offset_item_num'];
        }

        $posts = get_posts( $arg ); 
        

        $show_navigation   =    $settings["ts_slider_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =    $settings['ts_slider_autoplay'];
        $dot_nav_show      =    $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =    $settings['ts_slider_speed'];

        $slide_controls    = [
         'show_nav'=>$show_navigation, 
         'dot_nav_show'=>$dot_nav_show, 
         'auto_nav_slide'=>$auto_nav_slide, 
         'ts_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 
        

    ?>
     <div class="blog-post owl-carousel owl-theme" data-controls="<?php echo esc_attr($slide_controls); ?>">
        
        <?php if ( $posts) : ?> 
            <?php foreach($posts as $single_posts): ?>
               <div class="post">
                  <div class="post-body">
                        <div class="post-media">
                           <?php echo get_the_post_thumbnail($single_posts->ID); ?>
                        </div> 
                        <div class="post-meta">
                           <?php if($settings['show_author']=='yes'): ?>
                              <?php $author_id = $single_posts->post_author; ?>
                              <span class="post-author"> 
                                 <i class="fa fa-user"></i> 
                                 <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID', $author_id) ) ); ?>">
                                     <?php echo esc_html(get_the_author_meta('display_name', $author_id));  ?>
                                 </a>
                              </span>
                           <?php endif; ?>   
                           <?php if($settings['show_date']=='yes'): ?>
                              <span class="post-date">
                                 <i class="fa fa-clock-o"></i>
                                 <?php echo get_the_date(get_option( 'date_format' ), $single_posts->ID); ?> 
                              </span>
                           <?php endif; ?>
                           <?php if($settings['show_cat']=='yes'): ?>
                              <span class="post-cat">
                                    <i class="fa fa-file"></i> 
                                    <?php $cats = get_the_category($single_posts->ID); ?>
                                    <?php foreach($cats as $item): ?>
                                       <?php echo esc_html($item->cat_name); ?>
                                    <?php endforeach ?>  
                              </span>
                           <?php endif; ?>
                        </div>
                        <div class="post-title"> 
                           <h3>
                              <a href="<?php esc_url(the_permalink($single_posts->ID)); ?>">
                                 <?php echo esc_html(wp_trim_words(get_the_title($single_posts->ID), $settings['post_title_crop'],'')); ?> 
                              </a>
                           </h3>
                        </div>
                        <?php if($settings['show_desc']): ?>
                           <div class="post-content"> 
                                 <p>
                                    <?php
                                       echo esc_html(wp_trim_words(get_the_excerpt($single_posts->ID),$settings['post_content_crop'],''));
                                    ?>
                                </p>
                                 <?php if($settings['readmore']): ?>
                                       <a href="<?php esc_url(the_permalink($single_posts->ID)); ?>" class="btn-link readmore"> <?php echo esc_html($settings['post_readmore_text']); ?> </a>
                                 <?php endif; ?>
                           </div>     
                        <?php endif; ?>
                  </div>   
              </div>  
            <?php  endforeach; wp_reset_postdata(); ?>
         <?php endif; ?> 
  

      </div>
    <?php  
    }
    protected function content_template() { }
    
    public function getCategories(){
      $cat_list = [];
     

         $terms = get_terms( 
               array(
                  'taxonomy'    => 'category',
                  'hide_empty'  => false,
                  'number'      => '350', 
            ) 
         );
         
      
      foreach($terms as $post) {
       $cat_list[$post->slug]  = [$post->name];
      }

     return $cat_list;
  }
}