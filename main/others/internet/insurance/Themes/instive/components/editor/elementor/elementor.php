<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class instive_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    
	public static $tabs = [];

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){
        add_action('elementskit/loaded', [$this, 'init']);
        add_action('elementor/controls/controls_registered', array( $this, 'instive_ekit_icon_pack' ), 120 );
        add_action('elementor/init', array($this, 'instive_elementor_init'));

		$this->instive_icon_pack();
    }


	public function init(){
        add_action('elementor/widgets/widgets_registered', array($this, 'instive_shortcode_elements'));
        add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );

	}


    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
       wp_enqueue_script( 'instive-main-elementor', INSTIVE_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), INSTIVE_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */

    public function editor_enqueue_styles() {
        wp_enqueue_style( 'instive-icon-elementor', INSTIVE_CSS.'/icon-font.css',null, INSTIVE_VERSION );

    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function instive_elementor_init(){
    
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'instive-elements',
            [
                'title' => esc_html__( 'instive', 'instive' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */ 
    public function instive_ekit_icon_pack( $controls_manager ) {

        require_once INSTIVE_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'INSTIVE_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    

    public function instive_icon_pack(  ) {

		$this->__generate_font();
		
		add_filter( 'elementor/icons_manager/additional_tabs', function(){
                return apply_filters( 'elementor/icons_manager/native', [
                    
					'icon-instive' => [
						'name' => 'icon-instive',
						'label' => esc_html__( 'Instive Icon', 'instive' ),
						'url' => INSTIVE_CSS . '/icon-font.css',
						'enqueue' => [ INSTIVE_CSS . '/icon-font.css' ],
						'prefix' => 'tsicon-',
						'displayPrefix' => 'tsicon',
						'labelIcon' => 'tsicon tsicon-icon031',
						'ver' => '5.9.1',
						'fetchJson' => INSTIVE_JS . '/icon-font.js',
						'native' => true,
					]
                ]);
            }
        );
		
    }
	
	public function __generate_font(){
		global $wp_filesystem;
 
        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        $css_file =  INSTIVE_CSS_DIR . '/icon-font.css';
     
        if ( $wp_filesystem->exists( $css_file ) ) {
            $css_source = $wp_filesystem->get_contents( $css_file );
        } // End If Statement
        
		preg_match_all( "/\.(tsicon-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
		$iconList = [];
		
		foreach ( $matches as $match ) {
			$new_icons[$match[1] ] = str_replace('tsicon-', '', $match[1]);
			$iconList[] = str_replace('tsicon-', '', $match[1]);
		}

		$icons = new \stdClass();
		$icons->icons = $iconList;
		$icon_data = json_encode($icons);
		
		$file = INSTIVE_THEME_DIR . '/assets/js/icon-font.js';
          
            global $wp_filesystem;
            require_once ( ABSPATH . '/wp-admin/includes/file.php' );
            WP_Filesystem();
            if ( $wp_filesystem->exists( $file ) ) {
                $content =  $wp_filesystem->put_contents( $file, $icon_data) ;
            } 
		
	}
 
    public function instive_shortcode_elements($widgets_manager){

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/main-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Main_Slider_Widget());
        
        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/team.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Team_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/faqaccordion.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Faq_Accordian_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/testimonial.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Testimonial_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/insurance-service.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Insurance_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/insurance-plan.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Insurance_Plan_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/slider-posts.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Slider_Post_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/pricing.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Pricing_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/search.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Search_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/insurace-form.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_contact_form_Widget());
       
        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/team-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Team_Slider_Widget());
       
        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/content-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Content_Slider_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/back-to-top.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Back_To_Top_Widget());

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/logo.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Site_Logo_Widget());

        if(class_exists('\Elementor\Instive_Widget_Blog_Posts')){
            $widgets_manager->register_widget_type(new Elementor\Instive_Widget_Blog_Posts());
        }

        if(class_exists('\Elementor\Instive_Widget_Client_Logo')){
            $widgets_manager->register_widget_type(new Elementor\Instive_Widget_Client_Logo());
        }

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/popup.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Popup_Widget());  

        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/insurance-category.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Insurance_Category_Widget());
        
        require_once INSTIVE_EDITOR_ELEMENTOR.'/widgets/quote-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Instive_Quote_Slider_Widget());

    }
    
	public static function instive_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new instive_Shortcode();
        }
        return self::$_instance;
    }

}
instive_Shortcode::instive_get_instance();