<?php

/*------------------------------------------*/
/* WPZOOM: Featured Category widget			*/
/*------------------------------------------*/

$wpzoomColors = array();
$wpzoomColors['blue'] = 'Blue';
$wpzoomColors['red'] = 'Red';
$wpzoomColors['green'] = 'Green';
$wpzoomColors['black'] = 'Black';
$wpzoomColors['orange'] = 'Orange';
$wpzoomColors['purple'] = 'Purple';

class wpzoom_widget_category_2cols extends WP_Widget {

	/* Widget setup. */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'wpzoom-featured-cat', 'description' => __('2 Featured Categories Widget for Homepage', 'wpzoom') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'wpzoom-featured-cat-2cols' );

		/* Create the widget. */
		parent::__construct( 'wpzoom-featured-cat-2cols', __('Featured Categories (2 columns)', 'wpzoom'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen. */
	function widget( $args, $instance ) {

		extract( $args );

		/* Our variables from the widget settings. */
        $title1 = apply_filters('widget_title', $instance['title1'] );
		$title2 = apply_filters('widget_title', $instance['title2'] );
        $color1 = $instance['color1'];
		$color2 = $instance['color2'];
 		$posts = $instance['posts'];

        $category1 = get_category($instance['category1']);
        if ($category1) {
            $categoryLink1 = get_category_link($category1);
        }

        $category2 = get_category($instance['category2']);
        if ($category2) {
            $categoryLink2 = get_category_link($category2);
        }
 		/* Before widget (defined by themes). */
 		echo $before_widget;

        $i = 0;
        $m = 2;

        ?>

        <div class="featured-grid featured-style-style_text">

        <?php
        while ($i < $m) {

			$show_title 		= $instance['show_title'] ? true : false;
			$show_excerpt 		= $instance['show_excerpt'] ? true : false;
			$show_date 			= $instance['show_date'] ? true : false;
			$show_comments 		= $instance['show_comments'] ? true : false;

            $i++;
            $categoryid = 'category' . $i;
            $title = 'title' . $i;
            $color = 'color' . $i;
            $categoryLink = 'categoryLink' . $i;

            ?>

            <div class="featured_category_2col">

            <?php
			if ( $$title && $show_title )  {
				echo '<h3 class="title title-color-'.$$color.'">';
				echo '<a href="'.$$categoryLink.'">'.$$title.'</a>';
				echo $after_title;
	       	}

		       	?>

	          	<?php
	            $second_query = new WP_Query( array( 'cat' => $$categoryid->cat_ID, 'showposts' => $posts,  'orderby' => 'date',  'order' => 'DESC' ) );
                $z = 0;
	              if ( $second_query->have_posts() ) : while( $second_query->have_posts() ) : $second_query->the_post();
                $z++;
	              global $post;

	               if ($z == 1)
                   { ?>

					 	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    					 		        <?php the_post_thumbnail('widget-2posts'); ?>
                                    </a>
                                </div>
                            <?php } ?>

							<div class="post_content">

                                <h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

    							<div class="entry-meta">

    								<?php if ( $show_date ) { ?><span class="entry-date"><?php echo get_the_date(); ?></span><?php } ?>
    								<?php if ( $show_comments ) { ?><span class="comments-link"><?php comments_popup_link( __('0 comments', 'wpzoom'), __('1 comment', 'wpzoom'), __('% comments', 'wpzoom'), '', __('Comments are Disabled', 'wpzoom')); ?></span><?php } ?>
    							</div>

    							<?php if ($show_excerpt) { the_excerpt(); } ?>

                            </div>

						</div>

                        <ul class="feat-cat_small_list">

                            <?php } else { ?>

                                <li>
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('widget-small'); ?>
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <div class="post-content">

                                        <h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

                                        <div class="entry-meta">
                                            <?php if ( $show_date ) { ?><span class="entry-date"><?php echo get_the_date(); ?></span><?php } ?>
                                            <?php if ( $show_comments ) { ?><span class="comments-link"><?php comments_popup_link( __('0 comments', 'wpzoom'), __('1 comment', 'wpzoom'), __('% comments', 'wpzoom'), '', __('Comments are Disabled', 'wpzoom')); ?></span><?php } ?>
                                        </div>

                                    </div>

                                </li>

                           <?php } ?>

					       <?php endwhile; ?>

                        </ul>

					<?php endif; ?>
				</div><!-- /.featured-grid -->



			<?php
		}
		wp_reset_postdata();

        ?>

        </div>

        <?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


	/* Update the widget settings.*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title1'] = sanitize_text_field( $new_instance['title1'] );
		$instance['title2'] = sanitize_text_field( $new_instance['title2'] );
        $instance['color1'] = $new_instance['color1'];
		$instance['color2'] = $new_instance['color2'];
        $instance['category1'] = ( 0 <= (int) $new_instance['category1'] ) ? (int) $new_instance['category1'] : null;
 		$instance['category2'] = ( 0 <= (int) $new_instance['category2'] ) ? (int) $new_instance['category2'] : null;

		$instance['posts'] = ( 0 != (int) $new_instance['posts'] ) ? (int) $new_instance['posts'] : null;

		$instance['show_title']       = (bool) $new_instance['show_title'];
		$instance['show_excerpt']    	  = (bool) $new_instance['show_excerpt'];
		$instance['show_date']    	  = (bool) $new_instance['show_date'];
		$instance['show_comments']    = (bool) $new_instance['show_comments'];

		return $instance;
	}

	/** Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff. */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title1' => ' ', 'color1' => '', 'category1' => '', 'title2' => ' ', 'color2' => '', 'category2' => '',  'show_title' => true, 'posts' => '3',    'show_excerpt' => false, 'show_date' => true, 'show_comments' => true );
		$instance = wp_parse_args( (array) $instance, $defaults );
		global $wpzoomColors;
    ?>

        <p><strong><?php _e('FEATURED CATEGORY 1', 'wpzoom'); ?></strong></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php esc_html_e('Title:', 'wpzoom'); ?></label>
            <input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo esc_attr( $instance['title1'] ); ?>"   />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id('color1'); ?>"><?php _e('Widget Title Color:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('color1'); ?>" name="<?php echo $this->get_field_name('color1'); ?>" style="width:90%;">
			<?php
				foreach ($wpzoomColors as $key => $value) {
				$option = '<option value="'.$key;
				if ($key == $instance['color1']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $value;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('category1'); ?>"><?php esc_html_e('Category:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('category1'); ?>" name="<?php echo $this->get_field_name('category1'); ?>" style="width:90%;">
				<option value="0"><?php esc_html_e( 'Choose category:', 'wpzoom' ); ?></option>
				<?php
				$cats = get_categories('hide_empty=0');

				foreach ($cats as $cat) {
				$option = '<option value="'.$cat->term_id;
				if ($cat->term_id == $instance['category1']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= esc_attr( $cat->cat_name );
				$option .= ' ('.$cat->category_count.')';
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

<br />
                <hr />
                <br />
                <p><strong><?php _e('FEATURED CATEGORY 2', 'wpzoom'); ?></strong></p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php esc_html_e('Title:', 'wpzoom'); ?></label>
                    <input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo esc_attr( $instance['title2'] ); ?>"   />
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id('color2'); ?>"><?php _e('Widget Title Color:', 'wpzoom'); ?></label>
                    <select id="<?php echo $this->get_field_id('color2'); ?>" name="<?php echo $this->get_field_name('color2'); ?>" style="width:90%;">
                    <?php
                        foreach ($wpzoomColors as $key => $value) {
                        $option = '<option value="'.$key;
                        if ($key == $instance['color2']) { $option .='" selected="selected';}
                        $option .= '">';
                        $option .= $value;
                        $option .= '</option>';
                        echo $option;
                        }
                    ?>
                    </select>
                </p>


                <p>
                    <label for="<?php echo $this->get_field_id('category2'); ?>"><?php esc_html_e('Category:', 'wpzoom'); ?></label>
                    <select id="<?php echo $this->get_field_id('category2'); ?>" name="<?php echo $this->get_field_name('category2'); ?>" style="width:90%;">
                        <option value="0"><?php esc_html_e( 'Choose category:', 'wpzoom' ); ?></option>
                        <?php
                        $cats = get_categories('hide_empty=0');

                        foreach ($cats as $cat) {
                        $option = '<option value="'.$cat->term_id;
                        if ($cat->term_id == $instance['category2']) { $option .='" selected="selected';}
                        $option .= '">';
                        $option .= esc_attr( $cat->cat_name );
                        $option .= ' ('.$cat->category_count.')';
                        $option .= '</option>';
                        echo $option;
                        }
                    ?>
                    </select>
                </p>
                <br />
                <hr />
                <br />
                    <p><strong><?php _e('GENERAL SETTINGS', 'wpzoom'); ?></strong></p>


                    <p>
                        <input class="checkbox" type="checkbox" <?php checked( $instance['show_title'] ); ?> id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" />
                        <label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php esc_html_e('Display Widget Title', 'wpzoom'); ?></label>
                    </p>


                    <p>
                        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php esc_html_e('Numbers of posts in each category:', 'wpzoom'); ?></label>
                        <select id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" style="width:90%;">
                        <?php
                            $m = 0;
                            while ($m < 6) {
                            $m++;
                            $option = '<option value="'.$m;
                            if ($m == $instance['posts']) { $option .='" selected="selected';}
                            $option .= '">';
                            $option .= $m;
                            $option .= '</option>';
                            echo $option;
                            }
                        ?>
                        </select>
                    </p>


                    <p>
                        <input class="checkbox" type="checkbox" <?php checked( $instance['show_excerpt'] ); ?> id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" />
                        <label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php esc_html_e('Display Excerpt on 1st Post?', 'wpzoom'); ?></label>
                    </p>


                    <p>
                        <input class="checkbox" type="checkbox" <?php checked( $instance['show_date'] ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
                        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e('Display Date', 'wpzoom'); ?></label>
                    </p>

                    <p>
                        <input class="checkbox" type="checkbox" <?php checked( $instance['show_comments'] ); ?> id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>" />
                        <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php esc_html_e('Display Comments Number', 'wpzoom'); ?></label>
                    </p>




	<?php
	}
}

function wpzoom_register_category_widget_2cols() {
	register_widget('wpzoom_widget_category_2cols');
}
add_action('widgets_init', 'wpzoom_register_category_widget_2cols');
?>