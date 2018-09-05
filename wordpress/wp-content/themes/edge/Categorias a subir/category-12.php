<!-- DIAFRAGMA -->

<?php get_header('noimage'); ?>
	<?php $edge_settings = edge_get_theme_options(); ?>
	<div class="container">
	<div class="row">
		<div class="primary col-lg-12">
			<div class="row">
				<?php
					query_posts(array(
						"showposts" => 1,
						"cat" => 12
					) );
				?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- post -->
					<div class="col-md-8">
						<a href="<?php the_permalink(); ?>" class="image featured">
							<?php
								// check if the post has a Post Thumbnail assigned to it.
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('category-thumb');
							}
							?>
						</a>
					</div>
					<div class="col-md-4">
						<h2 class="entry-title" style="padding: 15px 0 15px 0;">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="entry-meta">
							<span class="posted-on">
								<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
									<?php the_time( get_option( 'date_format' ) ); ?>
								</a>
							</span>
						</div>
						<div class="entry-content">
							<p>
								<?php the_excerpt(); ?>
							</p>
						</div>
					</div>
				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<h1>No hay nada para mostrar</h1>
				<?php endif; ?>
			</div>
			<div style="padding: 20px 0 20px 0;" class="row">
				<div class="col-md-8">
					<?php echo do_shortcode( "[carousel_slide id='151']" ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<h1 style="font-family: helvetica; font-size: 25px;">Los mejores videos de TU ESPACIO</h1>
				</div>
				<div class="col-lg-7">
					<hr >
				</div>
			</div>
			<main id="main" class="site-main clearfix">
				<div class="row">
					
					<?php
						$args = array(
							'cat'=> 12,
						    'posts_per_page' => 4,
						    'meta_key' => 'post_views',
						    'orderby' => 'meta_value_num',
						    'order' => 'DESC'
						);
						 
						$popular_posts = new WP_Query( $args );
						while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>
							<div class="col-md-6">
						 	<a id="populares" href="<?php the_permalink(); ?>" class="image featured">
								<?php
									// check if the post has a Post Thumbnail assigned to it.
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('category-thumb');
								}
								?>
							</a>
							<h2 class="entry-title" style="padding: 15px 0 15px 0;">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							</div>
						<?php endwhile;?>
				</div>
			</main>
		</div>
	</div>
	</div>


<?php get_footer() ?>