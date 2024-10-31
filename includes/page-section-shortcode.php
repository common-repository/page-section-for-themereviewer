<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('PSFT_admin_side')) {

    class PSFT_admin_side {

        protected static $PSFT_instance;        

		function theme_section_shortcode( $atts ) {
			ob_start();

			if(isset($atts['section'])){
				if ( function_exists( $atts['section'] )){
					call_user_func($atts['section']);
				}
			}

			$content = ob_get_clean();
		    return $content;
		}

		function init(){			
    		add_shortcode( 'theme_section', array($this,'theme_section_shortcode' ));    		
    	} 

		public static function PSFT_instance() {
            if (!isset(self::$PSFT_instance)) {
                self::$PSFT_instance = new self();
                self::$PSFT_instance->init();
            }
            return self::$PSFT_instance;
        }
    }
    PSFT_admin_side::PSFT_instance();
}


?>