<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses rock_n_rolla_header_style()
 */
function rock_n_rolla_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'rock_n_rolla_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1920,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'rock_n_rolla_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'rock_n_rolla_custom_header_setup' );

if ( ! function_exists( 'rock_n_rolla_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see rock_n_rolla_custom_header_setup().
 */
function rock_n_rolla_header_style() {
	$header_text_color = get_header_textcolor();


	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
