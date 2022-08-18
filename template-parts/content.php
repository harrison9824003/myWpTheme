<?php 
    /**
     * content
     * 
     * @package mywordpresstheme
     */

    //  $container_classes = !empty( $args['container_classes'] ) ? $args['container_classes'] : 'mb-5';

    $article_class = '';
    if( ! is_single() && ! is_page() ) {
        $article_class = 'shadow mb-3 p-3 rounded-3';
    }
?>

<article class="<?= $article_class ?>" id="post-<?php the_ID();?>" <?php post_class( $container_classes ); ?> >

    <?php 
        get_template_part( 'template-parts/components/blog/entry-header' );
        get_template_part( 'template-parts/components/blog/entry-meta' );
        get_template_part( 'template-parts/components/blog/entry-content' );
        get_template_part( 'template-parts/components/blog/entry-footer' );
    ?>

</article>