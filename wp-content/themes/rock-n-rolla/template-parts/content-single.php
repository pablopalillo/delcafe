<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();
		?>
		<?php 
			 wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock-n-rolla' ),
                'after'  => '</div>',
            ) );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
