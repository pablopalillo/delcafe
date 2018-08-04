<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container <?php if(has_post_thumbnail()){ echo 'post-hover';}?>">
		<?php if(has_post_thumbnail()){ ?>
            <div class="post-thumbnail front">
                <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('rock-n-rolla-featured-thumbnail'); ?></a>
            </div>
        <?php }?>
        <div class="post-details <?php if(has_post_thumbnail()){ echo 'back';}else{echo 'front';}?>">
        	<div class="entry-content">
                <header class="entry-header">
                    <?php
                        if ( is_single() ) {
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        } else {
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        }
            
                    if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php rock_n_rolla_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </header><!-- .entry-header -->
        
                <?php
                    the_excerpt();
                ?>
                <div class="button-container">
                    <a href="<?php the_permalink('') ?>" class="read_more"><?php esc_html_e( 'Read More', 'rock-n-rolla' ); ?></a>
                </div>
            </div><!-- .entry-content -->
        </div><!--post-details-->
	</div>
</article><!-- #post-## -->
<div class="bottom-border"></div>