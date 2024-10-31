<?php

function designhubs_slider_setting( $wp_customize ) {
	$sections = array();
	$sliders = apply_filters('designhubs_pro_section', $sections);
	//Featured Slider Section
			$wp_customize->add_section( 'designhubs_featured_slider' , array(
				'title'  => 'Featured Slider',
				'panel'  => 'designhubs_theme_option_panel',
			) ); 
			//Featured Slider in tabing
				$wp_customize->add_setting( 'featuredimage_slider_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'designhubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Designhubs_Custom_Radio_Control( 
			        $wp_customize,'featuredimage_slider_tab',array(
			            'settings'   => 'featuredimage_slider_tab', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Featured Slider in number of slides
			    $wp_customize->add_setting( 'featuredimage_slider_number', array(
			    	'default'  => 4,
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'designhubs_sanitize_number_range',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredimage_slider_number',
			    	array(
						'type' => 'number',
						'settings'   => 'featuredimage_slider_number', 
						'section' => 'designhubs_featured_slider', // // Add a default or your own section
						'label' => 'No of Slides',
						'description' => 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)',
						'input_attrs' => array(
									    'min' => 1,
									    'max' => 20,
									),
						'active_callback' => 'designhubs_featured_generalcallback',					   
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'featuredimage_slider_number',
						array(
							'selector'        => '.featuredimage_slider',
							'render_callback' => 'designhubs_customize_partial_featured_slider',
						)
					);
				}
				$slider_number = get_theme_mod( 'featuredimage_slider_number', 4 );
					for ( $i = 1; $i <= $slider_number ; $i++ ) {	
						//Featured slider Heading
							$wp_customize->add_setting('featuredimage_slider'.$i, array(
						        'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
						    ));
						    $wp_customize->add_control( new designhubs_GeneratePress_Upsell_Section(
						    	$wp_customize,'featuredimage_slider'.$i,
						    	array(
							        'settings' => 'featuredimage_slider'.$i,
							        'label'   => 'Slider '.$i ,
							        'section' => 'designhubs_featured_slider',
							        'type'     => 'ast-description',
							        'active_callback' => 'designhubs_featured_generalcallback',
						        )
						    ));
						if($i <= 4){
							//Featured slider title 
								$wp_customize->add_setting( 'featuredimage_slider_title_' . $i , array(
									'default'    => $sliders['slider']['title'][$i-1],
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_title_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_title_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Title ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',											   
									)
								) );
							//Featured slider description 
								$wp_customize->add_setting( 'featuredimage_slider_description_' . $i , array(
									'default'    => $sliders['slider']['description'][$i-1],
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_textarea_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_description_' . $i,
							    	array(
										'type' => 'textarea',
										'settings'   => 'featuredimage_slider_description_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Description ' . $i, 
										'active_callback' => 'designhubs_featured_generalcallback', 
									)
								) );
							//Featured slider image 
								$wp_customize->add_setting('featured_image_sliders_' . $i, array(
						        	'type'       => 'theme_mod',
							        'transport'     => 'refresh',
							        'height'        => 180,
							        'width'        => 160,
							        'capability' => 'edit_theme_options',
							        'sanitize_callback' => 'esc_url_raw'
							    ));
							    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_image_sliders_' . $i, array(
							        'label' =>  'Image '. $i,
							        'section' => 'designhubs_featured_slider',
							        'settings' => 'featured_image_sliders_' . $i,
							        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
							        'active_callback' => 'designhubs_featured_generalcallback',
							    )));
							//Featured slider add button
							    $wp_customize->add_setting( 'featuredimage_slider_button_' . $i , array(
							    	'default'   => $sliders['slider']['button'][$i-1],
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_button_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_button_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Button Text ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',  
									)
								) );
							//Featured slider add button link
							    $wp_customize->add_setting( 'featuredimage_slider_button_link_' . $i , array(
							    	'default'   => $sliders['slider']['button_link'][$i-1],
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_button_link_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_button_link_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Button Link ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',			   
									)
								) );
						}else{
							//Featured slider title 
								$wp_customize->add_setting( 'featuredimage_slider_title_' . $i , array(
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_title_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_title_' . $i, 
										'section' => 'designhubs_featured_slider', 
										'label' => 'Title ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',											   
									)
								) );
							//Featured slider description 
								$wp_customize->add_setting( 'featuredimage_slider_description_' . $i , array(
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_textarea_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_description_' . $i,
							    	array(
										'type' => 'textarea',
										'settings'   => 'featuredimage_slider_description_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Description ' . $i, 
										'active_callback' => 'designhubs_featured_generalcallback', 
									)
								) );
							//Featured slider image 
								$wp_customize->add_setting('featured_image_sliders_' . $i, array(
						        	'type'       => 'theme_mod',
							        'transport'     => 'refresh',
							        'height'        => 180,
							        'width'        => 160,
							        'capability' => 'edit_theme_options',
							        'sanitize_callback' => 'esc_url_raw'
							    ));
							    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_image_sliders_' . $i, array(
							        'label' =>  'Image '. $i,
							        'section' => 'designhubs_featured_slider',
							        'settings' => 'featured_image_sliders_' . $i,
							        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
							        'active_callback' => 'designhubs_featured_generalcallback',
							    )));
							//Featured slider add button
							    $wp_customize->add_setting( 'featuredimage_slider_button_' . $i , array(
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_button_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_button_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Button Text ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',  
									)
								) );
							//Featured slider add button link
							    $wp_customize->add_setting( 'featuredimage_slider_button_link_' . $i , array(
								    'type'       => 'theme_mod',
							        'transport'   => 'refresh',
							        'capability'     => 'edit_theme_options',
							        'sanitize_callback' => 'sanitize_text_field',
								) );
								$wp_customize->add_control( new WP_Customize_Control(
							    	$wp_customize,'featuredimage_slider_button_link_' . $i,
							    	array(
										'type' => 'text',
										'settings'   => 'featuredimage_slider_button_link_' . $i, 
										'section' => 'designhubs_featured_slider', // // Add a default or your own section
										'label' => 'Button Link ' . $i,	
										'active_callback' => 'designhubs_featured_generalcallback',			   
									)
								) );
							
						}
					}
			//Featured Slider in add text color
			    $wp_customize->add_setting( 'featured_slider_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'designhubs' ), 
			            'settings'   => 'featured_slider_text_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'active_callback' => 'designhubs_featured_design_callback',
			        ) 
		        ) );
		    //Featured Slider in add contain background color
			    $wp_customize->add_setting(
			        'alpha_color_setting',
			        array(
			            'default'    => 'rgba(255,255,255,0.3)',
			            'type'       => 'theme_mod',
			            'capability' => 'edit_theme_options',
			            'transport'  => 'refresh',
						'sanitize_callback' => 'designhubs_custom_sanitization_callback',
			        )
			    );	
			    $wp_customize->add_control(new Designhubs_Customize_Transparent_Color_Control(
			            $wp_customize,'alpha_color_setting',
			            array(
			                'label'        => __( 'Contain Background Color', 'designhubs' ),
			                'section'      => 'designhubs_featured_slider',
			                'settings'     => 'alpha_color_setting',
			                'active_callback'  => 'designhubs_featured_design_callback',
			            )
			        )
			    );
		   	//Featured Slider arrow in add Text color
			    $wp_customize->add_setting( 'featured_slider_arrow_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_text_color', 
			        array(
			            'label'      => __( 'Arrow Text Color', 'designhubs' ), 
			            'settings'   => 'featured_slider_arrow_text_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'active_callback' => 'designhubs_featured_design_callback',
			        ) 
		        ) );  	
		    //Featured Slider arrow in add background color
			    $wp_customize->add_setting( 'featured_slider_arrow_bg_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_bg_color', 
			        array(
			            'label'      => __( 'Arrow Background Color', 'designhubs' ), 
			            'settings'   => 'featured_slider_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'active_callback' => 'designhubs_featured_design_callback',
			        ) 
		        ) );
		    //Featured Slider in arrow Text hover color
			    $wp_customize->add_setting( 'featured_slider_arrow_texthover_color', 
			        array(
			            'default'    => '#455d58', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_texthover_color', 
			        array(
			            'label'      => __( 'Arrow Text Hover Color', 'designhubs' ), 
			            'settings'   => 'featured_slider_arrow_texthover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'active_callback' => 'designhubs_featured_design_callback',
			        ) 
		        ) );
		    //Featured Slider in add background hover color
			    $wp_customize->add_setting( 'featured_slider_arrow_bghover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_bghover_color', 
			        array(
			            'label'      => __( 'Arrow Background Hover Color', 'designhubs' ), 
			            'settings'   => 'featured_slider_arrow_bghover_color', 
			            'priority'   => 10,
			            'section'    => 'designhubs_featured_slider',
			            'active_callback' => 'designhubs_featured_design_callback',
			        ) 
		        ) );
		    //Featured Slider in Autoplay True
			    $wp_customize->add_setting('featured_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'designhubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay',
			    	array(
				        'settings' => 'featured_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'designhubs_featured_slider',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'designhubs_featured_design_callback',
			        )
			    )); 
			//Featured Slider in autoplay speed
			    $wp_customize->add_setting('featured_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay_speed',
			    	array(
				        'settings' => 'featured_slider_autoplay_speed',
				        'label'   => 'AutoplaySpeed',
				        'section' => 'designhubs_featured_slider',
				        'type'  => 'text',
				        'active_callback' => 'designhubs_featured_design_callback',
			        )
			    ));  
}
add_action( 'customize_register', 'designhubs_slider_setting' );