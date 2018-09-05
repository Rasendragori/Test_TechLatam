<?php get_header('noimage') ?>
		<div class="container" style="padding-top: 20px;">
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- post -->
					<div class="col-lg-4 col-md-6">
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
							<div class="cat_titulo">
								<h2>
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</h2>
							</div>
							<div class="row" style="margin: 0px;padding:  0px 15px;">
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
							<div class="entry-content" style="padding: 0px 15px;">
									<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<!-- post navigation -->
					<div class="col-12 paginacion" style="text-align: center;">
						<?php
							the_posts_pagination(
								array(
									'mid_size'  => 2,
									'prev_text' => __( 'Nuevas', 'textdomain' ),
									'next_text' => __( 'Antiguas', 'textdomain' ),
								)
							);
						?>
					</div>
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
			</div>
		</div>
<?php get_footer() ?>