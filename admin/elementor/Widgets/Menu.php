<?php

namespace CL\Elementor\Theme\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 * Class Menu
 * @package CL\Elementor\Widgets
 */
class Menu extends Widget_Base {

	/**
	 * Get widget name.
	 **
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return CL_ELEMENTOR_PREFIX . '-menu';
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
		return __( 'Menu', 'cl-elementor' );
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
		return 'eicon-menu-toggle';
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
	protected function _register_controls() {

		$locations = array();
		//get_nav_menu_locations()
		foreach ( get_terms( 'nav_menu', array( 'hide_empty' => true ) ) as $menu_slug => $menu_location ) {
			//$location                = wp_get_nav_menu_object( $menu_slug );
			//$locations[ $menu_slug ] = $location->name;
			$locations[ $menu_location->slug ] = $menu_location->name;
		}

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Settings', 'cl-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'nav_menu_loc',
			[
				'label'   => __( 'Menu Location', 'cl-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $locations,
			]
		);

		$this->add_control(
			'theme',
			[
				'label'   => __( 'Theme', 'cl-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'light'  => 'Light',
					'dark'   => 'Dark',
					'custom' => 'Custom',
				),
			]
		);

		$this->add_control(
			'menu_type',
			[
				'label'   => __( 'Type', 'cl-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'mobile'   => 'Mobile',
					'hybrid'   => 'Hybrid',
					'text'  => 'Text',
				),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Settings', 'cl-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .nav-menu a',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => __( 'Text color', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label'     => __( 'Hover color', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu a:hover' => 'color: {{VALUE}}; text-decoration:underline;',
				],
			]
		);

		$this->add_control(
			'hover_underline',
			[
				'label'     => __( 'Hover color', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background color', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#000',
				'selectors' => [
					'{{WRAPPER}} .nav-menu' => 'background-color: {{VALUE}};',
				],
			]
		);

		/*
		$this->add_control(
			'width',
			[
				'label'          => __( 'Width', 'elementor' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units'     => [ '%', 'px', 'vw' ],
				'range'          => [
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'      => [
					'{{WRAPPER}} .nav-menu' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);*/

		$this->add_responsive_control( 'text_align', [
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
				'{{WRAPPER}} .nav-menu' => 'text-align: {{VALUE}};',
			],
		] );

		$this->add_responsive_control(
			'seperator',
			[
				'label'     => __( 'Seperator', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'dot'   => [
						'title' => __( 'Left', 'elementor' ),
						'icon'  => 'eicon-circle',
					],
					'line' => [
						'title' => __( 'Center', 'elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
				],
			]
		);

		$this->add_control(
			'separator_color',
			[
				'label'     => __( 'Separator Color', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu .navbar .menu.line li:after' => 'background-color: {{VALUE}};',
				]
			]
		);

		/*$this->add_responsive_control( 'position', [
			'label'     => __( 'Position', 'elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => [
				'left'  => [
					'title' => __( 'Left', 'elementor' ),
					'icon'  => 'eicon-text-align-left',
				],
				'right' => [
					'title' => __( 'Right', 'elementor' ),
					'icon'  => 'eicon-text-align-right',
				],
			],
			'selectors' => [
				'{{WRAPPER}} .page-current-title' => 'float: {{VALUE}}; display:block;',
			],
		] );

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .page-current-title' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);*/

		$this->add_responsive_control(
			'padding',
			[
				'label'      => __( 'Padding', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .nav-menu .navbar .menu li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label'      => __( 'Margin', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .nav-menu .navbar .menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'special_last',
			[
				'label' => esc_html__( 'Special Last Item', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'your-plugin' ),
				'label_off' => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'special_text_color',
			[
				'label'     => __( 'Special Text', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu .navbar.special-last li:last-child a' => 'color: {{VALUE}};',
				],
				'condition' => array(
					'special_last' => 'yes',
				),
			]
		);

		$this->add_control(
			'special_hover_text_color',
			[
				'label'     => __( 'Special Text Hover', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu .navbar.special-last li:last-child:hover a' => 'color: {{VALUE}};',
				],
				'condition' => array(
					'special_last' => 'yes',
				),
			]
		);

		$this->add_control(
			'special_bg_color',
			[
				'label'     => __( 'Special BG', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu .navbar.special-last li:last-child' => 'background-color: {{VALUE}};',
				],
				'condition' => array(
					'special_last' => 'yes',
				),
			]
		);

		$this->add_control(
			'special_hover_bg_color',
			[
				'label'     => __( 'Special BG Hover', 'cl-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'std'       => '#fff',
				'selectors' => [
					'{{WRAPPER}} .nav-menu .navbar.special-last li:last-child:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => array(
					'special_last' => 'yes',
				),
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
		$settings     = $this->get_settings_for_display();
		$nav_menu_loc = isset( $settings['nav_menu_loc'] ) ? $settings['nav_menu_loc'] : null;
		$theme        = isset( $settings['theme'] ) ? $settings['theme'] : 'light';
		
		if ( ! empty( $nav_menu_loc ) ): ?>
			<div class="nav-menu nav-menu-<?php echo $theme; ?>">
				
				<?php if ($settings['menu_type'] === 'mobile') : ?>
					<a class="navbar-toggle always-on">
						<div id="cl-hamburger">
							<span></span><span></span><span></span><span></span><span></span><span></span>
						</div>
					</a>
				<?php elseif ($settings['menu_type'] === 'hybrid') : ?>
					<a class="navbar-toggle">
						<div id="cl-hamburger">
							<span></span><span></span><span></span><span></span><span></span><span></span>
						</div>
					</a>
					<nav class="navbar <?php echo ('yes' === $settings['special_last']) ? 'special-last' : ''; ?>">
						<?php wp_nav_menu( array(
							'menu' => $nav_menu_loc,
							'items_wrap'     => '<ul class="menu '.$settings['seperator'].'">%3$s</ul>',
							'container'      => ''
						) ); ?>
					</nav>
				<?php else : ?>
					<nav class="navbar <?php echo ('yes' === $settings['special_last']) ? 'special-last' : ''; ?>">
						<?php wp_nav_menu( array(
							'menu' => $nav_menu_loc,
							'items_wrap'     => '<ul class="menu '.$settings['seperator'].'">%3$s</ul>',
							'container'      => ''
						) ); ?>
					</nav>
				<?php endif; ?>
			</div>
		<?php else: ?>
            <p><?php _e( 'Please select nav menu location.' ); ?></p>
		<?php endif; 
	}

}
