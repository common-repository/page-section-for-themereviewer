<?php

function silver_hubs_hide_show_setting( $wp_customize ) {
	//Ordering Section
		$wp_customize->add_section( 'global_ordering_section' , array(
			'title'  => 'Home Page Ordering Section',
			'panel'  => 'silver_hubs_theme_option_panel',	
		) );
		//add Control
			$wp_customize->add_setting('global_ordering', array(
				'default'  => array( 
						'silver_hubs_featuredimage_slider',
						'silver_hubs_featuredsection',	
						'silver_hubs_widget_section',						
						'silver_hubs_about_section',
						'silver_hubs_portfolio_section',
						'silver_hubs_services_section',							
						'silver_hubs_team_section',
						'silver_hubs_testimonial_section',
						'silver_hubs_sponsors_section',							
					),
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'silver_hubs_sanitize_select',
		    ));
		    $wp_customize->add_control( new silver_hubs_custom_ordering(
		    	$wp_customize,'global_ordering',
		    	array(
			        'settings' => 'global_ordering',
			        'label'   => 'Select Section',
			        'description' => 'Hide & Show Section',
			        'section' => 'global_ordering_section',
			        'type'    => 'sortable_repeater',
			        'choices'     => array(
						'silver_hubs_featuredimage_slider' => 'Featured Slider',
						'silver_hubs_featuredsection' => 'Featured Section',
						'silver_hubs_widget_section'  => 'Widget Woocommerce Product Section',							
						'silver_hubs_about_section'	=> 'About Section',
						'silver_hubs_portfolio_section'	=> 'Our Portfolio',
						'silver_hubs_services_section'	=> 'Our Services',							
						'silver_hubs_team_section'	=> 'Our Team',	
						'silver_hubs_testimonial_section'	=> 'Our Testimonial',
						'silver_hubs_sponsors_section'	=> 'Our Sponsors',												
					),
			    )
			));	
		//diseble section    
			$wp_customize->add_setting('silver_hubs_diseble', array(
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'silver_hubs_diseble',
		    	array(
			        'settings' => 'silver_hubs_diseble',
			        'section' => 'global_ordering_section',
			        'type'    => 'hidden',
			    )
			));	
		//hide & show Section Pro Link
			$wp_customize->add_setting('silver_hubs_hide_show_pro', array(
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new silver_hubs_hide_show_Control(
		    	$wp_customize,'silver_hubs_hide_show_pro',
		    	array(
			        'settings' => 'silver_hubs_hide_show_pro',
			        'label'   => 'Drag & Drop Section in Silver Hubs',
			        'section' => 'global_ordering_section',
		        )
		    ));	
}
add_action( 'customize_register', 'silver_hubs_hide_show_setting' );