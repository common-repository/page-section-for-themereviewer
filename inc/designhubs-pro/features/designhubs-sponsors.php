<?php

function designhubs_sponsors_setting( $wp_customize ) {
	$sections = array();
	$sponsors = apply_filters('designhubs_pro_section', $sections);
	//Our Sponsors
		$wp_customize->add_section( 'designhubs_our_sponsors_section' , array(
			'title'  => 'Our Sponsors',
			'panel'  => 'designhubs_theme_option_panel',
		) );
		//Our Sponsors in Tabing
			$wp_customize->add_setting( 'our_sponsors_tab', 
		        array(
		            'default'    => 'general', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'designhubs_sanitize_select',
		        ) 
		    ); 
	        $wp_customize->add_control( new designhubs_Custom_Radio_Control( 
		        $wp_customize,'our_sponsors_tab',array(
		            'settings'   => 'our_sponsors_tab', 
		            'priority'   => 10,
		            'section'    => 'designhubs_our_sponsors_section',
		            'type'    => 'select',
		            'choices'    => array(
			        	'general' => 'General',
			        	'design' => 'Design',
		        	),
		        ) 
	        ) );
		//Our Sponsors in Title
			$wp_customize->add_setting( 'our_sponsors_main_title', array(
				'default'    => 'Our Sponsors',
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_sponsors_main_title',
		    	array(
					'type' => 'text',
					'settings' => 'our_sponsors_main_title',
					'section' => 'designhubs_our_sponsors_section', // // Add a default or your own section
					'label' => 'Our Sponsors Title', 
					'active_callback' => 'designhubs_our_sponsors_general_callback',     
				)
			) );
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'our_sponsors_main_title',
					array(
						'selector'        => '.our_sponsors_section',
						'render_callback' => 'designhubs_customize_partial_sponsors',
					)
				);
			}
		//Our Sponsors in Discription
			$wp_customize->add_setting( 'our_sponsors_main_discription', array(
				'default'    => $sponsors['sponsor']['description'],
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_sponsors_main_discription',
		    	array(
					'type' => 'textarea',
					'settings' => 'our_sponsors_main_discription',
					'section' => 'designhubs_our_sponsors_section', // // Add a default or your own section
					'label' => 'Our Sponsors Discription', 
					'active_callback' => 'designhubs_our_sponsors_general_callback',  
				)
			) );	
		//Our Sponsors in number of section
		    $wp_customize->add_setting( 'our_sponsors_number', array(
		    	'default'  => 10,
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'designhubs_sanitize_number_range',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_sponsors_number',
		    	array(
					'type' => 'number',
					'settings'   => 'our_sponsors_number', 
					'section' => 'designhubs_our_sponsors_section', // // Add a default or your own section
					'label' => 'No of Section',
					'description' => 'Save and refresh the page if No. of Section is changed (Max no of section is 20)',
					'input_attrs' => array(
								    'min' => 1,
								    'max' => 20,
								),
					'active_callback' => 'designhubs_our_sponsors_general_callback',  			   
				)
			) );
		$our_sponsors_number = get_theme_mod( 'our_sponsors_number', 10 );
			for ( $i = 1; $i <= $our_sponsors_number ; $i++ ) {
				//Our sponsors in headline
					$wp_customize->add_setting( 'our_sponsors_heading_'.$i, array(
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
				    	$wp_customize,'our_sponsors_heading_'.$i,
				    	array(
							'type' => 'text',
							'settings'   => 'our_sponsors_heading_'.$i, 
							'section' => 'designhubs_our_sponsors_section', 
							'label' => 'Our Sponsors ' .$i, 
							'active_callback' => 'designhubs_our_sponsors_general_callback',  
						)
					) );
				if($i <= 10){
					//Our sponsors image option
				        $wp_customize->add_setting('our_sponsors_image_'.$i, array(
				        	'type'       => 'theme_mod',
					        'transport'     => 'refresh',
					        'height'        => 180,
					        'width'        => 160,
					        'capability' => 'edit_theme_options',
					        'sanitize_callback' => 'esc_url_raw'
					    ));
					    $wp_customize->add_control( new WP_Customize_Image_Control( 
					    	$wp_customize, 'our_sponsors_image_'.$i, array(
						        'label' => 'Image '.$i,
						        'section' => 'designhubs_our_sponsors_section',
						        'settings' => 'our_sponsors_image_'.$i,
						        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
						        'active_callback' => 'designhubs_our_sponsors_general_callback',  
						    )
					    ) );
					//Our sponsors in image link
						$wp_customize->add_setting( 'our_sponsors_image_link_'.$i, array(
							'default'    => $sponsors['sponsor']['image_link'][$i-1],
						    'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
						) );
						$wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_sponsors_image_link_'.$i,
					    	array(
								'type' => 'text',
								'settings'   => 'our_sponsors_image_link_'.$i, 
								'section' => 'designhubs_our_sponsors_section', 
								'label' => 'Image Link ' .$i,
								'active_callback' => 'designhubs_our_sponsors_general_callback',  
							)
						) );
				}else{
					//Our sponsors image option
				        $wp_customize->add_setting('our_sponsors_image_'.$i, array(
				        	'type'       => 'theme_mod',
					        'transport'     => 'refresh',
					        'height'        => 180,
					        'width'        => 160,
					        'capability' => 'edit_theme_options',
					        'sanitize_callback' => 'esc_url_raw'
					    ));
					    $wp_customize->add_control( new WP_Customize_Image_Control( 
					    	$wp_customize, 'our_sponsors_image_'.$i, array(
						        'label' => 'Image '.$i,
						        'section' => 'designhubs_our_sponsors_section',
						        'settings' => 'our_sponsors_image_'.$i,
						        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
						        'active_callback' => 'designhubs_our_sponsors_general_callback',  
						    )
					    ) );
					//Our sponsors in image link
						$wp_customize->add_setting( 'our_sponsors_image_link_'.$i, array(
						    'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
						) );
						$wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_sponsors_image_link_'.$i,
					    	array(
								'type' => 'text',
								'settings'   => 'our_sponsors_image_link_'.$i, 
								'section' => 'designhubs_our_sponsors_section', 
								'label' => 'Image Link ' .$i,
								'active_callback' => 'designhubs_our_sponsors_general_callback',  
							)
						) );
				}
			}
			//Our sponsors in Text color
				$wp_customize->add_setting( 'our_sponsors_text_color', 
			        array(
			            'default'    => '#333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_sponsors_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'designhubs' ), 
			            'settings'   => 'our_sponsors_text_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_our_sponsors_section',   
			            'active_callback' => 'designhubs_our_sponsors_design_callback',
			        ) 
		        ) ); 
		    //Our sponsors in background color
				$wp_customize->add_setting( 'our_sponsors_bg_color', 
			        array(
			            'default'    => '#eee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_sponsors_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'designhubs' ), 
			            'settings'   => 'our_sponsors_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_our_sponsors_section', 
			            'active_callback' => 'designhubs_our_sponsors_design_callback',  
			        ) 
		        ) );  	
		    //Our sponsors in image hover background color
				$wp_customize->add_setting( 'our_sponsors_img_hover_bg_color', 
			        array(
			            'default'    => '#fff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_sponsors_img_hover_bg_color', 
			        array(
			            'label'      => __( 'Image Hover Background Color', 'designhubs' ), 
			            'settings'   => 'our_sponsors_img_hover_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_our_sponsors_section',
			            'active_callback' => 'designhubs_our_sponsors_design_callback',   
			        ) 
		        ) );  	 	
		    //Our sponsors in Autoplay True
			    $wp_customize->add_setting('our_sponsors_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_slider_autoplay',
			    	array(
				        'settings' => 'our_sponsors_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'designhubs_our_sponsors_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'designhubs_our_sponsors_design_callback',
			        )
			    )); 
			//Our sponsors Slider in autoplay speed
			    $wp_customize->add_setting('our_sponsors_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_slider_autoplay_speed',
			    	array(
				        'settings' => 'our_sponsors_slider_autoplay_speed',
				        'label'   => 'AutoplaySpeed',
				        'section' => 'designhubs_our_sponsors_section',
				        'type'  => 'text', 
				        'active_callback' => 'designhubs_our_sponsors_design_callback',  
			        )
			    ));    
}
add_action( 'customize_register', 'designhubs_sponsors_setting' );