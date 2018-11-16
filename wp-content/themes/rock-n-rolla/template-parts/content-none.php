<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '¡Upps! Al parecer no encontramos lo que buscabas', 'rock-n-rolla' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rock-n-rolla' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>Puedes verificar que tus palabras de búsqueda sean correctas.</p>

			<p>Si definitivamente no encontraste lo que buscabas, hay muchos lugares con características similares que puedes encontrar en nuestro directorio.</p>

			<div class="search-page-form">
				<?php get_search_form(); ?>	
			</div>
		
		<?php else : ?>

			<p>Puedes verificar que tus palabras de búsqueda sean correctas.</p>
			
			<p>Si definitivamente no encontraste lo que buscabas, hay muchos lugares con características similares que puedes encontrar en nuestro directorio.</p>

			<div class="search-page-form">
				<?php get_search_form(); ?>	
			</div>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
