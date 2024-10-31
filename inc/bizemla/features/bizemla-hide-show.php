<?php

function bizemla_hide_show_setting( $wp_customize ) {
	//Ordering Section
			$wp_customize->add_section( 'global_ordering_section' , array(
				'title'  => 'Home Page Ordering Section',
				'panel'  => 'theme_option_panel',	
			) );
			//add Control
				$wp_customize->add_setting('global_ordering', array(
					'default'  => array( 
							'bizemla_featuredimage_slider',
							'bizemla_featured_section',	
							'bizemla_widget_section',						
							'bizemla_about_section',
							'bizemla_our_portfolio',
							'bizemla_our_services',							
							'bizemla_our_team',
							'bizemla_our_testimonial',
							'bizemla_our_sponsors',							
						),
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'bizemla_sanitize_select',
			    ));
			    $wp_customize->add_control( new bizemla_custom_ordering(
			    	$wp_customize,'global_ordering',
			    	array(
				        'settings' => 'global_ordering',
				        'label'   => 'Select Section',
				        'description' => 'Hide & show Sections',
				        'section' => 'global_ordering_section',
				        'type'    => 'sortable_repeater',
				        'choices'     => array(
							'bizemla_featuredimage_slider' => 'Featured Slider',
							'bizemla_featured_section' => 'Featured Section',
							'bizemla_widget_section'  => 'Widget Woocommerce Product',							
							'bizemla_about_section'	=> 'About Section',
							'bizemla_our_portfolio'	=> 'Our Portfolio',
							'bizemla_our_services'	=> 'Our Services',							
							'bizemla_our_team'	=> 'Our Team',	
							'bizemla_our_testimonial'	=> 'Our Testimonial',
							'bizemla_our_sponsors'	=> 'Our Sponsors',												
						),
				    )
				));	
			/*//ordering section    
				$wp_customize->add_setting('globalddd_ordering', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'globalddd_ordering',
			    	array(
				        'settings' => 'globalddd_ordering',
				        'section' => 'global_ordering_section',
				        'type'    => 'hidden',
				    )
				));*/	
			//diseble section    
				$wp_customize->add_setting('bizemla_diseble', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'bizemla_diseble',
			    	array(
				        'settings' => 'bizemla_diseble',
				        'section' => 'global_ordering_section',
				        'type'    => 'hidden',
				    )
				));	
			//Drag and Drop in pro option
				$wp_customize->add_setting('drag_drop_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new bizemla_drag_drop_option_Control(
			    	$wp_customize,'drag_drop_section_pro',
			    	array(
				        'settings' => 'drag_drop_section_pro',
				        'section' => 'global_ordering_section',
			        )
			    ));
    //Theme option in design option
		$wp_customize->add_section( 'bizemla_theme_option_design_section' , array(
			'title'  => 'Design',
			'panel'  => 'theme_option_panel',
		) );
		//Heading Under Line Color 
			$wp_customize->add_setting( 'bizemla_heading_underline_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bizemla_heading_underline_color', 
		        array(
		            'label'      => __( 'Heading Underline Color', 'bizemla' ), 
		            'settings'   => 'bizemla_heading_underline_color', 
		            'priority'   => 10, 
		            'section'    => 'bizemla_theme_option_design_section',
		        ) 
	        ) );
}
add_action( 'customize_register', 'bizemla_hide_show_setting' );