
<?php get_header('nohome'); ?>	<!--header-->

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

								<!-- Portfolio -->
									<section>
										<header class="major">
											<h2><?php wp_title(); ?></h2>
										</header>
										<div class="row">
											<?php
												$id_categoria = get_query_var('cat');
											?>
											<?php
													query_posts(array(
														"showposts" => 6,
														"category__in" => $id_categoria
													) );
											?>

											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

											<div class="4u 12u(mobile)">
												<!-- post -->
												<section class="box">
													<a href="#" class="image featured">
														<?php
															// check if the post has a Post Thumbnail assigned to it.
														if ( has_post_thumbnail() ) {
															the_post_thumbnail('category-thumb');
														}
														?>
													</a>
													<header>
														<h3><?php the_title(); ?></h3>
													</header>
													<p><?php the_excerpt(); ?></p>
													<footer>
														<a href="<?php the_permalink(); ?>" class="button alt">Find out more</a>
													</footer>
												</section>
											</div>
											<?php endwhile; ?>
											<!-- post navigation -->
											<?php else: ?>
											<!-- no posts found -->
											<h3>No existe nada para esa categoria :'v</h3>
											<?php endif; ?>
											<?php wp_reset_query(); ?>
										</div>
									</section>

							</div>
						</div>
						
					</div>
				</div>

<?php get_footer(); ?>