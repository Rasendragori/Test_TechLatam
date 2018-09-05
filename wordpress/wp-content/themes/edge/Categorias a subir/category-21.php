<!-- PUNTO Y COMA -->

<?php get_header('noimage'); ?>
<?php $edge_settings = edge_get_theme_options(); ?>
	<div class="row">
		<div class="primary col-md-8" style="padding-right: 25px;">
			<main id="main" class="site-main clearfix">
				<div class="row">
					<?php
						if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
						elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
						else { $paged = 1; }
						$args = array(
							'cat'=>21,
						  'posts_per_page' => 2,
						  'paged' => $paged
						);

						$the_query = new WP_Query( $args ); 
					?>
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<!-- post -->

						<div class="col-lg-12">
							<a href="<?php the_permalink(); ?>" class="image featured img_pc">
								<?php
									// check if the post has a Post Thumbnail assigned to it.
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('category-thumb');
								}
								?>
							</a>
							<h2 class="entry-title" style="padding: 15px 0 15px 0; font-family: helvetica; text-align: left;">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</a>
							<div class="entry-content">
								<p>
									<?php the_excerpt(); ?>
								</p>
							</div>
							<div id="comments" class="comments-area">
								<ol class="comment-list">
									<?php
										$comments = get_comments(array(
											'post_id' => get_the_ID(),
											'status' => 'approve' //Change this to the type of comments to be displayed
										));
									?>
									<?php
										wp_list_comments( array(
											'style'       => 'ol',
											'short_ping'  => true,
											'avatar_size' => 56,
										) );
									?>
								</ol>
							</div>
						</div>

					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?> 
				</div>
			</main>
			<?php get_template_part( 'pagination', 'none' );
					if( 'default' == $layout ) { //Settings from customizer
						if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')): ?>
							</div> <!-- #primary -->
							<?php endif;
					} ?>
		</div>

		<?php if ( is_active_sidebar( 'pc_sidebar' ) ) : ?>
			<div id="secondary" class="widget-area col-md-4" role="complementary">
				<div class="row" style="padding-bottom: 15px;">
					<div class="col-md-12 lomasleido_pc">
						<h2>LO MÁS LEIDO</h2>
					</div>
						<?php
							$args = array(
								'cat'=> 21,
							    'posts_per_page' => 3,
							    'meta_key' => 'post_views',
							    'orderby' => 'meta_value_num',
							    'order' => 'DESC'
							);
							 
							$popular_posts = new WP_Query( $args );
							while ( $popular_posts->have_posts() ) : $popular_posts->the_post();
						?>
							<div class="col-md-12" style="padding-bottom: 10px">
								<h2 class="entry-title" style="font-size: 15px; font-family: verdana; text-align: left; padding: 0px; text-transform: uppercase;">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<a class="populares_fecha_pc" title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
									<?php the_time( get_option( 'date_format' ) ); ?>
								</a>
							</div>
						<?php endwhile;?>
				</div>			
							<?php wp_reset_query(); ?>
				<?php dynamic_sidebar( 'pc_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>
<?php get_footer() ?>