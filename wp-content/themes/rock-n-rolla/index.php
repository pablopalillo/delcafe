<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

get_header(); ?>
	<div class="container">
    	<?php 
		$displayayer = get_theme_mod( 'rock_n_rolla_display_album_setting', 0 );
		if ( $displayayer == 1 ) { ?>
            <div id="sc-playlist">
            	<?php if ( get_theme_mod( 'rock_n_rolla_album_label' ) ) { ?>
                	<h1 class="section-label"><?php echo esc_html(get_theme_mod( 'rock_n_rolla_album_label' )); ?><!--Newest Album--></h1>
                <?php } ?>
                <?php echo rock_n_rolla_audio(); ?>
            </div>
        <?php } ?>
        
		<div id="primary" class="content-area">
            <div class="row">
                <div class="col-md-8">
                    <main id="main" class="site-main" role="main">
                   
					<h1 class="section-label"><?php if ( get_theme_mod( 'rock_n_rolla_post_label' ) ) { echo esc_html(get_theme_mod( 'rock_n_rolla_post_label' )); } else { esc_attr_e('Latest post', 'rock-n-rolla');}?><!--Newest Album--></h1>
                     
                    <?php
                    if ( have_posts() ) :
            
                        if ( is_home() && ! is_front_page() ) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
            
                        <?php
                        endif;
            
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
            
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );
            
                        endwhile;
            
                    else :
            
                        get_template_part( 'template-parts/content', 'none' );
            
                    endif; ?>
            
                    </main><!-- #main -->
                     <?php the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => '<span class="fa fa-chevron-left"></span>',
						'next_text' => '<span class="fa fa-chevron-right"></span>'
					) ); 
					?>
				</div>
            
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
			</div><!-- row -->
    	</div><!-- #primary -->
	</div>
<?php
get_footer();
