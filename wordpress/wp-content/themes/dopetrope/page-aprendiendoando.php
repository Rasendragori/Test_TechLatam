<?php get_header('nohome'); ?><!-- header -->

<!-- Main -->
				<div id="main-wrapper">
					<div class="container">

						<!-- Content -->
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<!-- post -->
							
							<article class="box post">
								<a href="#" class="image featured"><img src="<?php bloginfo('template_directory' ); ?>/images/pic01.jpg" alt="" />
								</a>
								<header>
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>
								</header>
							</article>
							<?php endwhile; ?>
							<!-- post navigation -->
							<?php else: ?>
							<!-- no posts found -->
							<?php endif; ?>

					</div>
				</div>

			<?php get_footer(); ?>