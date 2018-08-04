<?php
/**
 * Rock N Rolla Theme Customizer.
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rock_n_rolla_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', 'rock_n_rolla_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rock_n_rolla_customize_preview_js() {
	wp_enqueue_script( 'rock_n_rolla_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rock_n_rolla_customize_preview_js' );

if (!function_exists( 'rock_n_rolla_theme_customizer' ) ) :
	function rock_n_rolla_theme_customizer( $wp_customize ) {
		$wp_customize->add_panel( 'rock_n_rolla_home_featured', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Home Page Features', 'rock-n-rolla' ),
			'description'    => __( 'Home Page Features Panel', 'rock-n-rolla' ),
		) );
		
		//slider
		$wp_customize->add_section( 'rock_n_rolla_slider_section' , array(
			'title'       => __( 'Slider', 'rock-n-rolla' ),
			'priority'    => 20,
			'description' => __( 'Slider Option', 'rock-n-rolla' ),
			'panel'  => 'rock_n_rolla_home_featured',
		) );
	
		$wp_customize->add_setting('rock_n_rolla_display_slider_setting', array(
			'default'        => 0,
			'sanitize_callback' => 'rock_n_rolla_sanitize_checkbox',
		));
	
		$wp_customize->add_control('rock_n_rolla_display_slider_control', array(
			'settings' => 'rock_n_rolla_display_slider_setting',
			'label'    => __('Display Slider', 'rock-n-rolla'),
			'section'  => 'rock_n_rolla_slider_section',
			'type'     => 'checkbox',
			'priority'	=> 24
		));
	
				
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
		
		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_setting('rock_n_rolla_slide_category_setting', array(
			'default' => '',
			'sanitize_callback' => 'rock_n_rolla_sanitize_category',
		));
	
		$wp_customize->add_control('rock_n_rolla_slide_category_control', array(
			'settings' => 'rock_n_rolla_slide_category_setting',
			'type' => 'select',
			'label' => __('Select Category:', 'rock-n-rolla'),
			'section' => 'rock_n_rolla_slider_section',
			'choices' => $cats,
			'priority'	=> 24
		));
		
		//  Set Speed
		$wp_customize->add_setting( 'rock_n_rolla_slider_speed_setting', array (
			'default' => '6000',
			'sanitize_callback' => 'rock_n_rolla_sanitize_integer',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_slider_speed', array(
			'label'    => __( 'Slider Speed (milliseconds)', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_slider_section',
			'settings' => 'rock_n_rolla_slider_speed_setting',
			'priority'	=> 24
		) ) );
		
		//Carousel
		$wp_customize->add_section( 'rock_n_rolla_carousel_section' , array(
			'title'       => __( 'Carousel', 'rock-n-rolla' ),
			'priority'    => 20,
			'description' => __( 'Carousel Option', 'rock-n-rolla' ),
			'panel'  => 'rock_n_rolla_home_featured',
		) );
		
		//Carousel section Label
		$wp_customize->add_setting( 'rock_n_rolla_carousel_label', array (
			'default' => '',
			'sanitize_callback' => 'rock_n_rolla_sanitize_text_field'
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'rock_n_rolla_carousel_label', array(
		   'label'      => __( 'Enter Desired Label', 'rock-n-rolla' ),
		   'section'    => 'rock_n_rolla_carousel_section',
		   'settings'   => 'rock_n_rolla_carousel_label',
		   'priority'    => 83
		   )
		));
	
		$wp_customize->add_setting('rock_n_rolla_display_carousel_setting', array(
			'default'        => 0,
			'sanitize_callback' => 'rock_n_rolla_sanitize_checkbox',
		));
	
		$wp_customize->add_control('rock_n_rolla_display_carousel_control', array(
			'settings' => 'rock_n_rolla_display_carousel_setting',
			'label'    => __('Display Carousel', 'rock-n-rolla'),
			'section'  => 'rock_n_rolla_carousel_section',
			'type'     => 'checkbox',
			'priority'	=> 24
		));
	
				
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
		
		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_setting('rock_n_rolla_carousel_category_setting', array(
			'default' => '',
			'sanitize_callback' => 'rock_n_rolla_sanitize_category',
		));
	
	
		$wp_customize->add_control('rock_n_rolla_carousel_category_control', array(
			'settings' => 'rock_n_rolla_carousel_category_setting',
			'type' => 'select',
			'label' => 'Select Category:',
			'section' => 'rock_n_rolla_carousel_section',
			'choices' => $cats,
			'priority'	=> 24
		));
			
		//  Set Speed
		$wp_customize->add_setting( 'rock_n_rolla_carousel_speed_setting', array (
			'default' => '6000',
			'sanitize_callback' => 'rock_n_rolla_sanitize_integer',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_carousel_speed', array(
			'label'    => __( 'Slider Speed (milliseconds)', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_carousel_section',
			'settings' => 'rock_n_rolla_carousel_speed_setting',
			'priority'	=> 24
		) ) );	
		
		//Sound Cloud Option	
		$wp_customize->add_section( 'rock_n_rolla_SC_section' , array(
			'title'       => __( 'Music Player', 'rock-n-rolla' ),
			'priority'    => 20,
			'description' => __( 'Music Player Option', 'rock-n-rolla' ),
			'panel'  => 'rock_n_rolla_home_featured',
		) );
		
		$wp_customize->add_setting( 'rock_n_rolla_SC_embed_setting', array (
			'default' => __('Enter Album or Music link','rock-n-rolla'),
			'sanitize_callback' => 'rock_n_rolla_sanitize_textarea'
				
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'rock_n_rolla_SC_embed_setting', array(
		   'label'      => __( 'Enter Album or Music link', 'rock-n-rolla' ),
		   'section'    => 'rock_n_rolla_SC_section',
		   'settings'   => 'rock_n_rolla_SC_embed_setting',
		   'type'   	=> 	'textarea',
		   'priority'    => 24
		   )
		));
		
		//SC section Label
		$wp_customize->add_setting( 'rock_n_rolla_album_label', array (
			'default' => '',
			'sanitize_callback' => 'rock_n_rolla_sanitize_text_field'
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'rock_n_rolla_album_label', array(
		   'label'      => __( 'Enter Desired Label', 'rock-n-rolla' ),
		   'section'    => 'rock_n_rolla_SC_section',
		   'settings'   => 'rock_n_rolla_album_label',
		   'priority'    => 83
		   )
		));
		
		//Featured Articles
		$wp_customize->add_setting('rock_n_rolla_display_album_setting', array(
			'default'        => 0,
			'sanitize_callback' => 'rock_n_rolla_sanitize_checkbox',
		));
	
		$wp_customize->add_control('rock_n_rolla_display_album_control', array(
			'settings' => 'rock_n_rolla_display_album_setting',
			'label'    => __('Display Music Album', 'rock-n-rolla'),
			'section'  => 'rock_n_rolla_SC_section',
			'type'     => 'checkbox',
			'priority'	=> 10
		));
		
		//Post section Label
		$wp_customize->add_section( 'rock_n_rolla_post_section' , array(
			'title'       => __( 'Post Label', 'rock-n-rolla' ),
			'priority'    => 20,
			'description' => __( 'Post Label Option', 'rock-n-rolla' ),
			'panel'  => 'rock_n_rolla_home_featured',
		) );
		
		$wp_customize->add_setting( 'rock_n_rolla_post_label', array (
			'default' => __('Latest post', 'rock-n-rolla'),
			'sanitize_callback' => 'rock_n_rolla_sanitize_text_field'
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'rock_n_rolla_post_label', array(
		   'label'      => __( 'Enter Desired Label', 'rock-n-rolla' ),
		   'section'    => 'rock_n_rolla_post_section',
		   'settings'   => 'rock_n_rolla_post_label',
		   'priority'    => 83
		   )
		));
			
		/* social media option */
		$wp_customize->add_section( 'rock_n_rolla_social_section' , array(
			'title'       => __( 'Social Media Icons', 'rock-n-rolla' ),
			'priority'    => 20,
			'description' => __( 'Optional social media buttons in the header', 'rock-n-rolla' ),
		) );
	
		$wp_customize->add_setting( 'rock_n_rolla_facebook_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_facebook_setting',
			'priority'    => 1,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_twitter_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_twitter_setting',
			'priority'    => 2,
		) ) );
		
		$wp_customize->add_setting( 'rock_n_rolla_google_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_google', array(
			'label'    => __( 'Enter your Google+ url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_google_setting',
			'priority'    => 3,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_pinterest_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_pinterest', array(
			'label'    => __( 'Enter your Pinterest url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_pinterest_setting',
			'priority'    => 4,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_linkedin_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_linkedin_setting',
			'priority'    => 5,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_youtube_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_youtube', array(
			'label'    => __( 'Enter your Youtube url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_youtube_setting',
			'priority'    => 6,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_tumblr_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_tumblr', array(
			'label'    => __( 'Enter your Tumblr url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_tumblr_setting',
			'priority'    => 7,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_instagram_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_instagram', array(
			'label'    => __( 'Enter your Instagram url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_instagram_setting',
			'priority'    => 8,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_flickr_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_flickr', array(
			'label'    => __( 'Enter your Flickr url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_flickr_setting',
			'priority'    => 9,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_vimeo_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_vimeo', array(
			'label'    => __( 'Enter your Vimeo url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_vimeo_setting',
			'priority'    => 1,
		) ) );
		$wp_customize->add_setting( 'rock_n_rolla_rss_setting', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_rss', array(
			'label'    => __( 'Enter your RSS url', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_rss_setting',
			'priority'    => 11,
		) ) );
	
		$wp_customize->add_setting( 'rock_n_rolla_email_setting', array (			
			'sanitize_callback' => 'sanitize_email',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rock_n_rolla_email', array(
			'label'    => __( 'Enter your email address', 'rock-n-rolla' ),
			'section'  => 'rock_n_rolla_social_section',
			'settings' => 'rock_n_rolla_email_setting',
			'priority'    => 12,
		) ) );
		
		/* color option */
		$wp_customize->add_setting( 'rock_n_rolla_primary_color_setting', array (
			'default'     => '#ed145b',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rock_n_rolla_primary_color', array(
			'label'    => __( 'Theme Primary Color', 'rock-n-rolla' ),
			'section'  => 'colors',
			'settings' => 'rock_n_rolla_primary_color_setting',
		) ) );
		
	}
endif;

add_action('customize_register', 'rock_n_rolla_theme_customizer');

function rock_n_rolla_sanitize_textarea( $text ) {
	return esc_textarea( $text );
}

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'rock_n_rolla_sanitize_integer' ) ) :
	function rock_n_rolla_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */

