<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
/**
 * Elementor heading widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class LNXElement_Circle_Progress extends LNXElement_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'lnx-circle-progress';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'LNX Circle Progress', 'lenxel-core' );
	}

	public function get_script_depends() {
		return [
			'circle-progress',
			'lenxel.elements'
		];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-featured-image';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'circle', 'progress' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Content', 'lenxel-core' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'lenxel-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'lenxel-core' ),
				'default'	  => esc_html__( 'Projects Completed', 'lenxel-core' )
			]
		);
		$this->add_control(
			'empty_fill',
			[
				'label' => esc_html__( 'Color EmptyFill', 'lenxel-core' ),
				'type' => Controls_Manager::COLOR
			]
		);
		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'lenxel-core' ),
				'type' => Controls_Manager::COLOR
			]
		);
		$this->add_control(
			'number',
			[
			  	'label' => esc_html__( 'Percentage', 'lenxel-core' ),
			  	'type' => Controls_Manager::NUMBER,
				'min' => 5,
			  	'max' => 100,
			  	'step' => 1,
			  	'default' => 50,
			]
	 	);
	 	$this->add_control(
			'thickness',
			[
			  	'label' => esc_html__( 'Thickness', 'lenxel-core' ),
			  	'type' => Controls_Manager::NUMBER,
				'min' => 1,
			  	'max' => 50,
			  	'step' => 1,
			  	'default' => 6,
			]
	 	);
  	
		$this->end_controls_section();


		//Style Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'lenxel-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'lenxel-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-circle-progress .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_title',
				'selector' => '{{WRAPPER}} .gsc-circle-progress .title',
			]
		);
		$this->end_controls_section();
		
		//Style Percentage
		$this->start_controls_section(
			'section_percentage_style',
			[
				'label' => esc_html__( 'Percentage', 'lenxel-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'percentage_color',
			[ 
				'label' => esc_html__( 'Percentage Color', 'lenxel-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-circle-progress .circle-progress strong' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_percentage',
				'selector' => '{{WRAPPER}} .gsc-circle-progress .circle-progress strong',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		
		printf( '<div class="lnx-element-%s lnx-element">', esc_html($this->get_name()) );
			include $this->get_template('circle-progress.php');
		print '</div>';
	}

}

 $widgets_manager->register_widget_type(new LNXElement_Circle_Progress());
