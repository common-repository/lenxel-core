<?php
if (!defined('ABSPATH')) {
	 exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

abstract class LNXElement_Base extends Elementor\Widget_Base {
  
  public function get_categories() {
	 return array('lenxel_elements');
  }

  protected function add_control_carousel($single_item, $condition = array()) {
	  $this->start_controls_section(
			'section_carousel_options',
			 [
				'label' => esc_html__('Carousel Options', 'lenxel-core'),
				'type'  => Controls_Manager::SECTION,
				'condition' => $condition,
			 ]
	  );

	  if($single_item != 'always_single'){
		 $this->add_control(
			 'ca_items_lg',
			 [
				'label'     => esc_html__('Columns for Large Screen', 'lenxel-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => $single_item == true ? 1 : 3,
				'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
			 ]
		 );

		  $this->add_control(
			 'ca_items_md',
			 [
				'label'     => esc_html__('Columns for Medium Screen', 'lenxel-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => $single_item == true ? 1 : 3,
				'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
			 ]
		  );

			 $this->add_control(
				'ca_items_sm',
				[
				  'label'     => esc_html__('Columns for Small Screen', 'lenxel-core'),
				  'type'      => Controls_Manager::SELECT,
				  'default'   => $single_item == true ? 1 : 2,
				  'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
				]
			 );

			 $this->add_control(
				'ca_items_xs',
				[
				  'label'     => esc_html__('Columns for Extra Small Screen', 'lenxel-core'),
				  'type'      => Controls_Manager::SELECT,
				  'default'   => 1,
				  'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
				]
			 );
			 $this->add_control(
				'ca_items_xx',
				[
				  'label'     => esc_html__('Columns for Very Extra Small Screen', 'lenxel-core'),
				  'type'      => Controls_Manager::SELECT,
				  'default'   => 1,
				  'options'   => array(1=>1, 2=>2, 3=>3)
				]
			 );
		  }  

		  $this->add_control(
			 'ca_loop',
			 [
				'label'     => esc_html__('Loop', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes'
			 ]
		  );

		  $this->add_control(
			 'ca_speed',
			 [
				'label'     => esc_html__('Speed', 'lenxel-core'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 800,
			 ]
		  );

		  $this->add_control(
			 'ca_auto_play',
			 [
				'label'     => esc_html__('Auto Play', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes'
			 ]
		  );

		  $this->add_control(
			 'ca_auto_play_timeout',
			 [
				'label'     => esc_html__('Auto Play Timeout', 'lenxel-core'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 6000,
			 ]
		  );

		  $this->add_control(
			 'ca_auto_play_speed',
			 [
				'label'     => esc_html__('Auto Play Speed', 'lenxel-core'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 800,
			 ]
		  );

		  $this->add_control(
			 'ca_play_hover',
			 [
				'label'     => esc_html__('Play Hover', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes'
			 ]
		  );

		  $this->add_control(
			 'ca_navigation',
			 [
				'label'     => esc_html__('Navigation', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes'
			 ]
		  );

		  $this->add_control(
			 'ca_pagination',
			 [
				'label'     => esc_html__('Pagination', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no'
			 ]
		  );

		$this->add_control(
		  'ca_mouse_drag',
		  [
			 'label'     => esc_html__('Mouse Drag', 'lenxel-core'),
			 'type'      => Controls_Manager::SWITCHER,
			 'default'   => 'yes',
		  ]
		);

		$this->add_control(
		  'ca_touch_drag',
		  [
			 'label'     => esc_html__('Touch Drag', 'lenxel-core'),
			 'type'      => Controls_Manager::SWITCHER,
			 'default'   => 'yes'
		  ]
		);
		$this->add_responsive_control(
		  'spacing_dots',
		  [
			 'label' => esc_html__( 'Dots Spacing', 'lenxel-core' ),
			 'type' => Controls_Manager::SLIDER,
			 'default' => [
				'size' => 10,
			 ],
			 'range' => [
				'px' => [
				  'min' => 0,
				  'max' => 200,
				],
			 ],
			 'selectors' => [
				'{{WRAPPER}} .owl-carousel .owl-dots' => 'margin-top: {{SIZE}}px;',
			 ],
		  ]
		);
		
		$this->end_controls_section();
	 }

	 protected function add_control_grid($condition = array()) {
	  $this->start_controls_section(
		  'section_grid_options',
		  [
			 'label' => esc_html__('Grid Options', 'lenxel-core'),
			 'type'  => Controls_Manager::SECTION,
			 'condition' => $condition,
		  ]
	  );

	  $this->add_control(
		  'grid_items_lg',
		  [
			 'label'     => esc_html__('Columns for Large Screen', 'lenxel-core'),
			 'type'      => Controls_Manager::SELECT,
			 'default'   => 3,
			 'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
		  ]
	  );

		$this->add_control(
		  'grid_items_md',
		  [
			 'label'     => esc_html__('Columns for Medium Screen', 'lenxel-core'),
			 'type'      => Controls_Manager::SELECT,
			 'default'   => 3,
			 'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
		  ]
		);

		  $this->add_control(
			 'grid_items_sm',
			 [
				'label'     => esc_html__('Columns for Small Screen', 'lenxel-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 2,
				'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
			 ]
		  );

		  $this->add_control(
			 'grid_items_xs',
			 [
				'label'     => esc_html__('Columns for Extra Small Screen', 'lenxel-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 1,
				'options'   => array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6)
			 ]
		  );

		  $this->add_control(
			 'grid_items_xx',
			 [
				'label'     => esc_html__('Columns for Very Extra Small Screen', 'lenxel-core'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 1,
				'options'   => array(1=>1, 2=>2, 3=>3)
			 ]
		  );
  
		  $this->add_control(
			 'grid_remove_padding',
			 [
				'label'     => esc_html__('Remove Padding', 'lenxel-core'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
			 ]
		  );
		  $this->end_controls_section();
	 }

	 protected function get_thumbnail_size(){
		  global $_wp_additional_image_sizes; 
		  $results = array(
				'full'      => 'full',
				'large'     => 'large',
				'medium'    => 'medium',
				'thumbnail' => 'thumbnail'
		  );
		  foreach ($_wp_additional_image_sizes as $key => $size) {
				$results[$key] = $key;
		  }
		  return $results;
	 }

	 protected function get_carousel_settings() {
		$settings = $this->get_settings_for_display();
		$ouput = '';
		$carousel_attributes = array(
		  'items'               => isset($settings['ca_items_lg']) ? $settings['ca_items_lg'] : 1,
		  'items_lg'            => isset($settings['ca_items_lg']) ? $settings['ca_items_lg'] : 1,
		  'items_md'            => isset($settings['ca_items_md']) ? $settings['ca_items_md'] : 1,
		  'items_sm'            => isset($settings['ca_items_sm']) ? $settings['ca_items_sm'] : 1,
		  'items_xs'            => isset($settings['ca_items_xs']) ? $settings['ca_items_xs'] : 1,
		  'items_xx'            => isset($settings['ca_items_xx']) ? $settings['ca_items_xx'] : 1,
		  'loop'                => $settings['ca_loop'] === 'yes' ? 1 : 0,
		  'speed'               => $settings['ca_speed'],
		  'auto_play'           => $settings['ca_auto_play'] === 'yes' ? 1 : 0,
		  'auto_play_speed'     => $settings['ca_auto_play_speed'],
		  'auto_play_timeout'   => $settings['ca_auto_play_timeout'],
		  'auto_play_hover'     => $settings['ca_play_hover'] === 'yes' ? 1 : 0,
		  'navigation'          => $settings['ca_navigation'] === 'yes' ? 1 : 0,
		  //'rewind_nav'          => $settings['ca_rewind_nav'] === 'yes' ? 1 : 0,
		  'pagination'          => $settings['ca_pagination'] === 'yes' ? 1 : 0,
		  'mouse_drag'          => $settings['ca_mouse_drag'] === 'yes' ? 1 : 0,
		  'touch_drag'          => $settings['ca_touch_drag'] === 'yes' ? 1 : 0
		);
		foreach ($carousel_attributes as $key => $value) {
		  $ouput .= 'data-' . esc_attr( $key ) . '="' . esc_attr($value) . '" ';
		}
		
		return $ouput;
	 }
	 protected function lenxel_print_carousel_settings(){
		echo esc_attr($this->lenxel_str_replace_action(array('"'), $this->get_carousel_settings()));
	 }
	 protected function lenxel_str_replace_action( array $replace_value, string $rep_data_value){
		return str_replace($replace_value, '', $rep_data_value);
	 }
	 protected function get_grid_settings($classes = '') {
		$settings = $this->get_settings_for_display();
		if($classes){
		  $this->add_render_attribute('grid', 'class', $classes);
		}
		$this->add_render_attribute('grid', 'class', 'lg-block-grid-' . $settings['grid_items_lg']);
		$this->add_render_attribute('grid', 'class', 'md-block-grid-' . $settings['grid_items_md']);
		$this->add_render_attribute('grid', 'class', 'sm-block-grid-' . $settings['grid_items_sm']);
		$this->add_render_attribute('grid', 'class', 'xs-block-grid-' . $settings['grid_items_xs']);
		$this->add_render_attribute('grid', 'class', 'xx-block-grid-' . $settings['grid_items_xx']);
	 }


	 public function lnx_render_button($classes = ''){
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['button_url']['url'] ) ) {
		  $this->add_render_attribute( 'button', 'href', $settings['button_url']['url'] );

		  if(!empty($classes)){
			 $this->add_render_attribute( ['button' => ['class', $classes]] );
		  }else{
			 $this->add_render_attribute( ['button' => ['class', 'btn-theme']] );
		  }

		  if ( $settings['button_url']['is_external'] ) {
			 $this->add_render_attribute( ['button' => ['target', '_blank']] );
		  }
		  if ( $settings['button_url']['nofollow'] ) {
			 $this->add_render_attribute( ['button' => ['rel' => 'nofollow']] );
		  }
		  ?>
		  <a <?php $this->print_render_attribute_string( 'button' ); ?>>
			 <span><?php echo esc_html( $settings['button_text'] ) ?></span>
		  </a>

		  <?php
		}
	 }

	 public function lnx_render_link_begin($link = array(), $classes = ''){
		$r = lenxel_themesupport_random_id();
		if ( ! empty( $link['url'] ) ) {
		  $this->add_render_attribute( ['_base_link_0' . $r => ['href' => $link['url']]] );

		  if(!empty($classes)){
			 $this->add_render_attribute( ['_base_link_0' . $r => ['class' => $classes]] );
		  }

		  if ( $link['is_external'] ) {
			 $this->add_render_attribute( ['_base_link_0' . $r => ['target', '_blank']] );
		  }
		  if ( $link['nofollow'] ) {
			 $this->add_render_attribute( ['_base_link_0' . $r => ['rel', 'nofollow']] );
		  }
		  ?>
		  <a <?php $this->print_render_attribute_string( '_base_link_0' . $r ); ?>>
		  <?php
		}
	 }

	 public function lnx_render_link_end($link = array()){
		if ( ! empty( $link['url'] ) ) { 
		  echo '</a>';
		}
	 }

	public function lenxel_render_link_html($html = '', $link = array(), $classes = ''){
		$r = lenxel_themesupport_random_id();
		if ( ! empty( $link['url'] ) ) {
		  $this->add_render_attribute( ['_base_link_1' . $r => ['href' => $link['url']]] );

		  if(!empty($classes)){
			 $this->add_render_attribute( ['_base_link_1' . $r => ['class' => $classes]] );
		  }

		  if ( $link['is_external'] ) {
			 $this->add_render_attribute( ['_base_link_1' . $r => ['target' => '_blank']] );
		  }
		  if ( $link['nofollow'] ) {
			 $this->add_render_attribute( ['_base_link_1' . $r => ['rel' => 'nofollow']] );
		  }
		  ?>
		  <a <?php $this->print_render_attribute_string( '_base_link_1' . $r ); ?>>
			 <?php echo wp_kses($html, $this->lenxel_get__allowed_html()); ?>
		  </a>
		  <?php
		}else{
		  echo wp_kses($html, $this->lenxel_get__allowed_html());
		}
	}

	public function lenxel_render_link_overlay($link = array(), $classes = 'link-overlay'){
		$r = lenxel_themesupport_random_id();
		if ( ! empty( $link['url'] ) ) {
		  $this->add_render_attribute( ['_base_link_1' . $r => ['href'=> $link['url']]] );

		  if(!empty($classes)){
			 $this->add_render_attribute( ['_base_link_1' . $r => ['class'=> $classes]] );
		  }

		  if ( $link['is_external'] ) {
			 $this->add_render_attribute( ['_base_link_1' . $r => ['target' => '_blank']] );
		  }
		  if ( $link['nofollow'] ) {
			 $this->add_render_attribute( ['_base_link_1' . $r => ['rel' => 'nofollow']] );
		  }
		  ?>
		  <a <?php $this->print_render_attribute_string( '_base_link_1' . $r ); ?>></a>
		  <?php
		}
	}


	public function get_template( $template_name = null ){
		$template_path = apply_filters( 'lnx-elementor/template-path', 'templates/elementor/' );
		$template = locate_template( $template_path . $template_name );
		if ( ! $template ){
			$template = LENXEL_PLUGIN_DIR  . 'elementor/templates/' . $template_name;
		}
		if ( file_exists( $template ) ) {
			return $template;
		} else {
			return false;
		}
	}

  	function lenxel_get_template_part($slug, $name = null, $data = []){
		global $posts, $post;
		do_action( "get_template_part_{$slug}", $slug, $name );

		$templates = array();
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "{$slug}-{$name}.php";
		}

		$templates[] = "{$slug}.php";

		do_action( 'get_template_part', $slug, $name, $templates );
		$template = locate_template($templates, false);
	
		if (!$template) {
			return;
		}

		if ($data) {
			extract($data);
		}
	 
		include($template);
  	}
	function lenxel_get__allowed_html(): array {
		return [
			'div' => [
				'class' => [],
				'data-display' => [],
			],
			'svg' => [
				'width' => [],
				'height' => [],
				'viewbox' => [],
				'fill' => [],
				'xmlns' => [],
			],
			'path' => [
				'd' => [],
				'stroke' => [],
				'stroke-width' => [],
				'stroke-linecap' => [],
				'stroke-linejoin' => [],
			],
			'button' => [
				'class' => [],
				'data-event' => [],
				'data-settings' => [],
				'data-tooltip' => [],
			],
			'i' => [
				'class' => [],
				'aria-hidden' => [],
			],
			'span' => [
				'class' => [],
			],
			'a' => [
				'href' => [],
				'style' => [],
				'target' => [],
			],
			'ul' => [
				'class' => [],
				'id' => [],
				''
			],
			'li' => [
				'class' => [],
				'id' => [],
			],
			'ol' => [
				'class' => [],
				'id' => [],
			],
			'input' => [
				'type' => [],
				'value' => array(),
				'class' => [],
				'id' => [],
				'value' => [],
				'data-'=>[],
				'name' =>[],
			],
			'select' => [
				'class' => [],
				'id' => [],
				'name' =>[],
			],
			'option'=>[
				'class' => [],
				'value' => [],
				'id' => [],
				'selected' =>[],
			]
		];
	}
  	public function pagination( $query = false ){
	 	global $wp_query;   
	 	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

	 	if( ! $query ) $query = $wp_query;
	 
	 	$translate['prev'] =  esc_html__('Prev page', 'lenxel-core');
	 	$translate['next'] =  esc_html__('Next page', 'lenxel-core');
	 	$translate['load-more'] = esc_html__('Load more', 'lenxel-core');
	 
	 	$query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;  
	 
	 	if( empty( $paged ) ) $paged = 1;
	 	$prev = $paged - 1;                         
	 	$next = $paged + 1;
	 
	 	$end_size = 1;
	 	$mid_size = 2;
	 	$show_all = false;
	 	$dots = false;

	 	if( ! $total = $query->max_num_pages ) $total = 1;
	 
	 	$output = '';
	 	if( $total > 1 ){   
			$output .= '<div class="column one pager_wrapper">';
			  $output .= '<div class="pager">';
				 $output .= '<div class="paginations">';
					if( $paged >1 && !is_home()){
					  $output .= '<a class="prev_page" href="'. previous_posts(false) .'"><i class="fas fa-chevron-left"></i></a>';
					}
					for( $i=1; $i <= $total; $i++ ){
					  if ( $i == $current ){
						 $output .= '<a href="'. get_pagenum_link($i) .'" class="page-item active">'. $i .'</a>';
						 $dots = true;
					  } else {
						 if ( $show_all || ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total - $end_size ) ){
							$output .= '<a href="'. get_pagenum_link($i) .'" class="page-item">'. $i .'</a>';
							$dots = true;
						 } elseif ( $dots && ! $show_all ) {
							$output .= '<span class="page-item">... </span>';
							$dots = false;
						 }
					  }
					}
					if( $paged < $total && !is_home()){
					  $output .= '<a class="next_page" href="'. next_posts(0,false) .'"><i class="fas fa-chevron-right"></i></a>';
					}
				 $output .= '</div>';
					
			  $output .= '</div>';
			$output .= '</div>'."\n";    
	 	}
	 
	 	return $output;
  	}
}