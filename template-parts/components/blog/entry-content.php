<?php
/**
 * Template for entry content.
 * 
 *
 * @package mywordpresstheme
 */

?>

<div class="entry-content">
    <?php
        if ( $is_single() ) {
            the_content(
                sprintf(
                    wp_kses(
                        __( '繼續閱讀 %s <span class="meta-nav">&rrar;</span>', 'mywp'),
                        [
                            'span' => [
                                'class' => [],
                            ]
                        ]
                    ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false)
                )
            );

            wp_link_pages(
                [
                    'before' => '<div class="pages-links">' . esc_html__( 'Pages:', 'mywp' ),
                    'after' => '</div>'
                ]
            );
        } else {
            ?>
            <div class="truncate-4">
                <?php
                    mywp_the_excerpt( 200 ); 
                ?>
            </div>
            <?php
            echo mywp_excerpt_more();
        }
    ?>
</div>