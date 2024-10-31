<?php
/**
 * @package   designhubs
 */

if (!defined('ABSPATH'))
  exit;

if (!class_exists('WCP_admin_menu')) {

	

    class WCP_admin_menu {
    	protected static $WCP_instance;
    		
    		function silver_hubs_activate(){
    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-info.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-sponcers.php';                
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/features/silverhubs-hide-show.php';

    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-info.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/sections/section-sponcers.php';

                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/extras.php';   
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/silver_hubs/customizer-css/customizer-css.php';
    		}

    		function init() {	   
		  		add_action( 'init', array($this, 'silver_hubs_activate'));  
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