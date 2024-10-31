<?php
/**
* Plugin Name: Page Section For Themereviewer
* Description: Import all the demos on your site
* Version: 1.0
* Copyright: 2020
* Text Domain: page-section-for-themereviewer
* 
*/
// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}
if (!defined('PSFT_PLUGIN_NAME')) {
  define('PSFT_PLUGIN_NAME', 'Page Section For Themereviewer');
}
if (!defined('PSFT_PLUGIN_VERSION')) {
  define('PSFT_PLUGIN_VERSION', '2.0.0');
}
if (!defined('PSFT_PLUGIN_FILE')) {
  define('PSFT_PLUGIN_FILE', __FILE__);
}
if (!defined('PSFT_PLUGIN_DIR')) {
  define('PSFT_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('PSFT_BASE_NAME')) {
    define('PSFT_BASE_NAME', plugin_basename(PSFT_PLUGIN_FILE));
}
if (!defined('PSFT_DOMAIN')) {
  define('PSFT_DOMAIN', 'page-section-for-themereviewer');
}
define( 'PSFT_PLUGIN_DIR_PATH' , plugin_dir_path( __FILE__ ) );

if (!class_exists('PSFT_main')) {

  class PSFT_main {

    protected static $PSFT_instance;
    
    function includes() {
    	include_once('includes/page-section-shortcode.php');

      $theme = wp_get_theme();      
      if( 'DesignHubs' == $theme->name){
        require_once('inc/designhubs/designhubs.php');
      }
      if( 'DesignHubs Pro' == $theme->name){
        require_once('inc/designhubs-pro/designhubs_pro.php');
      }
      if( 'Silver Hubs' == $theme->name){
        require_once('inc/silver_hubs/silver_hubs.php');
      }
      if( 'Silver Hubs Pro' == $theme->name){
        require_once('inc/silver_hubs_pro/silver_hubs_pro.php');
      }
      if( 'DesignHubs Ecommerce' == $theme->name){
        require_once('inc/designhubs/designhubs.php');
      }
      if( 'DesignHubs Ecommerce Pro' == $theme->name){
        require_once('inc/designhubs-pro/designhubs_pro.php');
      }
      if( 'Bizemla' == $theme->name){
        require_once('inc/bizemla/bizemla.php');
      }
      if( 'Bizemla Pro' == $theme->name){
        require_once('inc/bizemla-pro/bizemla_pro.php');
      }
    }

    public static function PSFT_do_activation() {
      set_transient('PSFT-first-rating', true, MONTH_IN_SECONDS);
    }

    public static function PSFT_instance() {
      if (!isset(self::$PSFT_instance)) {
        self::$PSFT_instance = new self();
        //self::$PSFT_instance->init();
        self::$PSFT_instance->includes();
      }
      return self::$PSFT_instance;
    }

  }

  add_action('plugins_loaded', array('PSFT_main', 'PSFT_instance'));

  register_activation_hook(PSFT_PLUGIN_FILE, array('PSFT_main', 'PSFT_do_activation'));
}