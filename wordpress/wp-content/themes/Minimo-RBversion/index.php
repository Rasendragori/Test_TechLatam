<?php get_header(); ?>

	<div class="container">
		<div>
			<?php
					query_posts(array(
						"showposts" => 1,
						"cat" => 7
					) );
			?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="seccion_principal" class="portada row">
				<!-- post -->
				<section class="col-12 row justify-content-center">
					<a href="<?php the_permalink(); ?>" class="image featured col-12 imagen_responsive">
						<?php
							// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('category-thumb');
						}
						?>
					</a>
					<?php $category = get_the_category();
						if ( $category[0] ) {
							echo '<h2 class="cat_principal col-11"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></h2>';
						}
					?>
					<header class="col-11 titulo_principal">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
						</a>
					</header>
					<div class="col-11 excerpt_principal">
						<?php the_excerpt(); ?>
					</div>
					<footer class="col-11 comentarios_principal">
						<a href="<?php the_permalink(); ?>" class="button alt">LEAVE A COMMENT</a>
					</footer>
				</section>
			</div>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<h3>No hay nada</h3>
			<?php endif; ?>
		</div>
		<div class="row lifestyle_1 justify-content-center">
			<?php
				$argslifestyle = array(
					'cat' => 2,
					'posts_per_page' => 2
				);

				$querylifestyle = new WP_Query( $argslifestyle );
				if( $querylifestyle->have_posts() ) {
					while( $querylifestyle->have_posts() ) {
						$querylifestyle->the_post();
			?>
						<div id="seccion_principal" class="col-sm-6 row">
							<!-- post -->
							<section class="col-12 row justify-content-center">
								<a href="<?php the_permalink(); ?>" class="image featured col-12 imagen_responsive">
									<?php
										// check if the post has a Post Thumbnail assigned to it.
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('category-thumb');
									}
									?>
								</a>
								<?php $category = get_the_category();
									if ( $category[0] ) {
										echo '<h2 class="cat_secundaria col-12"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></h2>';
									}
								?>
								<header class="col-12 titulo_principal">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								</header>
								<div class="col-12 excerpt_principal">
									<?php the_excerpt(); ?>
								</div>
							</section>
						</div>
					<?php } ?>
				<?php }
				else { ?>
				<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'edge' ); ?> </h2>
				<?php }?>
		</div>
		<div class="row photodiary_1 justify-content-center">
			<?php
				$argslifestyle = array(
					'tag_id' => 8,
					'posts_per_page' => 2
				);

				$querylifestyle = new WP_Query( $argslifestyle );
				if( $querylifestyle->have_posts() ) {
					while( $querylifestyle->have_posts() ) {
						$querylifestyle->the_post();
			?>
						<div id="seccion_principal" class="col-sm-6 row">
							<!-- post -->
							<section class="col-12 row justify-content-center">
								<a href="<?php the_permalink(); ?>" class="image featured col-12 imagen_responsive">
									<?php
										// check if the post has a Post Thumbnail assigned to it.
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('category-thumb');
									}
									?>
								</a>
								<?php $category = get_the_category();
									if ( $category[0] ) {
										echo '<h2 class="cat_secundaria col-12"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></h2>';
									}
								?>
								<header class="col-12 titulo_principal">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								</header>
								<div class="col-12 excerpt_principal">
									<?php the_excerpt(); ?>
								</div>
							</section>
						</div>
					<?php } ?>
				<?php }
				else { ?>
				<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'edge' ); ?> </h2>
				<?php }?>
		</div>
		<!-- Widget area para suscricción al newsletter -->
		<div class="widget">
			<?php
				dynamic_sidebar( 'Index Widgets Area' )
			?>
		</div>
	</div>

<?php get_footer(); ?>