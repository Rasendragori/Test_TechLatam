<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      .responsive-image{
        width: 100%;
        height: auto;
      }
	    .block-responsive{
        width:80%;
        height: auto;
        position: relative;
        left: 10%;
      }
      #trigger-div{
        width: 100%;
        min-height: 200px;
      }
      .expanding-div{
        display: none;
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
      }
      #img-expand{
        width: 0%;
        transition: width 300ms;
        -webkit-transition: width 300ms;
        -moz-transition: width 300ms;
        -ms-transition: width 300ms;
        -o-transition: width 300ms;
      }
      #img-contract{
        width: 100%;
        transition: width 100ms;
        -webkit-transition: width 100ms;
        -moz-transition: width 100ms;
        -ms-transition: width 100ms;
        -o-transition: width 100ms;
      }
      #trigger-div:hover #img-contract{
        width: 0%;
      }
      #trigger-div:hover #img-expand{
        width: 100%;
      }
      .mySlides {
        display:none;
      }
      .eun-left{
        float: left;
      }
      .eun-right{
        float: right;
      }
      .eun-display-left{
        position:absolute;
        top:50%;
        left:0%;
        transform:translate(0%,-50%);
        -ms-transform:translate(-0%,-50%);
      }
      .eun-display-right{
        position:absolute;
        top:50%;
        right:0%;
        transform:translate(0%,-50%);
        -ms-transform:translate(0%,-50%);
      }
      .eun-button:hover{
        color:#000!important;
        background-color:#ccc!important
      }
      .eun-content{
        max-width:980px;
        margin:auto;
      }
      .eun-display-container{
        position:relative;
      }
      .eun-animate-fading{
        animation-name:fading;
        animation-duration: 11s;
        animation-iteration-count: infinite;
      }
      @keyframes fading{0%{opacity:0}20%{opacity:1}80%{opacity:1}100%{opacity:0}}

      /* The Modal (background) */
      .img-replace {
      /* replace text with an image */
        display: inline-block;
        overflow: hidden;
        text-indent: 100%; 
        color: transparent;
        white-space: nowrap;
      }
      .bts-popup {
        z-index: 99999;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        transition: opacity 0.3s 0s, visibility 0s 0.3s;
      }
      .bts-popup.is-visible {
        opacity: 1;
        visibility: visible;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
        transition: opacity 0.3s 0s, visibility 0s 0s;
      }

      .bts-popup-container {
        position: relative;
        width: 90%;
        max-width: 350px;
        margin: 4em auto;
        background: #BE0002;
        border-radius: none; 
        text-align: center;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        -webkit-transform: translateY(-40px);
        -moz-transform: translateY(-40px);
        -ms-transform: translateY(-40px);
        -o-transform: translateY(-40px);
        transform: translateY(-40px);
        /* Force Hardware Acceleration in WebKit */
        -webkit-backface-visibility: hidden;
        -webkit-transition-property: -webkit-transform;
        -moz-transition-property: -moz-transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        -moz-transition-duration: 0.3s;
        transition-duration: 0.3s;
      }
      .bts-popup-container img {
        padding: 0 0 0 0;
      }
      .bts-popup-container p {
        color: white;
        padding: 10px 40px;
      }
      .bts-popup-container .bts-popup-button {
        padding: 5px 25px;
        border: 2px solid white;
        display: inline-block;
        margin-bottom: 10px;
      }

      .bts-popup-container a {
        color: white;
        text-decoration: none;
        text-transform: uppercase;
      }

      .bts-popup-container .bts-popup-close {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 30px;
        height: 30px;
      }
      .bts-popup-container .bts-popup-close::before, .bts-popup-container .bts-popup-close::after {
        content: '';
        position: absolute;
        top: 12px;
        width: 16px;
        height: 3px;
        background-color: white;
      }
      .bts-popup-container .bts-popup-close::before {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        left: 8px;
      }
      .bts-popup-container .bts-popup-close::after {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
        right: 6px;
        top: 13px;
      }
      .is-visible .bts-popup-container {
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
      }
      @media only screen and (min-width: 1170px) {
        .bts-popup-container {
          margin: 8em auto;
        }
      }

	    @media screen and (max-width: 770px) {
             #footer-escritorio{
               display: none;
             }
             #trigger-div{
              min-height: 100px;
             }
      }
      
    </style>

    <?php wp_head(); ?>
</head>

<?php
$theme_layout = get_theme_mod('theme-layout-type', zoom_customizer_get_default_option_value('theme-layout-type', domino_customizer_data()));
$theme_width = get_theme_mod('theme-width', zoom_customizer_get_default_option_value('theme-width', domino_customizer_data()));
?>

