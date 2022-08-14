<?php 
    /**
      * assets 
      * 
      * @package mywordpresstheme
   */

  namespace MYWP_THEME\Inc;

  use MYWP_THEME\Inc\Traits\Singleton;

  class Assets {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        add_action( 'wp_enqueue_scripts', [$this, 'register_styles']);
        add_action( 'wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles() {
        

        wp_register_style( 'style-sheet', get_stylesheet_directory_uri(). '/style.css', [], filemtime(get_template_directory() . '/style.css'), 'all' );
        wp_register_style( 'bs-style-sheet', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css", [], false, 'all' );
        // wp_register_style( 'google-font-style-sheet', "https://fonts.googleapis.com", [], false, 'all' );
        // wp_register_style( 'google-gstatic-style-sheet', "https://fonts.gstatic.com", [], false, 'all' );
        wp_register_style( 'googleapis-style-sheet', "https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500;700;900&display=swap", [], false, 'all' );

        wp_enqueue_style( 'style-sheet' );
        wp_enqueue_style( 'bs-style-sheet' );
        wp_enqueue_style( 'googleapis-style-sheet' );

    }

    public function register_scripts() {
        
        wp_register_script( 'bs-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', [], false, true);
        wp_register_script( 'bs-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js', [], false, true);

        wp_enqueue_script( 'bs-popper');
        wp_enqueue_script( 'bs-min');

    }

  } 
?>