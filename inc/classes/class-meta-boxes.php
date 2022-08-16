<?php 
    /**
     * post meta box 
     * 
     * @package mywordpresstheme
     */

    namespace MYWP_THEME\Inc;

    use MYWP_THEME\Inc\Traits\Singleton;

    class Meta_Boxes {
        use Singleton;

        protected function __construct() {
            Assets::get_instance();
            Menus::get_instance();
            $this->setup_hooks();
        }

        protected function setup_hooks() {
            
            add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] ); // 註冊 meta boxes
            add_action( 'save_post', [ $this, 'save_post_meta_data' ] ); // 儲存 meta boxes
        }

        public function  add_custom_meta_box() {

            $screens = [ 'post' ];
            foreach ( $screens as $screen ) {
                add_meta_box (
                    'hide-page-title',
                    __( 'Hide page title', 'mywp'),
                    [ $this, 'custom_meta_box_html' ],
                    $screen,
                    'side'
                );
            }
        }

        /**
         * 文章編輯頁面顯示 meta boxes html
         */
        public function custom_meta_box_html( $post ) {
            
            $value = get_post_meta( $post->ID, '_hide_page_title', true);

            /**
             * wp nonce 防止 csrf
             */

            wp_nonce_field( plugin_basename(__FILE__), 'nonce_check' );

            ?>

            <label for="mywp-field"><?php esc_html_e( '是否隱藏文章 title', 'mywp' ); ?></label>
            <select name="mywp_hide_title_field" id="mywp-field">
                <option value=""><?php esc_html_e( 'Select', 'mywp' );?></option>
                <option value="yes" <?php selected( $value, 'yes' ); ?> ><?php esc_html_e( '顯示', 'mywp' ); ?></option>
                <option value="no" <?php selected( $value, 'no' ); ?> ><?php esc_html_e( '不顯示', 'mywp' ); ?></option>
            </select>

            <?php
        }

        /**
         * 儲存 post meta
         */

        public function save_post_meta_data( $post_id ) {

            if( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }

            /**
             * 檢查 wp nonce
             */
            if ( ! isset( $_POST['nonce_check'] ) || 
                ! wp_verify_nonce( $_POST['nonce_check'], plugin_basename(__FILE__) ) 
            ) {
                return;
            } 

            
            if( array_key_exists( 'mywp_hide_title_field', $_POST ) ) {
                update_post_meta(
                    $post_id,
                    '_hide_page_title',
                    $_POST['mywp_hide_title_field']
                );
            }
        }
        
        
    }
?>