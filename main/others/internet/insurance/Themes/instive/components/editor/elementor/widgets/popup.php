<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;


class Instive_Popup_Widget extends Widget_Base
{


    public $base;

    public function get_name()
    {
        return 'instive-popup';
    }

    public function get_title()
    {

        return esc_html__('Instive Popup', 'instive');
    }

    public function get_icon()
    {
        return 'fas fa-air-freshener';
    }

    public function get_categories()
    {
        return ['instive-elements'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Popup settings', 'instive'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_icon',
            [
                'label' => __('Button Icon', 'instive'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-envelope',
                    'library' => 'solid',
				],
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'         => esc_html__('Button Text', 'instive'),
                'type'          => Controls_Manager::TEXT,
                'default' => esc_html__('Get a quote', 'instive'),
            ]
        );
        $this->add_control(
            'popup_shorcode',
            [
                'label'         => esc_html__('Shortcode For Popup', 'instive'),
                'type'          => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder'   => esc_html__('[enter your shortcode]', 'instive'),
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => __('Button Alignment', 'instive'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'instive'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'instive'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'instive'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors'     => [
                    '{{WRAPPER}} .instive-popup-btn'  => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'btn_style',
            [
                'label'    => esc_html__('Button Style', 'instive'),
                'tab'      => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typograpy',
                'label' => esc_html__('Typography', 'instive'),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .btn',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label'     => esc_html__('Button  Color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label'     => esc_html__('Button Hover Color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label'     => esc_html__('Button BG Color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'btn_bg_hover_color',
            [
                'label'     => esc_html__('Button BG Hover Color', 'instive'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .btn:hover' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Button Padding', 'instive'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Button Border Radius', 'instive'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();

?>

        <div class="instive-popup-btn">
            <a href="#popup<?php echo esc_attr($this->get_id()); ?>" class="instive-popup btn btn-primary" data-effect="instivebounceInDown">
                <?php \Elementor\Icons_Manager::render_icon($settings['btn_icon'], ['aria-hidden' => 'true']); ?>
                <?php echo esc_html($settings['btn_text']); ?>
            </a>
        </div>
        <div id="popup<?php echo esc_attr($this->get_id()); ?>" class="container mfp-hide instive-shortcode-popup instive_animated instivebounceInDown">
            <div class="instive-popup-wrap">
                <?php echo do_shortcode($settings['popup_shorcode']); ?>
            </div>
        </div>

<?php
    }
    protected function content_template()
    {
    }
}
