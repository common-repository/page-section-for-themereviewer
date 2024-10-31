<?php
/**
 * @package   bizemla
 */

if (!defined('ABSPATH'))
  exit;

if (!class_exists('WCP_admin_menu')) {

	

    class WCP_admin_menu {
    	protected static $WCP_instance;
    		
    		function bizemla_pro_activate(){
    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-featured-section.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-about-section.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-sponsors.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/features/bizemla-hide-show.php';

    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-featured.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/sections/section-sponsors.php';

                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/extras.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla-pro/customizer-css/customizer-css.php';                
                
    		}

    		function init() {	   
		  		add_action( 'init', array($this, 'bizemla_pro_activate'));  
		    }


        public static function WCP_instance() {
            if (!isset(self::$WCP_instance)) {
                self::$WCP_instance = new self();
                self::$WCP_instance->init();
            }
            return self::$WCP_instance;
        }
    }
    WCP_admin_menu::WCP_instance();
}