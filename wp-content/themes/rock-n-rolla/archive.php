<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

get_header(); ?>
	<div class="container">
        <div id="primary" class="content-area archive-template">
        	<div class="row>">
            	<div class="col-md-8">
                    <main id="main" class="site-main" role="main">
            
                    <?php
                    if ( have_posts() ) : ?>
            
                        <header class="page-header">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->
            
                        <?php
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
            </div>
        </div><!-- #primary -->
    </div><!-- container -->

<?php
get_footer();
