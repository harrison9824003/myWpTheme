<?php
    /**
     * functions file.
     * 
     * @package mywordpresstheme
     */

     function register_enqueue_script() {
        wp_enqueue_style( 'style-sheet', get_stylesheet_directory_uri(). '/style.css', [], filemtime(get_template_directory() . '/style.css'), 'all' );
        wp_enqueue_style( 'bs-style-sheet', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css", [], false, 'all' );
        // wp_enqueue_style( 'google-font-style-sheet', "https://fonts.googleapis.com", [], false, 'all' );
        // wp_enqueue_style( 'google-gstatic-style-sheet', "https://fonts.gstatic.com", [], false, 'all' );
        wp_enqueue_style( 'googleapis-style-sheet', "https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500;700;900&display=swap", [], false, 'all' );
        
        wp_enqueue_script( 'bs-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', [], false, true);
        wp_enqueue_script( 'bs-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js', [], false, true);
     }

     add_action( 'wp_enqueue_scripts', 'register_enqueue_script');
?>