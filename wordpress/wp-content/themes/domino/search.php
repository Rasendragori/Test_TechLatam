<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<div class="inner-wrap">

        <?php if (option::get('post_view') == 'List' ) { ?>
           <section class="content-area">
       <?php } ?>

    	   <h2 class="archive-title"><?php _e('Search Results for','wpzoom');?> <strong>"<?php the_search_query(); ?>"</strong></h2>


           <?php if (option::get('post_view') == 'Grid' ) { ?>
               <div class="grid_posts">
           <?php } ?>


	        <?php if ( have_posts() ) : ?>

                <section id="recent-posts" class="recent-posts">

    	            <?php while ( have_posts() ) : the_post(); ?>

    	                <?php

    	                get_template_part( 'content', get_post_format() );
    	                ?>

    	            <?php endwhile; ?>

                </section><!-- .recent-posts -->

	            <?php get_template_part( 'pagination' ); ?>

	        <?php else: ?>

	            <?php get_template_part( 'content', 'none' ); ?>

	        <?php endif; ?>

            <?php if (option::get('post_view') == 'Grid' ) { ?>
                </div>
            <?php } ?>

        <?php if (option::get('post_view') == 'List' ) { ?>

            </section><!-- .content-area -->

            <?php get_sidebar(); // Sidebar appears on the right of Featured Categories ?>

        <?php } ?>

    </div><!-- /.inner-wrap -->

</main><!-- .site-main -->

<?php
get_footer();
