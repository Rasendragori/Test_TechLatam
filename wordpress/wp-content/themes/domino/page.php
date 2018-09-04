<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>
	
    <main id="main" class="site-main" role="main">

		<div class="inner-wrap">

	        <?php while ( have_posts() ) : the_post(); ?>

	            <div class="content-area">

	                <?php get_template_part( 'content', 'page' ); ?>

	                <div class="fb-like" data-href="https://www.facebook.com/elurbano.news/" data-layout="standard" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>

	                <?php if (option::get('comments_page') == 'on') { ?>
	                    <?php comments_template(); ?>
	                <?php } ?>

	            </div>

	        <?php endwhile; // end of the loop. ?>

	        <?php get_sidebar(); ?>

        </div><!-- /.inner-wrap -->

    </main><!-- #main -->

<?php get_footer(); ?>