if (!function_exists( 'rock_n_rolla_sanitize_checkbox' ) ) :
	function rock_n_rolla_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'rock_n_rolla_sanitize_category' ) ){
	function rock_n_rolla_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

function rock_n_rolla_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}

if ( ! function_exists( 'rock_n_rolla_apply_color' ) ) :
  function rock_n_rolla_apply_color() {
	?>
	<style id="color-settings">
	<?php if (esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')) ) { ?>
		a, .entry-title a, .widget ul li a:hover, .pagination, .read_more:hover, .site-info a:hover {color:<?php echo esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')); ?>}
		
		.widget-title:before, .section-label:before{ border-bottom:solid 4px <?php echo esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')); ?>}
		
		.read_more, .read_more:hover{ border:solid 2px <?php echo esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')); ?>!important}
		
		.gallery-item a img:hover{ border:solid 5px <?php echo esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')); ?>}
		
		.read_more,.main-navigation li:hover > a, .main-navigation li.focus > a, button, input[type="button"], input[type="reset"], input[type="submit"], .social-meidia li a:hover, #search-icon i:hover, .next .fa-chevron-right, .prev .fa-chevron-left, .tagcloud a, .comment-reply-link, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a{background:<?php echo esc_html(get_theme_mod('rock_n_rolla_primary_color_setting')); ?>}
	<?php } ?>
	
	</style>
	<?php	  
  }
endif;
add_action( 'wp_head', 'rock_n_rolla_apply_color' );
