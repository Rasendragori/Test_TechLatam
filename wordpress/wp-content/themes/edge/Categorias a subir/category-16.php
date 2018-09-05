<!-- ECONOMÍA -->

<?php get_header('noimage'); ?>
	<?php $edge_settings = edge_get_theme_options(); ?>
	<div style="padding-top: 20px;">
		<div class="row">
			<div id="cat_editorial" class="col-lg-3 cat_edi">
				<h2 style="font-family: helvetica; font-size: 20px; color: #fdbf47;">CATEGORÍAS</h2>
				<a href="javascript:void(0);" class="icon" onclick="edi_categorias()">CATEGORÍAS</a>
				 <ul style="list-style-type:none">
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/"><b>TODAS</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_cultura/"><b>CULTURA</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_deportes/"><b>DEPORTES</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_economia/"><b>ECONOMÍA</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_entretenimiento/"><b>ENTRETENIMIENTO</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_mundo/"><b>MUNDO</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_opinion/"><b>OPINIÓN</b></a></li>
				  <li><a href="http://tuespacio.clicknetsystem.com/category/editorial/e_politica/"><b>POLÍTICA</b></a></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<main id="main" class="site-main clearfix">
					<div class="edi_posts">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- post -->
							<div class="row">
								<div class="col-md-3 edi_author">
									<a href="<?php the_permalink(); ?>">
										<?php
										echo get_avatar( get_the_author_meta( 'ID' ), 256 );
										?>
									</a>
								</div>
								<div class="col-md-9">
									<div class="entry-meta info_post_edi">
										<span class="posted-on">
											<div class="categorias_editorial_lista">
												<?php the_category(', '); ?>
											</div>
											<a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
												<?php the_time( get_option( 'date_format' ) ); ?>
											</a>
										</span>
									</div>
									<h2 class="entry-title" style="padding-bottom: 0px">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
										
									</h2>
									<div class="edi_author_name">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
											Por: <?php the_author(); ?>
										</a>
									</div>
									<div class="entry-content">
											<?php the_excerpt(); ?>
									</div>
									<div class="edi_continuar">
										<a href="<?php the_permalink(); ?>">
											<p>Continuar Leyendo</p>
										</a>
									</div>
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
				<?php
					get_template_part( 'pagination', 'none' );
					if( 'default' == $layout ) { //Settings from customizer
						if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')): ?>
							<?php endif;
					}
				?>
			</div>
			<div class="col-lg-3">
				<div>
					<?php
						$args_destacada = array(
						  'cat' => 26
						);

						$destacadas = new WP_Query( $args_destacada ); 
					?>
					<?php if ( $destacadas->have_posts() ) : while ( $destacadas->have_posts() ) : $destacadas->the_post(); ?>
					<!-- post -->
						<div class="edi_destacada">
							<p>BLOG DESTACADO</p>
							<div class="edi_author">
								<a href="<?php the_permalink(); ?>" class="image featured">
									<?php
									echo get_avatar( get_the_author_meta( 'ID' ), 256 );
									?>
								</a>
							</div>
							<h2 class="entry-title" style="padding-bottom: 0px">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="edi_author_name">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
									Por: <?php the_author(); ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="edi_lo_mas row">
					<div class="encabezado col-12">
						<h2>LO MÁS LEIDO EN LOS BLOGS</h2>
					</div>
					<?php
						$args = array(
							'cat'=> 13,
						    'posts_per_page' => 5,
						    'meta_key' => 'post_views',
						    'orderby' => 'meta_value_num',
						    'order' => 'DESC'
						);
						 
						$popular_posts = new WP_Query( $args );
						$edi_contador=1;
						while ( $popular_posts->have_posts() ) : $popular_posts->the_post();
					?>
						<div class="row edi_lo_mas_post col-12">
							<div class="edi_contador col-2">
								<h2>
									<?php echo $edi_contador; ?>
								</h2>
							</div>
							<div class="titulo col-10">
								<h2 class="entry-title" style="font-size: 12px; font-family: verdana; text-align: left; padding: 0px;">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
							</div>
						</div>
							<div class="edi_lo_mas_separador col-12"></div>
						<?php $edi_contador++; ?>
					<?php endwhile;?>
				</div>
				<?php if ( is_active_sidebar( 'editorial_sidebar' ) ) : ?>
					<div role="complementary">
						<?php dynamic_sidebar( 'editorial_sidebar' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
		</div>
	
<script type="text/javascript">
	function edi_categorias() {
	    var x = document.getElementById("cat_editorial");
	    if (x.className === "col-lg-3 cat_edi") {
	        x.className = "col-lg-3 mostrar_cat_edi";
	    } else {
	        x.className = "col-lg-3 cat_edi";
	    }
	}
</script>


<?php get_footer() ?>