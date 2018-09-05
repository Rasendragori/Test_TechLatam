<?php
/**
 * The main template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Freesia
 * @subpackage Edge
 * @since Edge 1.0
 */

get_header('noimage'); ?>
			<div  id="content" style="text-align: center; padding-top: 10px;">
				<img class="imagen-responsive" src="http://tuespacio.clicknetsystem.com/wp-content/uploads/2018/02/bannertop.png">
			</div>
			<div class="row">
				<div class="col-12" style="padding-bottom: 25px;">
					<div id="primary">
						<main id="main" class="site-main clearfix">
							<?php $principal = new WP_Query( 'cat=28&posts_per_page=1' ); ?>
							<?php if ( $principal->have_posts() ) : while ( $principal->have_posts() ) : $principal->the_post(); ?>
							<!-- post -->
									<div class="principal_index">
										<a href="<?php the_permalink(); ?>" class="image featured">
											<?php
												// check if the post has a Post Thumbnail assigned to it.
											if ( has_post_thumbnail() ) {
												the_post_thumbnail('category-thumb');
											}
											?>
										</a>
										<?php
										$categories = get_the_category();
										$post_img= get_the_post_thumbnail();
										if (! empty($post_img)) {
											# code...
											echo '<div class="topleft"><a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) .'">'.esc_html( $categories[0]->name ).'</a></div>';
										}
										?>
										<h2 class="entry-title" style="padding: 15px 0 15px 0;">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="entry-meta container">
											<div class="row" style="margin: 0px;">
												<div class="edi_author_name col-6" style="text-align: left;">
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
														Por: <?php the_author(); ?>
													</a>
												</div>
												<span class="posted-on col-6" style="text-align: right;">
													<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
														<?php the_time( get_option( 'date_format' ) ); ?>
													</a>
												</span>
											</div>
										</div>
										<div class="entry-content">
												<?php the_excerpt(); ?>
										</div>
									</div>
							<?php endwhile; ?>
							<!-- post navigation -->
							<?php else: ?>
							<!-- no posts found -->
							<?php endif; ?>
							<?php wp_reset_query() ?>
							<div class="row">
							<?php
								/**
								*
								*       The Code below will modify the main WordPress loop, before the queries fired,
								*   to only show posts in the halloween category on the home page.
								*
								
								    function sbt_exclude_category($query){
								         
								        if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
								             
								            $query->set( 'cat', '2' );
								        }
								    }
								    add_action('pre_get_posts','sbt_exclude_category');*/
								    /*$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								    if ( get_query_var( 'paged' ) ) {
								    	$paged = get_query_var( 'paged' );
								    } elseif ( get_query_var( 'page' ) ) {
								    	$paged = get_query_var( 'page' );
								    } else {
								    	$paged = 1;
								    }
								    $query = new WP_Query( 'cat=2&posts_per_page=4&paged='.$paged );*/
								    if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
									elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
									else { $paged = 1; }
									$args = array(
										'cat' => 7,
										'posts_per_page' => 4,
										'paged'          => $paged
									);

									$query = new WP_Query( $args ); 
							?>
							<?php
							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();?>
									<div class="col-lg-6">
										<a href="<?php the_permalink(); ?>" class="image featured">
											<div class="img_post">
												<?php
													// check if the post has a Post Thumbnail assigned to it.
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('category-thumb');
												}
												?>
											</div>
										</a>
										<?php
										$categories = get_the_category();
										$post_img= get_the_post_thumbnail();
										if (! empty($post_img)) {
											# code...
											echo '<div class="topleft"><a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) .'">'.esc_html( $categories[0]->name ).'</a></div>';
										}
										?>
										<h2 class="entry-title" style="padding: 15px 0 15px 0;">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="entry-meta container">
											<div class="row" style="margin: 0px;">
												<div class="edi_author_name col-6" style="text-align: left;">
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
														Por: <?php the_author(); ?>
													</a>
												</div>
												<span class="posted-on col-6" style="text-align: right;">
													<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
														<?php the_time( get_option( 'date_format' ) ); ?>
													</a>
												</span>
											</div>
										</div>
										<div class="entry-content">
												<?php the_excerpt(); ?>
										</div>
									</div>
								<?php } ?>

							<?php }
							else { ?>
							<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'edge' ); ?> </h2>
							<?php } ?>
						</div>
						</main> <!-- #main -->
						<?php
							/*the_posts_pagination(
								array(
									'mid_size'  => 2,
									'prev_text' => __( 'Anterior', 'textdomain' ),
									'next_text' => __( 'Siguiente', 'textdomain' ),
								)
							)*/
						;?>
					</div>
					<?php if ( is_active_sidebar( 'principal_sidebar' ) ) : ?>
						<div id="secondary" class="sidebar_principal">
							<div class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'principal_sidebar' ); ?>
							</div><!-- #primary-sidebar -->
							<div style="margin-bottom: 15px;">
								<h2 class="widgettitle">COLUMNA DE OPINIONES</h2>
							</div>
							<div class="row col_opinion">
								<?php
								$args1 = array(
										'cat' => 27,
										'posts_per_page' => 3,
										'paged'          => $paged
									);

									$col_opinion = new WP_Query( $args1 );
								?>
								<?php if ( $col_opinion->have_posts() ) : while ( $col_opinion->have_posts() ) : $col_opinion->the_post(); ?>
								<!-- post -->
									<div class="col-md-3">
										<a href="<?php the_permalink(); ?>">
											<?php
											echo get_avatar( get_the_author_meta( 'ID' ), 256 );
											?>
										</a>
									</div>
									<div class="col-md-9">
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="edi_author_name">
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
												Por: <?php the_author(); ?>
											</a>
										</div>
									</div>
								<?php endwhile; ?>
								<!-- post navigation -->
								<?php else: ?>
								<!-- no posts found -->
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-12" style="text-align: center;">
					<h2>FOTOREPORTAJES</h2>
				</div>
				<div class="col-12">
					<?php
						$args4 = array(
							'cat' => 31
						);

						$dest_fotorep = new WP_Query( $args4 );
					?>
					<?php if ( $dest_fotorep->have_posts() ) : while ( $dest_fotorep->have_posts() ) : $dest_fotorep->the_post(); ?>
					<!-- post -->
						<div>
							<div class="polaroid">
								<div class="cat_imagen">
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<?php
								$categories = get_the_category();
								$post_img= get_the_post_thumbnail();
								if (! empty($post_img)) {
									# code...
									echo '<div class="topleft"><a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) .'">'.esc_html( $categories[0]->name ).'</a></div>';
								}
								?>
								<div>
									<h2 class="entry-title dest_fotorep">
										<a href="<?php the_permalink();?>">
											<?php the_title();?>
										</a>
									</h2>
								</div>
								<div class="entry-meta container" style="padding: 15px; padding-bottom: 0px; padding-top: 0px">
									<div class="row" style="margin: 0px;">
										<div class="edi_author_name col-6" style="text-align: left;">
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
												Por: <?php the_author(); ?>
											</a>
										</div>
										<span class="posted-on col-6" style="text-align: right;">
											<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
												<?php the_time( get_option( 'date_format' ) ); ?>
											</a>
										</span>
									</div>
								</div>
								<div class="entry-content" style="padding: 15px; padding-bottom: 0px; padding-top: 0px">
										<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
				</div>
				<div class="col-12" style="margin-bottom: 20px;">
					<?php echo do_shortcode( "[carousel_slide id='162']" ) ?>
				</div>
				<div class="col-12" style="text-align: center;">
					<h2>VIDEOS</h2>
				</div>
				<div class="col-12">
					<?php
						$args5 = array(
							'cat' => 32
						);

						$dest_videos_query = new WP_Query( $args5 );
					?>
					<?php if ( $dest_videos_query->have_posts() ) : while ( $dest_videos_query->have_posts() ) : $dest_videos_query->the_post(); ?>
					<!-- post -->
						<div>
							<div class="polaroid">
								<div class="cat_imagen">
									<a href="<?php the_permalink();?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<?php
								$categories = get_the_category();
								$post_img= get_the_post_thumbnail();
								if (! empty($post_img)) {
									# code...
									echo '<div class="topleft"><a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) .'">'.esc_html( $categories[0]->name ).'</a></div>';
								}
								?>
								<div>
									<h2 class="entry-title dest_videos">
										<a href="<?php the_permalink();?>">
											<?php the_title();?>
										</a>
									</h2>
								</div>
								<div class="entry-content" style="padding: 15px">
										<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
				</div>
				<div class="col-12" style="margin-bottom: 20px;">
					<?php echo do_shortcode( "[carousel_slide id='151']" ) ?>
				</div>
			</div>
			
				<?php
				/*get_template_part( 'pagination', 'none' );
				if( 'default' == $layout ) { //Settings from customizer
					if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')): ?>
						</div> <!-- #primary -->
						<?php endif;
				}*/
get_footer();