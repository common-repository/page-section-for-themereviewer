<?php
/**
 * @package   designhubs
 */

if (!defined('ABSPATH'))
  exit;

if (!class_exists('WCP_admin_menu')) {

	

    class WCP_admin_menu {
    	protected static $WCP_instance;
    		
    		function designhubs_pro_activate(){
    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-section.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-sponsors.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/features/designhubs-hide-show.php';

    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-info.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/sections/section-sponsors.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/customizer-css/customizer-css.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/designhubs-pro/extras.php';
    		}

    		function init() {	   
		  		add_action( 'init', array($this, 'designhubs_pro_activate'));  
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