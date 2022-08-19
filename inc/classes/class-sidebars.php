<?php 
    /**
     * register sidebar
     * 
     * @package mywordpresstheme
     */

    namespace MYWP_THEME\Inc;

    use MYWP_THEME\Inc\Traits\Singleton;

    class Sidebars {
        use Singleton;

        protected function __construct() {
            $this->setup_hooks();
        }

        protected function setup_hooks() {
            add_action( 'widgets_init', [$this, 'register_sidebars'] ); 
            add_action( 'widgets_init', [$this, 'register_clock_widget'] );           
        }

        public function register_sidebars() {

            register_sidebar(
                [
                    'name'          => esc_html__( '主要側邊攔', 'aquila' ),
                    'id'            => 'sidebar-1',
                    'description'   => '主要側邊欄位',
                    'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                ]
            );

            register_sidebar(
                [
                    'name'          => esc_html__( '次要側邊攔', 'aquila' ),
                    'id'            => 'sidebar-2',
                    'description'   => '次要側邊欄位',
                    'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="widget-title">',
                    'after_title'   => '</h4>',
                ]
            );
        }

        public function register_clock_widget() {
            register_widget( 'MYWP_THEME\Inc\Clock_Widget' );
        }


    }
?>