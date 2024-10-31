<?php

function designhubs_hide_show_setting( $wp_customize ) {
	//Ordering Section
		$wp_customize->add_section( 'global_ordering_section' , array(
			'title'  => 'Home Page Ordering Section',
			'panel'  => 'designhubs_theme_option_panel',	
		) );
		//add Control
			$wp_customize->add_setting('global_ordering', array(
				'default'  => array( 
						'designhubs_featuredimage_slider',
						'designhubs_featured_section',	
						'designhubs_widget_section',						
						'designhubs_about_section',
						'designhubs_our_portfolio',
						'designhubs_our_services',							
						'designhubs_our_team',
						'designhubs_our_testimonial',
						'designhubs_our_sponsors',							
					),
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'designhubs_sanitize_select',
		    ));
		    $wp_customize->add_control( new designhubs_custom_ordering(
		    	$wp_customize,'global_ordering',
		    	array(
			        'settings' => 'global_ordering',
			        'label'   => 'Select Section',
			        'description' => 'Drag & Drop Sections to re-arrange the order',
			        'section' => 'global_ordering_section',
			        'type'    => 'sortable_repeater',
			        'choices'     => array(
						'designhubs_featuredimage_slider' => 'Featured Slider',
						'designhubs_featured_section' => 'Featured Section',
						'designhubs_widget_section'  => 'Widget Woocommerce Product Section',							
						'designhubs_about_section'	=> 'About Section',
						'designhubs_our_portfolio'	=> 'Our Portfolio',
						'designhubs_our_services'	=> 'Our Services',							
						'designhubs_our_team'	=> 'Our Team',	
						'designhubs_our_testimonial'	=> 'Our Testimonial',
						'designhubs_our_sponsors'	=> 'Our Sponsors',												
					),
			    )
			));	
		//ordering section    
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
			));	
		//diseble section    
			$wp_customize->add_setting('designhubs_diseble', array(
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'designhubs_diseble',
		    	array(
			        'settings' => 'designhubs_diseble',
			        'section' => 'global_ordering_section',
			        'type'    => 'hidden',
			    )
			));	
}
add_action( 'customize_register', 'designhubs_hide_show_setting' );