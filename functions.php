<?php
   /**
      * functions file.
      * 
      * @package mywordpresstheme
   */

   if( !defined('MY_DIR_PATH') ) {
      define( 'MY_DIR_PATH', get_template_directory());
   }

   if ( !defined('MY_DIR_URI') ) {
      define( 'MY_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
   }

   if ( ! defined( 'MY_BUILD_URI' ) ) {
      define( 'MY_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
   }
   
   if ( ! defined( 'MY_BUILD_PATH' ) ) {
      define( 'MY_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
   }
   
   if ( ! defined( 'MY_BUILD_JS_URI' ) ) {
      define( 'MY_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
   }
   
   if ( ! defined( 'MY_BUILD_JS_DIR_PATH' ) ) {
      define( 'MY_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
   }
   
   if ( ! defined( 'MY_BUILD_IMG_URI' ) ) {
      define( 'MY_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
   }
   
   if ( ! defined( 'MY_BUILD_CSS_URI' ) ) {
      define( 'MY_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
   }
   
   if ( ! defined( 'MY_BUILD_CSS_DIR_PATH' ) ) {
      define( 'MY_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
   }

   // 熱門文章分類
   if ( ! defined( 'MY_HOT_CATEGORY_ID') ) {
      define( 'MY_HOT_CATEGORY_ID', '1');
   }

   // 全站公告
   if ( ! defined( 'MY_ANNOUNCEMENT_ID') ) {
      define( 'MY_ANNOUNCEMENT_ID', '4');
   }

   // 網站 banner
   if ( ! defined( 'MY_BANNER_ID') ) {
      define( 'MY_BANNER_ID', '6');
   }

   require_once MY_DIR_PATH . '/inc/helpers/autoloader.php';
   require_once MY_DIR_PATH . '/inc/helpers/template-tags.php';

   function mywp_get_theme_instance() {
      \MYWP_THEME\Inc\MYWP_THEME::get_instance();
   }

   mywp_get_theme_instance();
   
?>