<?php
/**
 * The template for displaying the footer
 *
 */

$widgets_areas = (int) get_theme_mod( 'footer-widget-areas', zoom_customizer_get_default_option_value( 'footer-widget-areas', domino_customizer_data() ) );

$has_active_sidebar = false;
if ( $widgets_areas > 0 ) {
    $i = 1;

    while ( $i <= $widgets_areas ) {
        if ( is_active_sidebar( 'footer_' . $i ) ) {
            $has_active_sidebar = true;
            break;
        }

        $i++;
    }
}

?>

        <footer id="colophon" class="site-footer" role="contentinfo">

            <?php if ( $has_active_sidebar ) : ?>

                <div id="footer-escritorio" class="footer-widgets widgets widget-columns-<?php echo esc_attr( $widgets_areas ); ?>">

                    <div class="inner-wrap">

                        <?php for ( $i = 1; $i <= $widgets_areas; $i ++ ) : ?>

                            <div class="column">
                                <?php dynamic_sidebar( 'footer_' . $i ); ?>
                            </div><!-- .column -->

                        <?php endfor; ?>

                        <div class="clear"></div>

                    </div><!-- .inner-wrap -->

                </div><!-- .footer-widgets -->


            <?php endif; ?>

            <div class="site-info-top">

                <div class="inner-wrap">

                    <div class="navbar-brand">
                        <h2><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' );  ?></a></h2>

                    </div><!-- .navbar-brand -->

                    <div class="footer-menu">
                        <?php
                        if ( has_nav_menu( 'tertiary' ) ) {
                            wp_nav_menu( array(
                                'container' => 'menu',
                                'container_class' => '',
                                'menu_id' => 'secondmenu',
                                'sort_column' => 'menu_order',
                                'theme_location' => 'tertiary',
                                'depth' => 1
                            ) );
                        }
                        ?>
                    </div>

                    <div class="clear"></div>

                </div><!-- .inner-wrap -->

            </div><!-- .site-info-top -->


            <div class="site-info">

                <div class="inner-wrap">

                    <p class="copyright">
                        <span class="copyright"><?php zoom_customizer_partial_blogcopyright(); ?></span>. <?php printf( __( 'Designed by %s', 'wpzoom' ), '<a href="http://www.wpzoom.com/" target="_blank" rel="designer">WPZOOM</a>' ); ?>
                    </p>

                </div><!-- .inner-wrap -->

            </div><!-- .site-info -->


        </footer><!-- #colophon -->


    </div><!-- /.domino_boxed_layout -->

</div><!-- /.page-wrap -->
<?php wp_footer(); ?>

<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 10000); 
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<script>
    jQuery(document).ready(function($){
  
  window.onload = function (){
    $(".bts-popup").delay(1000).addClass('is-visible');
    }
  
    //open popup
    $('.bts-popup-trigger').on('click', function(event){
        event.preventDefault();
        $('.bts-popup').addClass('is-visible');
    });
    
    //close popup
    $('.bts-popup').on('click', function(event){
        if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event){
        if(event.which=='27'){
            $('.bts-popup').removeClass('is-visible');
        }
    });
});
</script>

</body>
</html>