<div id="comments">
<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'wpzoom' ); ?></p>
 <?php
        /* Stop the rest of comments.php from being processed,
         * but don't kill the script entirely -- we still have
         * to fully load the template.
         */
        return;
    endif;
?>

<?php
    // You can start editing here -- including this comment!
?>

<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$custom_comment_form = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="form_fields clearfix"><p class="comment-form-author">' .
            '<label for="author">' . __( 'Nombre' , 'wpzoom' ) . '</label> ' .
            '<input id="author" name="author" type="text" value="' .
            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="required" />' .
            ( $req ? '<span class="required_lab">*</span>' : '' ) .

            '</p>',
    'email'  => '<p class="comment-form-email">' .
            '<label for="email">' . __( 'Dirección de correo' , 'wpzoom' ) . '</label> ' .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="required email" />' .
            ( $req ? '<span class="required_lab">*</span>' : '' ) .
            '</p>',
    'url'    =>  '<p class="comment-form-url">' .
            '<label for="url">' . __( 'Website' , 'wpzoom' ) . '</label> ' .
            '<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' />' .
            '</p></div><div class="clear"></div>') ),
    'comment_field' => '<p class="comment-form-comment">' .
            '<label for="comment">' . __( 'Mensaje' , 'wpzoom' ) . '</label> ' .
            '<textarea id="comment" name="comment" cols="35" rows="5" aria-required="true" class="required"></textarea>' .
            '</p><div class="clear"></div>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Identificado como <a href="%1$s">%2$s</a>. <a href="%3$s">¿Salir?</a>', 'wpzoom' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'title_reply' => __( 'Deja un comentario' , 'wpzoom' ),
    'cancel_reply_link' => __( 'Cancelar' , 'wpzoom' ),
    'label_submit' => __( 'Publicar' , 'wpzoom' ),
    'comment_form_after' => '<div class="clear"></div>'
);
comment_form($custom_comment_form);
?>

<?php if ( have_comments() ) : ?>

    <h3><?php comments_number(__('Sin comentarios','wpzoom'), __('Un comentario','wpzoom'), __('% Comentarios','wpzoom') );?></h3>

    <ol class="commentlist">
        <?php
            /* Loop through and list the comments. Tell wp_list_comments()
             * to use wpzoom_comment() to format the comments.
             * If you want to overload this in a child theme then you can
             * define wpzoom_comment() and that will be used instead.
             * See wpzoom_comment() in functions/theme/functions.php for more.
             */
            wp_list_comments( array( 'callback' => 'mag_explorer_comment' ) );
        ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <div class="navigation">
            <?php paginate_comments_links( array('prev_text' => ''.__( '<span class="meta-nav">&larr;</span> Comentarios Antiguos', 'wpzoom' ).'', 'next_text' => ''.__( 'Comentarios Recientes <span class="meta-nav">&rarr;</span>', 'wpzoom' ).'') );?>
        </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>


    <?php else : // or, if we don't have comments:

        /* If there are no comments and comments are closed,
         * let's leave a little note, shall we?
         */
        if ( ! comments_open() ) :
    ?>
        <p class="nocomments"><?php _e( 'Los comentarios estan cerrados.', 'wpzoom' ); ?></p>
    <?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>



</div><!-- #comments -->