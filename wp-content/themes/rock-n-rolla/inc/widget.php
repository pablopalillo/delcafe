<?php
add_action( 'widgets_init', 'rock_n_rolla_init_recent_posts' );

function rock_n_rolla_init_recent_posts() { return register_widget('rock_n_rolla_recent_posts'); }

class rock_n_rolla_recent_posts extends WP_Widget {
	/** constructor */
	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, __( 'Rock N Rolla Recent Post', 'rock-n-rolla' ) );
	}
	
	// Widget	
	function widget( $args, $instance ) {
		global $post;
		extract($args);

		// Widget options
		$title 	 = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Rock N Rolla Recent Post', 'rock-n-rolla' ) : $instance['title'], $instance, $this->id_base ); // Title		
		/*$cpt 	 = $instance['types'];*/ // Post type(s) 		
	    $types   = 'post';
		$number	 = absint($instance['number']); // Number of posts to show
		
        // Output
		echo $before_widget;
		
	    if ( $title ) echo $before_title . $title . $after_title;
			
		$rnrq = new WP_Query(array( 'post_type' => $types, 'showposts' => $number ));
		if( $rnrq->have_posts() ) : 
		?>
		<ul class="rock-n-rolla-recent-post">
		<?php while($rnrq->have_posts()) : $rnrq->the_post(); ?>
		<li class="clearfix">
        	<div class="rock_n_rolla_post_recent post-image">
			<?php if ( $instance['display_featured_image'] && has_post_thumbnail() ) {?>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
            <?php
                the_post_thumbnail('rock-n-rolla-widget-post-thumb', array('class' => 'alignleft'));
            ?>
                </a>
            <?php
            } ?>
            </div>
            <div class="rock_n_rolla_post_recent post-details">
                <h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h5>
                <div class="meta-info">
                    <span class="meta-info-date"><?php the_time('F j, Y');  ?></span><span class="post-author"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo ' - ';the_author(); ?></a></span>
                    <?php if( comments_open() ) { ?>
                        <div class="meta-info-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php echo __('Leave a Comment', 'rock-n-rolla') ?></a></div>
                    <?php } else{?>
                        <div class="meta-info-comment"><?php echo __('Comment is Closed', 'rock-n-rolla') ?></a></div>
                    <?php }?>
                </div>
            </div>
        </li>
		<?php wp_reset_postdata(); 
		endwhile; ?>
		</ul>
			
		<?php endif; ?>			
		<?php
		// echo widget closing tag
		echo $after_widget;
	}

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;	
		
		//Let's turn that array into something the Wordpress database can store
		$instance['title']  = esc_html( $new_instance['title'] );
		$instance['types'] = ( in_array( $new['types'], array( 'posts', 'pages' ) ) ) ? $new['types'] : 'posts';
		$instance['number'] = absint( $new_instance['number'] );
		$instance['display_featured_image'] = (bool) $new_instance['display_featured_image'];
		return $instance;
	}
	
	
	// Widget settings	
	function form( $instance ) {	
			$number = 5;
			$display_featured_image = 0;
		    // instance exist? if not set defaults
		    if ( $instance ) {
				$title  = $instance['title'];
		        $types  = $instance['types'];
		        $number = absint($instance['number']);
				$display_featured_image = (bool) $instance['display_featured_image'];
		    } 
			
			//Let's turn $types into an array
			$types = 'post';
			// The widget form
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e( 'Title:', 'rock-n-rolla' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)) { echo $title; } ?>" class="widefat" />
			</p>
			<p>
            	<input type="checkbox" name="<?php echo $this->get_field_name('display_featured_image'); ?>"  <?php checked( $display_featured_image, 1 ); ?> value="1" /> 			
                <label for="<?php echo $this->get_field_id('display_featured_image'); ?>"> <?php esc_html_e( 'Display Thumbnail:', 'rock-n-rolla' ); ?></label>
            </p>
			<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"> <?php esc_html_e( 'Number of posts to show:', 'rock-n-rolla' ); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>
	<?php 
	}
	

} // class rcp_recent_posts
?>
