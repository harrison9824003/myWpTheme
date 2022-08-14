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

   require_once MY_DIR_PATH . '/inc/helpers/autoloader.php';

   function mywp_get_theme_instance() {
      \MYWP_THEME\Inc\MYWP_THEME::get_instance();
   }

   mywp_get_theme_instance();
   
?>