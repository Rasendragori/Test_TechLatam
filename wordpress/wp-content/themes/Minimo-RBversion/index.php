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
				<section class="col-12 row justify-content-md-center">
					<a href="<?php the_permalink(); ?>" class="image featured col-12">
						<?php
							// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('category-thumb');
						}
						?>
					</a>
					<?php $category = get_the_category();
						if ( $category[0] ) {
							echo '<h2 class="cat_principal col-10"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></h2>';
						}
					?>
					<header class="col-10 titulo_principal">
						<h3><?php the_title(); ?></h3>
					</header>
					<div class="col-10 excerpt_principal">
						<?php the_excerpt(); ?>
					</div>
					<footer class="col-10 comentarios_principal">
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
			<?php wp_reset_query(); ?>
		</div>
		<div>
			<?php
				$argslifestyle = array(
					'cat' => 2,
					'posts_per_page' => 2
				);

				$querylifestyle = new WP_Query( $argslifestyle );
				<?php if ( $querylifestyle->have_posts() ) : while ( $querylifestyle->have_posts() ) : $querylifestyle->the_post(); ?>
				<!-- post -->
				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>

			?>
		</div>
	</div>

<?php get_footer(); ?>