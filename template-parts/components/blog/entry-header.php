<?php
/**
 * Template for entry header.
 * 
 *
 * @package mywordpresstheme
 */

 $the_post_id = get_the_ID();

 $hide_title = get_post_meta( $the_post_id, '_hide_page_title', true);
 $heading_class = ( !empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';

 $has_post_thumbmail = get_the_post_thumbnail( $the_post_id );
 
?>

<header class="entry-header">
    <?php 
        if ( $has_post_thumbmail ) {
            
            ?>
                <div class="entry-image mb-3">
                    <a href="<?php echo esc_url( get_permalink());?>" class="d-block">
                        <figure class="img-container">
                            <?php 
                                the_post_custom_thumbnail(
                                    $the_post_id,
                                    'featured-thumbnail',
                                    [
                                        'sizes' => '(max-width: 350px) 350px, 233px',
                                        'class' => 'attachment-featured-large size-featured-image'
                                    ]
                                );
                            ?>
                        </figure>
                    </a>
                </div>
            <?php
        }

        /**
         * 文章、頁面內頁只顯示 title 不產生連結
         */
        if( is_single() || is_page() ) {
            printf(
                '<h1 class="page-title text-dark %1$s">%2$s</h1>',
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
        } else {
            printf(
                '<h2 class="entry-title post-card-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
                esc_attr( get_the_permalink() ),
                wp_kses_post( get_the_title() )
            );
        }
    ?>
</header>