<?php
/**
 * Template for entry footer.
 * 
 *
 * @package mywordpresstheme
 */

 $the_post_id = get_the_ID();

 $article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );

 if ( empty( $article_terms ) || ! is_array( $article_terms) ) return;

 if( is_single() || is_page() ):
?>
    <div class="d-flex justify-content-between">
        <div class="prev-link text-decoration-none"><?php previous_post_link(); ?></div>
        <div class="next-link"><?php next_post_link(); ?></div>
    </div>    
<?php 
    else:
?>
    <div class="entry-footer mt-2">
        <?php 
            foreach ( $article_terms as $key => $article_term ) {
                ?>
                    <a href="<?php echo esc_html( get_term_link( $article_term ) ); ?>" class="entry-footer-link btn btn-sm btn-success">
                        <?php echo esc_html( $article_term->name ); ?>
                    </a>
                <?php
            }
        ?>
    </div>
<?php 
    endif;
?>