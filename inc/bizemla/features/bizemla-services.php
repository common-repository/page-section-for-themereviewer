<?php

function bizemla_services_setting( $wp_customize ) {
	$sections = array();
	$services = apply_filters('bizemla_section', $sections);
	//OUR SERVICES
			$wp_customize->add_section( 'bizemla_our_services_section' , array(
				'title'  => 'Our Services',
				'panel'  => 'theme_option_panel',
			) );
			//OUR SERVICES Tabing
				$wp_customize->add_setting( 'our_services_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'bizemla_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new bizemla_Custom_Radio_Control( 
			        $wp_customize,'our_services_tab',array(
			            'settings'   => 'our_services_tab', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our services in Title
				$wp_customize->add_setting( 'our_services_main_title', array(
					'default'    => 'Our Services',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_services_main_title',
						'section' => 'bizemla_our_services_section', // // Add a default or your own section
						'label' => 'Our Services Title',
						'active_callback' => 'bizemla_our_services_general_callback',  
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_services_main_title',
						array(
							'selector'        => '.our_services_section',
							'render_callback' => 'bizemla_customize_partial_services',
						)
					);
				}
			//Our services in Discription
				$wp_customize->add_setting( 'our_services_main_discription', array(
					'default' => $services['service']['description'],
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_main_discription',
			    	array(
						'type' => 'textarea',
						'settings' => 'our_services_main_discription',
						'section' => 'bizemla_our_services_section', // // Add a default or your own section
						'label' => 'Our Services Discription',   
						'active_callback' => 'bizemla_our_services_general_callback',  
					)
				) );
			//Our services in number of section
			    $wp_customize->add_setting( 'our_services_number', array(
			    	'default'  => 3,
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'bizemla_sanitize_number_range',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_number',
			    	array(
						'type' => 'number',
						'settings'   => 'our_services_number', 
						'section' => 'bizemla_our_services_section', // // Add a default or your own section
						'label' => 'No of Section',
						'description' => 'Save and refresh the page if No. of Section is changed (Max no of section is 3)',
						'input_attrs' => array(
									    'min' => 1,
									    'max' => 3,
									),	
						'active_callback' => 'bizemla_our_services_general_callback',  				   
					)
				) );
				$our_services_number = get_theme_mod( 'our_services_number', 3 );
				for ( $i = 1; $i <= $our_services_number ; $i++ ) {
					//Our services in headline
						$wp_customize->add_setting( 'our_services_heading_'.$i, array(
						    'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
						) );
						$wp_customize->add_control( new bizemla_GeneratePress_Upsell_Section(
					    	$wp_customize,'our_services_heading_'.$i,
					    	array(
								'type' => 'text',
								'settings'   => 'our_services_heading_'.$i, 
								'section' => 'bizemla_our_services_section', 
								'label' => 'Our Services ' .$i,   
								'active_callback' => 'bizemla_our_services_general_callback',  
							)
						) );
					//our_services Section image
						$wp_customize->add_setting('our_services_bg_image_'.$i, array(
				        	'type'       => 'theme_mod',
					        'transport'     => 'refresh',
					        'height'        => 180,
					        'width'        => 160,
					        'capability' => 'edit_theme_options',
					        'sanitize_callback' => 'esc_url_raw'
					    ));
					    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_services_bg_image_'.$i, array(
					        'label' => __('Background Image', 'bizemla'),
					        'section' => 'bizemla_our_services_section',
					        'settings' => 'our_services_bg_image_'.$i,
					        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
					        'active_callback' => 'bizemla_our_services_general_callback',
					    )));
					//Our services Section icon
						$wp_customize->add_setting('our_services_icon_'. $i,
					        array(
					            'default' => $services['service']['icon'][$i-1],
					            'transport' => 'refresh',
					            'type'       => 'theme_mod',
					            'capability' => 'edit_theme_options',
					            'sanitize_callback' => 'sanitize_text_field',
					        )
					    );
					    $wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_services_icon_'.$i,
					    	array(
					            'type'        => 'text',
								'settings'    => 'our_services_icon_'.$i,
								'label'       => 'Select Features Icon '.$i,
								'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Click Here</a> for select icon','bizemla'),
								'section'     => 'bizemla_our_services_section', 
								'active_callback' => 'bizemla_our_services_general_callback',    
					        )
					    ));	
					//Our services in Title
						$wp_customize->add_setting( 'our_services_title_'.$i, array(
							'default' => $services['service']['title'][$i-1],
						    'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
						) );
						$wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_services_title_'.$i,
					    	array(
								'type' => 'text',
								'settings'   => 'our_services_title_'.$i, 
								'section' => 'bizemla_our_services_section', 
								'label' => 'Title ' .$i, 
								'active_callback' => 'bizemla_our_services_general_callback',  
							)
						) );
					//Our services in Link
						$wp_customize->add_setting( 'our_services_title_link_'.$i, array(
							'default'   => '#',
						    'type'      => 'theme_mod',
					        'transport'  => 'refresh',
					        'capability' => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
						) );
						$wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_services_title_link_'.$i,
					    	array(
								'type' => 'text',
								'settings'   => 'our_services_title_link_'.$i, 
								'section' => 'bizemla_our_services_section', 
								'label' => 'Title Link ' .$i,
								'active_callback' => 'bizemla_our_services_general_callback',  
							)
						) );
					//Our services in Description
						$wp_customize->add_setting( 'our_services_description_'.$i, array(
							'default' => $services['service']['subheading'][$i-1],
						    'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_textarea_field',
						) );
						$wp_customize->add_control( new WP_Customize_Control(
					    	$wp_customize,'our_services_description_'.$i,
					    	array(
								'type' => 'textarea',
								'settings'   => 'our_services_description_'.$i, 
								'section' => 'bizemla_our_services_section', 
								'label' => 'Description ' .$i,	 
								'active_callback' => 'bizemla_our_services_general_callback',     
							)
						) );	
				}				
			//Our services Section in pro version
				$wp_customize->add_setting('our_services_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new bizemla_pro_option_Control(
			    	$wp_customize,'our_services_section_pro',
			    	array(
				        'settings' => 'our_services_section_pro',
				        'section' => 'bizemla_our_services_section',
				        'active_callback' => 'bizemla_our_services_general_callback',
			        )
			    ));
			//Our services Section in Background Title
		    	$wp_customize->add_setting('our_services_background_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new bizemla_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_services_background_section',
			    	array(
				        'settings' => 'our_services_background_section',
				        'label'   => 'Background Color Or Image',
				        'section' => 'bizemla_our_services_section',
				        'type'     => 'ast-description',
				        'active_callback' => 'bizemla_our_services_design_callback',
			        )
			    ));
			//Our services Section in Background Image
			    	$wp_customize->add_setting('our_services_bg_image', array(
			    		'default'  => '',
			        	'type'       => 'theme_mod',
				        'transport'     => 'refresh',
				        'height'        => 180,
				        'width'        => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_services_bg_image', array(
				        'label' => __('Backgroung Image', 'bizemla'),
				        'section' => 'bizemla_our_services_section',
				        'settings' => 'our_services_bg_image',
				        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				        'active_callback' => 'bizemla_our_services_design_callback',
				    )));
			//Our services Section in Background Position
			    $wp_customize->add_setting('bizemla_our_services_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'bizemla_our_services_bg_position',
			    	array(
				        'settings' => 'bizemla_our_services_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'bizemla_our_services_section',
				        'type'  => 'select',
				        'active_callback' => 'bizemla_our_services_design_callback',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        )
			    ));
			//Our services Section in Background Attachment
				$wp_customize->add_setting('bizemla_our_services_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'bizemla_our_services_bg_attachment',
			    	array(
				        'settings' => 'bizemla_our_services_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'bizemla_our_services_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'bizemla_our_services_design_callback',
			        )
			    ));
			//Our services Section in image background Size
			    $wp_customize->add_setting('bizemla_our_services_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'bizemla_our_services_bg_size',
			    	array(
				        'settings' => 'bizemla_our_services_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'bizemla_our_services_section',
				        'type'  => 'select',
				        'active_callback' => 'bizemla_our_services_design_callback',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));   
			//Our services in Background color
				$wp_customize->add_setting( 'our_services_bg_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'bizemla' ), 
			            'settings'   => 'our_services_bg_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',
			            'active_callback' => 'bizemla_our_services_design_callback',       
			        ) 
		        ) ); 
		    //Our services in Text color
				$wp_customize->add_setting( 'our_services_text_color', 
			        array(
			            'default'    => '#333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'bizemla' ), 
			            'settings'   => 'our_services_text_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section', 
			            'active_callback' => 'bizemla_our_services_design_callback',   
			        ) 
		        ) ); 
		    //Our services in Contain Background color
				$wp_customize->add_setting( 'our_services_contain_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_contain_bg_color', 
			        array(
			            'label'      => __( 'Contain Background Color', 'bizemla' ), 
			            'settings'   => 'our_services_contain_bg_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section', 
			            'active_callback' => 'bizemla_our_services_design_callback',   
			        ) 
		        ) ); 
		    //Our services in Contain Background Hover color
				$wp_customize->add_setting( 'our_services_contain_bg_hover_color', 
			        array(
			            'default'    => '#168686', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_contain_bg_hover_color', 
			        array(
			            'label'      => __( 'Contain Background Hover Color', 'bizemla' ), 
			            'settings'   => 'our_services_contain_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section', 
			            'active_callback' => 'bizemla_our_services_design_callback',   
			        ) 
		        ) ); 
		    //Our services in Link color
				$wp_customize->add_setting( 'our_services_link_color', 
			        array(
			            'default'    => '#168686', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_link_color', 
			        array(
			            'label'      => __( 'Link Color', 'bizemla' ), 
			            'settings'   => 'our_services_link_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',   
			            'active_callback' => 'bizemla_our_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services in Link Hover color
				$wp_customize->add_setting( 'our_services_link_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_link_hover_color', 
			        array(
			            'label'      => __( 'Link Hover Color', 'bizemla' ), 
			            'settings'   => 'our_services_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',   
			            'active_callback' => 'bizemla_our_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services in Contain text color
				$wp_customize->add_setting( 'our_services_contain_text_color', 
			        array(
			            'default'    => '#168686', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_contain_text_color', 
			        array(
			            'label'      => __( 'Contain Text Color', 'bizemla' ), 
			            'settings'   => 'our_services_contain_text_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',   
			            'active_callback' => 'bizemla_our_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services in Contain text hover color
				$wp_customize->add_setting( 'our_services_contain_text_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_contain_text_hover_color', 
			        array(
			            'label'      => __( 'Contain Text Hover Color', 'bizemla' ), 
			            'settings'   => 'our_services_contain_text_hover_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section',  
			            'active_callback' => 'bizemla_our_services_design_callback', 
			        ) 
		        ) );   
		    //Our services in icon color
				$wp_customize->add_setting( 'our_services_icon_bg_color', 
			        array(
			            'default'    => '#168686', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_icon_bg_color', 
			        array(
			            'label'      => __( 'Icon Background Color', 'bizemla' ), 
			            'settings'   => 'our_services_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section', 
			            'active_callback' => 'bizemla_our_services_design_callback',   
			        ) 
		        ) );
		    //Our services in icon hover color
				$wp_customize->add_setting( 'our_services_icon_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'our_services_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'bizemla' ), 
			            'settings'   => 'our_services_icon_color', 
			            'priority'   => 10,
			            'section'    => 'bizemla_our_services_section', 
			            'active_callback' => 'bizemla_our_services_design_callback',   
			        ) 
		        ) );
		    //Our services in icon font size
		        $wp_customize->add_setting('our_services_icon_size', array(
		        	'default'    => '40',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_textarea_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_icon_size',
			    	array(
				        'settings' => 'our_services_icon_size',
				        'label'   => 'Icon Size',
				        'section' => 'bizemla_our_services_section',
				        'type'    => 'number',
				        'description' => 'in px',  
				        'input_attrs' => array(
								    'min' => 1,
								    'max' => 100,
								),
						'active_callback' => 'bizemla_our_services_design_callback', 	
				    )
				));	
}
add_action( 'customize_register', 'bizemla_services_setting' );

function bizemla_our_services_general_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','general');
	if ( 'general' === $our_services_tab ) {
		return true;
	}
	return false;
}
function bizemla_our_services_design_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','design');
	if ( 'design' === $our_services_tab ) {
		return true;
	}
	return false;
}