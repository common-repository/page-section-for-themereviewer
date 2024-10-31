<?php
/**
 * @package   bizemla
 */

if (!defined('ABSPATH'))
  exit;

if (!class_exists('WCP_admin_menu')) {

	

    class WCP_admin_menu {
    	protected static $WCP_instance;
    		
    		function bizemla_activate(){
    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-featured-section.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-about-section.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-sponsors.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/features/bizemla-hide-show.php';

    			require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-slider.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-featured.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-about.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-portfolio.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-services.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-team.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-testimonial.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/sections/section-sponsors.php';

                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/extras.php';
                require_once PSFT_PLUGIN_DIR_PATH . 'inc/bizemla/customizer-css/customizer-css.php';
    		}

    		function init() {	   
		  		add_action( 'init', array($this, 'bizemla_activate'));  
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