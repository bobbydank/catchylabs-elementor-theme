<?php

namespace CL\Elementor\Theme\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Search_Icon extends Widget_Base {
    
    /**
	 * Get widget name.
	 **
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return CL_ELEMENTOR_PREFIX . '-search-icon';
	}
    
    /**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Search Icon', 'cl-elementor' );
	}
    
    /**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-search';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'theme-widgets' ];
	}
    
    /**
	 * Register widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
        //creates the content section where everything is going.
        $this->start_controls_section(
			'content',
			[
				'label' => __( 'Content', 'cl-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa-solid fa-magnifying-glass',
					'library' => 'solid',
				],
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cl-search-icon' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control( 
            'icon_align', 
            [
                'label'     => __( 'Alignment', 'elementor' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cl-search-icon' => 'text-align: {{VALUE}};',
                ],
		    ] 
        );

        $this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'rem', 'em' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
                    ],
                    'em' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .cl-search-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();
    }
    
    /**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings_for_display();
		?>

        <div class="cl-search-icon">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</div>

		<?php

	}
}