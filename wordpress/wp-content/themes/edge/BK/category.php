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
								<!--<div class="cat_overlay">
									<div class="cat_excerpt">
										<div class="cat_text">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>-->
							</div>
							<div class="cat_titulo">
								<h2>
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</h2>
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