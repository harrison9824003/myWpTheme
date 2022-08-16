<?php 
    /**
     * Custom template tags for the theme 
     * 
     * @package mywordpresstheme
     */

    function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = []) {
        $custom_thumbnail = '';

        if ( null === $post_id ) {
            $post_id = get_the_ID();
        }

        if ( has_post_thumbnail( $post_id ) ) {
            $default_attributes = [
                'loading' => 'lazy'
            ];

            $attributes = array_merge( $additional_attributes, $default_attributes );

            $custom_thumbnail = wp_get_attachment_image(
                get_post_thumbnail_id( $post_id ),
                $size,
                false,
                $attributes
            );
        }

        return $custom_thumbnail;
    }

    function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
        echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
    }

    function mywp_posted_on() {

        $year = get_the_date('Y');
        $month = get_the_date('n');
        $day = get_the_date('j');
        $post_date_archive_permalink = get_day_link( $year, $month, $day);

        $time_str = '<time class="entry-date published update" datetime="%1$s"> %2$s </time>';

        /*if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

            $time_str = '<time class="entry-date published update" datetime="%1$s"> %2$s </time><time class="updated" datetime="%3$s"> %4$s </time>';
        }*/

        $time_str = sprintf(
            $time_str,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_attr( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_attr( get_the_modified_date() )
        );

        $posted_on = sprintf(
            esc_html_x( '上架日期: %s', 'post date', 'mywp'),
            '<a href="' . esc_url( $post_date_archive_permalink ) . '" rel="bookmark">' . $time_str . '</a>'
        );

        echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';

    }

    function mywp_posted_by() {
        $by_str = sprintf(
            esc_html_x( ' 作者: %s', 'post author', 'mywp'),
            '<sapn class="author vcard"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo $by_str;
    }
?>