<body <?php body_class($theme_layout.' '.$theme_width); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.11&appId=1465592623494442';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="page-wrap">

    <div class="domino_boxed_layout">

        <header id="header">

            <nav class="navbar" role="navigation">

                <nav class="top-navbar" role="navigation">

                    <div class="inner-wrap">

                        <div class="header_social">
                            <?php dynamic_sidebar('header_social'); ?>

                        </div>


                        <div class="navbar-header">
                            <?php if ( has_nav_menu( 'secondary' ) ) { ?>

                               <a class="navbar-toggle" href="#menu-top-slide">
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                               </a>


                               <?php wp_nav_menu( array(
                                   'container_id'   => 'menu-top-slide',
                                   'theme_location' => 'secondary'
                               ) );
                           }  ?>

                        </div>


                        <div id="navbar-top">

                            <?php if (has_nav_menu( 'secondary' )) {
                                wp_nav_menu( array(
                                    'menu_class'     => 'nav navbar-nav dropdown sf-menu',
                                    'theme_location' => 'secondary'
                                ) );
                            } ?>

                        </div><!-- #navbar-top -->

                    </div><!-- ./inner-wrap -->

                </nav><!-- .navbar -->

                <div class="clear"></div>

            </nav><!-- .navbar -->



            <div class="inner-wrap">

                <div class="navbar-brand-wpz<?php if (option::is_on('ad_head_select')) { ?> left-align<?php } ?>">

                    <?php domino_custom_logo() ?>

                    <p class="tagline"><?php bloginfo('description')  ?></p>

                </div>
                <div style="padding-top: 20px; max-height: 170px; overflow: hidden;">
                  <div class="eun-content eun-display-container">
                    <div class="mySlides">
                      <?php if (function_exists ('adinserter')) echo adinserter (4); ?>
                    </div>

                    <div class="mySlides">
                      <?php if (function_exists ('adinserter')) echo adinserter (8); ?>
                    </div>

                    <div class="mySlides">
                      <?php if (function_exists ('adinserter')) echo adinserter (12); ?>
                    </div>

                    <!--
                    <button class="eun-display-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-left"></i></button>
                    <button class="eun-display-right" onclick="plusDivs(1)"><i class="fa fa-arrow-right"></i></button>
                    -->

                  </div>
                  <!--<a  href=""><img class="responsive-image" src="http://localhost/wordpress2/wordpress/wp-content/uploads/2017/11/total_beauty.png" width="600px" height="156px"></a>-->
                </div><!-- .navbar-brand -->


                <?php if (option::is_on('ad_head_select')) { ?>
                    <div class="adv">

                        <?php if ( option::get('ad_head_code') <> "") {
                            echo stripslashes(option::get('ad_head_code'));
                        } else { ?>
                            <a href="<?php echo option::get('banner_top_url'); ?>"><img src="<?php echo option::get('banner_top'); ?>" alt="<?php echo option::get('banner_top_alt'); ?>" /></a>
                        <?php } ?>

                    </div><!-- /.adv --> <div class="clear"></div>
                <?php } ?>


            </div><!-- /.inner-wrap -->


            <div class="clear"></div>


            <nav class="navbar" role="navigation">

                <nav class="main-navbar" role="navigation">

                    <div class="inner-wrap clearfix">

                        <div id="sb-search" class="sb-search">
                            <?php get_search_form(); ?>
                        </div>


                        <div class="navbar-header">
                            <?php if ( has_nav_menu( 'primary' ) ) { ?>

                               <a class="navbar-toggle" href="#menu-main-slide">
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                               </a>


                               <?php wp_nav_menu( array(
                                   'container_id'   => 'menu-main-slide',
                                   'theme_location' => 'primary'
                               ) );
                           }  ?>

                        </div>


                        <div id="navbar-main">

                            <?php if (has_nav_menu( 'primary' )) {
                                wp_nav_menu( array(
                                    'menu_class'     => 'nav navbar-nav dropdown sf-menu',
                                    'theme_location' => 'primary',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s' . domino_wc_menu_cartitem() . '</ul>'
                                ) );
                            } ?>


                        </div><!-- #navbar-main -->

                    </div><!-- /.inner-wrap -->

                    <div class="clear"></div>

                </nav><!-- .main-navbar -->

            </nav><!-- .navbar -->
            <!--<div class="bts-popup" role="alert">
                <div class="bts-popup-container">
                    <?php if (function_exists ('adinserter')) echo adinserter (9); ?>
                    <?php if (function_exists ('adinserter')) echo adinserter (10); ?>
                </div>
                    <a href="#0" class="bts-popup-close img-replace">Close</a>
            </div>-->
        </header>

        <?php if ( option::is_on( 'breaking_on' ) ) : ?>

            <?php get_template_part( 'breaking-news' ); ?>

        <?php endif; ?>