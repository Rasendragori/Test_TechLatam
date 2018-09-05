<!-- INMEDIATEZ -->

<?php get_header('noimage'); ?>
	<?php $edge_settings = edge_get_theme_options(); ?>
	<div id="content" style="text-align: center; padding-top: 10px;">
		<img class="imagen-responsive" src="http://tuespacio.clicknetsystem.com/wp-content/uploads/2018/02/bannertop.png">
	</div>
	<div class="row">
		<div class="primary col-lg-8">
			<div class="nota">LO MÁS RECIENTE</div>
			<div class="triangle-down"></div>
			<main id="main" class="site-main clearfix">
				<div class="row">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- post -->
							<div class="col-lg-6">
								<a href="<?php the_permalink(); ?>" class="image featured">
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
					<?php wp_reset_query(); ?>
				</div>
			</main>
			<?php get_template_part( 'pagination', 'none' );
				if( 'default' == $layout ) { //Settings from customizer
					if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')): ?>
						</div> <!-- #primary -->
						<?php endif;
				} ?>
		</div>
		<?php if ( is_active_sidebar( 'inmediatez_sidebar' ) ) : ?>
			<div class="widget-area col-lg-4" role="complementary">
				<?php dynamic_sidebar( 'inmediatez_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>
	


<?php get_footer() ?>