<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

get_header(); ?>

	
        
<?php
while ( have_posts() ) : the_post();
?>
	<div class="header-container">
		<?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
        <header class="entry-header" >
            <div class="black-overlay">
                <?php
                    if ( is_single() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    } else {
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    } 
                ?>
            </div>
        </header><!-- .entry-header -->
    </div>
    <div class="container">
        <div id="primary" class="content-area">
            <div class="row">
                <div class="col-md-8">
                    <main id="main" class="site-main" role="main">
                        <?php	
                            get_template_part( 'template-parts/content', ('single') );
                
                            the_post_navigation();
                
                        ?>
                    </main><!-- #main -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div><!--row-->
        </div><!-- #primary -->
    </div><!-- container -->
<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
