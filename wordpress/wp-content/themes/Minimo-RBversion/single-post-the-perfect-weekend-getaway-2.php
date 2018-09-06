<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
		<div class="container">
			<div id="seccion_principal" class="portada row justify-content-center">
				<!-- post -->
				<section class="col-12 row justify-content-center">
					<a href="<?php the_permalink(); ?>" class="image featured col-12 imagen_responsive" style="margin-bottom: 90px;">
						<?php
							// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('category-thumb');
						}
						?>
					</a>
					<div class="col-md-9 row">
						<?php $category = get_the_category();
							if ( $category[0] ) {
								echo '<h2 class="cat_principal col-11" style="margin-top: 0px;"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></h2>';
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
						<footer class="col-11 comentarios_principal row" style="background-color: transparent; text-align: right; margin-bottom: 30px;">
							<div class="col-lg-8" style="text-align: right;">
								<p style="font-family: ubuntu_regular; color: #C6C6C6; font-size: 16px;">SHARE</p>
							</div>
							<div class="col-lg-4">
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
					</div>
					<div class="col-md-3">
						<?php
							dynamic_sidebar( 'Post Sidebar' );
						?>
					</div>
				</section>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
	<?php wp_reset_query(); ?>

	<div class="youmayalsolike d-flex align-items-center">
		<div class="container">
			<div class="row">
				<p class="umaylike col-12">YOU MAY ALSO LIKE</p>
			<?php
				$argsumaylike = array(
					'tag_id' => 10,
					'posts_per_page' => 3
				);

				$queryumaylike = new WP_Query( $argsumaylike );
				if( $queryumaylike->have_posts() ) {
					while( $queryumaylike->have_posts() ) {
						$queryumaylike->the_post();
			?>
						<!-- post -->
						<div id="seccion_principal" class="col-sm-4 row">
							<a href="<?php the_permalink(); ?>" class="image featured col-11 imagen_responsive">
								<?php
									// check if the post has a Post Thumbnail assigned to it.
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('category-thumb');
								}
								?>
							</a>
							<header class="col-12 titulo_principal">
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
							</header>
						</div>
					<?php } ?>
				<?php }
				else { ?>
				<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'edge' ); ?> </h2>
				<?php }?>
			</div>
		</div>
	</div>
	<section class="comments container" style="margin-top: 50px;">
		<h2 class="comments_contador">2 COMMENTS</h2>
		<div class="row d-flex align-items-center">
			<div class="col-12 row d-flex align-items-center" style="margin-bottom: 30px;">
				<div class="col-md-2">
					<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/avatar.jpg" alt="avatar" class="avatar">
				</div>
				<div class="col-md-10">
					<h3 class="comment_user_name">
						John Doe
					</h3>
					<p class="comentario">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
					</p>
					<h4 class="responder_comentario">
						REPLY
					</h4>
				</div>
			</div>
			<div class="col-12 row d-flex align-items-center" style="margin-bottom: 30px;">
				<div class="col-md-2">
					<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/avatar.jpg" alt="avatar" class="avatar">
				</div>
				<div class="col-md-10">
					<h3 class="comment_user_name">
						Jane Doe
					</h3>
					<p class="comentario">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.
					</p>
					<h4 class="responder_comentario">
						REPLY
					</h4>
				</div>
			</div>
			<div class="col-12 row" style="margin-bottom: 30px;">
				<div class="col-md-2">
					<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/avatar.jpg" alt="avatar" class="avatar">
				</div>
				<div class="col-md-10">
					<h3 class="comment_box">
						JOIN THE DISCUSSION
					</h3>
				</div>
			</div>
		</div>
		<div class="redes_sociales row d-flex align-items-center">
			<div class="col-md-8">
			</div>
			<div class="col-md-2" style="vertical-align: bottom;">
				<h4 class="responder_comentario" style="text-align: right; margin-bottom: 0px; font-size: 16px;">
					CONNECTED WITH
				</h4>
			</div>
			<div class="col-md-2" style="text-align: left; vertical-align: middle;">
				<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/twittew-light.png" alt="twittew-light" style="margin-top: -5px; margin-right: 15px;">
				<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/facebook-dark.png" alt="facebook" style="margin-top: -5px; margin-right: 15px;">
			</div>
		</div>
	</section>

<?php get_footer(); ?>