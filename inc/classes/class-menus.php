<?php 
    /**
     * menus
     * 
     * @package mywordpresstheme
     */

    namespace MYWP_THEME\Inc;

    use MYWP_THEME\Inc\Traits\Singleton;

    class Menus {
        use Singleton;

        protected function __construct() {
            $this->setup_hooks();
        }

        protected function setup_hooks() {
            add_action( 'init', [$this, 'register_menus']);
        }

        public function register_menus() {
            register_nav_menus([
                'mywp-header-menu' => esc_html__( 'Header Menu', 'mywp'),
                'mywp-footer-menu' => esc_html__( 'Footer Menu', 'mywp')
            ]);
        }

        public function get_meun_id( $localtion ) {

            $localtions = get_nav_menu_locations();

            $menu_id = ! empty( $localtions[ $localtion ] ) ? $localtions[ $localtion ] : '';

            return ! empty( $menu_id ) ? $menu_id : '';
        }

        public function get_child_menu_items( $menu_array, $parent_id ) {

            $child_menus = [];

            if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {

                foreach ( $menu_array as $menu ) {
                    if ( intval( $menu->menu_item_parent ) == $parent_id ) {
                        array_push( $child_menus, $menu );
                    }
                }

            }

            return $child_menus;
        }
        
    }
?>