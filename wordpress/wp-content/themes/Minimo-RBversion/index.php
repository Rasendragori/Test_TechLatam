<?php get_header(); ?>

	<div class="container">
		<?php
				query_posts(array(
					"showposts" => 1,
					"cat" => 7
				) );
		?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="portada">
			<!-- post -->
			<section class="row">
				<a href="<?php the_permalink(); ?>" class="image featured col-12">
					<?php
						// check if the post has a Post Thumbnail assigned to it.
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('category-thumb');
					}
					?>
				</a>
				<header class="col-12">
					<h3><?php the_title(); ?></h3>
				</header>
					<p><?php the_excerpt(); ?></p>
				<footer class="col-12">
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

<?php get_footer(); ?>