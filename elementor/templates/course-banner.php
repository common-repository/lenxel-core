<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
   use Elementor\Group_Control_Image_Size;

   $this->add_render_attribute( ['block'=> ['class'=> [ 'gsc-listings-banner', 'text-' . $settings['content_align'] ]], 'subtitle_text'=> ['class'=> 'subtitle'], 'title_text'=> ['class'=> 'title']] );
   
   $subtitle_text = $settings['subtitle'];
   $title_text = $settings['title'];


   $image_id = $settings['image']['id']; 
   $image_url = $settings['image']['url'];
   if($image_id){
      $attach_url = Group_Control_Image_Size::get_attachment_image_src($image_id, 'image', $settings);
      if($attach_url) $image_url = $attach_url;
   }

   $taxonomy = $settings['taxonomy'] ? $settings['taxonomy'] : 'course-category'; 
   $term = $link_term = false;
   if( !empty($settings['term_slug']) ){
      $term = get_term_by( 'slug', $settings['term_slug'], $taxonomy );
      if($term){
         $link_term = get_term_link( $term->term_id, $taxonomy );
      }
   }
   $link = $link_term;
   if( !empty($settings['link_custom']) ) $link = $settings['link_custom'];
?>

<div <?php $this->print_render_attribute_string('carousel'); ?>>
   <div class="listings-banner-content">
      
      <?php 
         if ( $settings['show_number_content'] == 'yes' && $term ) {
            if(!empty($settings['term_slug'])){
               echo '<span class="number-listings">' . sprintf(_n('%d Listing', '%d Courses', esc_html($term->count), 'lenxel-core'), esc_html($term->count)) . '</span>';
            }
         } 
      ?>

      <?php if($image_url){ ?>
         <div class="banner-image">
            <img src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr($title_text) ?>" />
         </div>
      <?php } ?>

      <div class="banner-content">
         
         <?php if($subtitle_text){ ?>
            <div class="subtitle"><?php echo wp_kses_post($subtitle_text) ?></div>
         <?php } ?>

         <?php if($title_text){ ?>
            <h3 class="title"><?php echo wp_kses_post($title_text); ?></h3>
         <?php } ?>

      </div>

      <?php if($link){ ?>
         <a class="link-term-overlay" href="<?php echo esc_url($link); ?>"></a>
      <?php } ?>
               
   </div>
</div>