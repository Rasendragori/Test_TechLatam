<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
		<div class="container">
			<div id="seccion_principal" class="portada row justify-content-center">
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
					<div class="contenido_principal col-11">
						<?php the_content(); ?>
					</div>
					<footer class="col-11 comentarios_principal row" style="background-color: transparent; text-align: right;">
						<div class="col-sm-9" style="text-align: right;">
							<p style="font-family: ubuntu_regular; color: #C6C6C6; font-size: 16px;">SHARE</p>
						</div>
						<div class="col-sm-3">
							<a href="#" class="footer_a">
								<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/facebook-light.png">
							</a>
							<a href="#" class="footer_a">
								<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/twittew-light.png">
							</a>
							<a href="#" class="footer_a">
								<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/g.png">
							</a>
							<a href="#" class="footer_a">
								<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/tumbler.png">
							</a>
							<a href="#" class="footer_a">
								<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/pinterest.png">
							</a>
						</div>
					</footer>
				</section>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>

<?php get_footer(); ?>