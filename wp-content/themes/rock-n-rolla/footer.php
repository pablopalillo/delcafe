<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rock_N_Rolla
 * @since Rock_N_Rolla 1.0
 */

?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="footer-widget-container">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
				</div>
			</div>
        </div>
        
        <div class="copy-right">
            <div class="container">
            	<div class="row">
                	
                    <div class="col-md-6 col-md-push-6">
                    	<ul class="social-media">
							<?php if ( get_theme_mod( 'rock_n_rolla_facebook_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_facebook_setting' ) ); ?>" title="<?php esc_attr_e('Facebook', 'rock-n-rolla'); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_twitter_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_twitter_setting' ) ); ?>" title="<?php esc_attr_e('Twitter', 'rock-n-rolla'); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_google_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_google_setting' ) ); ?>" title="<?php esc_attr_e('Google Plus', 'rock-n-rolla'); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_pinterest_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_pinterest_setting' ) ); ?>" title="<?php esc_attr_e('Pinterest', 'rock-n-rolla'); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_linkedin_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_linkedin_setting' ) ); ?>" title="<?php esc_attr_e('Linkedin', 'rock-n-rolla'); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_youtube_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_youtube_setting' ) ); ?>" title="<?php esc_attr_e('Youtube', 'rock-n-rolla'); ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_tumblr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_tumblr_setting' ) ); ?>" title="<?php esc_attr_e('Tumbler', 'rock-n-rolla'); ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_instagram_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_instagram_setting' ) ); ?>" title="<?php esc_attr_e('Instagram', 'rock-n-rolla'); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_flickr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_flickr_setting' ) ); ?>" title="<?php esc_attr_e('Flicker', 'rock-n-rolla'); ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_vimeo_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_vimeo_setting' ) ); ?>" title="<?php esc_attr_e('Vimeo', 'rock-n-rolla'); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'rock_n_rolla_rss_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'rock_n_rolla_rss_setting' ) ); ?>" title="<?php esc_attr_e('RSS', 'rock-n-rolla'); ?>"><i class="fa fa-rss"></i></a></li>
                            <?php } ?>  
                            <?php if ( get_theme_mod( 'rock_n_rolla_email_setting' ) ) : ?>
                                <li><a href="<?php esc_attr_e('mailto:', 'rock-n-rolla'); echo sanitize_email( get_theme_mod( 'rock_n_rolla_email_setting' ) ); ?>"  title="<?php esc_attr_e('Email', 'rock-n-rolla'); ?>"><i class="fa fa-envelope"></i></a></li>
                        <?php endif; ?>   
                                                                        
                        </ul>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <div class="site-info">
                           
                                <?php echo '&copy; ' . esc_attr( 'PabloPalillo' ) ?>
                           
                        </div><!-- .site-info -->
                    </div>
                    
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
