<?php
function bizemla_testimonial_setting( $wp_customize ) {
	$sections = array();
	$testimonials = apply_filters('bizemla_pro_section', $sections);
	//Our Testimonial
		$wp_customize->add_section( 'bizemla_our_testimonial_section' , array(
			'title'  => 'Our Testimonial',
			'panel'  => 'theme_option_panel',
		) );
		//Our Testimonial Tabing
		 	$wp_customize->add_setting( 'our_testimonial_section_tab', 
		        array(
		            'default'    => 'general', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_sanitize_select',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Custom_Radio_Control( 
		        $wp_customize,'our_testimonial_section_tab',array(
		            'settings'   => 'our_testimonial_section_tab', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'type'    => 'select',
		            'choices'    => array(
			        	'general' => 'General',
			        	'design' => 'Design',
		        	),
		        ) 
	        ) );
		//Our Testimonial in Title
			$wp_customize->add_setting( 'our_testimonial_main_title', array(
				'default'    => 'Our Testimonial',
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_main_title',
		    	array(
					'type' => 'text',
					'settings' => 'our_testimonial_main_title',
					'section' => 'bizemla_our_testimonial_section', // // Add a default or your own section
					'label' => 'Our Testimonial Title',
					'active_callback' => 'bizemla_our_testimonial_general_callback',
				)
			) );
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'our_testimonial_main_title',
					array(
						'selector'        => '.our_testimonial_section',
						'render_callback' => 'bizemla_customize_partial_testimonial',
					)
				);
			}
		//Our Testimonial in Discription
			$wp_customize->add_setting( 'our_testimonial_main_discription', array(
				'default'  => $testimonials['testimonial']['description'],
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_main_discription',
		    	array(
					'type' => 'textarea',
					'settings' => 'our_testimonial_main_discription',
					'section' => 'bizemla_our_testimonial_section', // // Add a default or your own section
					'label' => 'Our Testimonial Discription',  
					'active_callback' => 'bizemla_our_testimonial_general_callback',
				)
			) );
		//Our Testimonial in number of section
		    $wp_customize->add_setting( 'our_testimonial_number', array(
		    	'default'  => 4,
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'bizemla_sanitize_number_range',
			) );
			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_number',
		    	array(
					'type' => 'number',
					'settings'   => 'our_testimonial_number', 
					'section' => 'bizemla_our_testimonial_section', // // Add a default or your own section
					'label' => 'No of Slider',
					'description' => 'Save and refresh the page if No. of Slider is changed (Max no of section is 20)',
					'input_attrs' => array(
								    'min' => 1,
								    'max' => 20,
								),	
					'active_callback' => 'bizemla_our_testimonial_general_callback',				   
				)
			) );
			$our_testimonial_number = get_theme_mod( 'our_testimonial_number', 4 );
			for ( $i = 1; $i <= $our_testimonial_number ; $i++ ) {
				//Our Testimonial in headline
					$wp_customize->add_setting( 'our_testimonial_heading_'.$i, array(
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new bizemla_GeneratePress_Upsell_Section(
				    	$wp_customize,'our_testimonial_heading_'.$i,
				    	array(
							'type' => 'text',
							'settings'   => 'our_testimonial_heading_'.$i, 
							'section' => 'bizemla_our_testimonial_section', 
							'label' => 'Our Testimonial ' .$i,
							'active_callback' => 'bizemla_our_testimonial_general_callback',
						)
					) );	
				//Our Testimonial in Title
					$wp_customize->add_setting( 'our_testimonial_title_'.$i, array(
						'default'  => $testimonials['testimonial']['title'][$i-1],
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_testimonial_title_'.$i,
				    	array(
							'type' => 'text',
							'settings'   => 'our_testimonial_title_'.$i, 
							'section' => 'bizemla_our_testimonial_section', 
							'label' => 'Title ' .$i,
							'active_callback' => 'bizemla_our_testimonial_general_callback',	
						)
					) );
				//Our Testimonial in sub headline
					$wp_customize->add_setting( 'our_testimonial_subheadline_'.$i, array(
						'default'  => $testimonials['testimonial']['sub_heading'][$i-1],
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_testimonial_subheadline_'.$i,
				    	array(
							'type' => 'text',
							'settings'   => 'our_testimonial_subheadline_'.$i, 
							'section' => 'bizemla_our_testimonial_section', 
							'label' => 'Sub Headline ' .$i,	
							'active_callback' => 'bizemla_our_testimonial_general_callback',
						)
					) );
				//Our Testimonial in Description
					$wp_customize->add_setting( 'our_testimonial_description_'.$i, array(
						'default'  => $testimonials['testimonial']['deacription1'][$i-1],
					    'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
					) );
					$wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_testimonial_description_'.$i,
				    	array(
							'type' => 'text',
							'settings'   => 'our_testimonial_description_'.$i, 
							'section' => 'bizemla_our_testimonial_section', 
							'label' => 'Description ' .$i,	
							'active_callback' => 'bizemla_our_testimonial_general_callback',
						)
					) );	
				//Our Team image option
			        $wp_customize->add_setting('our_testimonial_image_'.$i, array(
			        	'type'       => 'theme_mod',
				        'transport'     => 'refresh',
				        'height'        => 180,
				        'width'        => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( 
				    	$wp_customize, 'our_testimonial_image_'.$i, array(
					        'label' => 'Image '.$i, 
					        'section' => 'bizemla_our_testimonial_section',
					        'settings' => 'our_testimonial_image_'.$i,
					        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
					        'active_callback' => 'bizemla_our_testimonial_general_callback',
					    )
				    ) );	
			}
		//Our Testimonial in background color
			$wp_customize->add_setting( 'our_team_testimonial_bg_color', 
		        array(
		            'default'    => '#eeeeee', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_team_testimonial_bg_color', 
		        array(
		            'label'      => __( 'Background Color', 'bizemla' ), 
		            'settings'   => 'our_team_testimonial_bg_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) ); 
	    //Our Testimonial background image option
	        $wp_customize->add_setting('our_testimonial_background_image', array(
	        	'type'       => 'theme_mod',
		        'transport'     => 'refresh',
		        'height'        => 180,
		        'width'        => 160,
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw'
		    ));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_testimonial_background_image', array(
		        'label' => __('Backgroung Image', 'bizemla'),
		        'section' => 'bizemla_our_testimonial_section',
		        'settings' => 'our_testimonial_background_image',
		        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
		        'active_callback' => 'bizemla_our_testimonial_design_callback',
		    )));
		//Our Testimonial in image background position
		    $wp_customize->add_setting('our_testimonial_bg_position', array(
		        'default'        => 'center center',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_bg_position',
		    	array(
			        'settings' => 'our_testimonial_bg_position',
			        'label'   => 'Background Position',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'select',
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
		        	'active_callback' => 'bizemla_our_testimonial_design_callback',
		        )
		    )); 
		//Our Testimonial in image background attachment
		    $wp_customize->add_setting('our_testimonial_bg_attachment', array(
		        'default'        => 'fixed',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_bg_attachment',
		    	array(
			        'settings' => 'our_testimonial_bg_attachment',
			        'label'   => 'Background Attachment',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'select',
			        'choices'    => array(
			        	'scroll' => 'Scroll',
			        	'fixed' => 'Fixed',
		        	),
		        	'active_callback' => 'bizemla_our_testimonial_design_callback',
		        )
		    ));
		//Our Testimonial in image background Size
		    $wp_customize->add_setting('our_testimonial_bg_size', array(
		        'default'        => 'cover',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_bg_size',
		    	array(
			        'settings' => 'our_testimonial_bg_size',
			        'label'   => 'Background Size',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'select',
			        'choices'    => array(
			        	'auto' => 'Auto',
			        	'cover' => 'Cover',
			            'contain' => 'Contain'
		        	),
		        	'active_callback' => 'bizemla_our_testimonial_design_callback',
		        )
		    ));  		   
	    //Our Testimonial in Text color
			$wp_customize->add_setting( 'our_testimonial_text_color', 
		        array(
		            'default'    => '#333', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_testimonial_text_color', 
		        array(
		            'label'      => __( 'Text Color', 'bizemla' ), 
		            'settings'   => 'our_testimonial_text_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) ); 
	        $wp_customize->add_setting(
		        'our_testimonial_alpha_color_setting',
		        array(
		            'default'    => '#ffffff',
		            'type'       => 'theme_mod',
		            'capability' => 'edit_theme_options',
		            'transport'  => 'refresh',
					'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        )
		    );	
		    $wp_customize->add_control(new bizemla_Customize_Transparent_Color_Control(
		            $wp_customize,'our_testimonial_alpha_color_setting',
		            array(
		                'label'        => __( 'Contain Background Color', 'bizemla' ),
		                'section'      => 'bizemla_our_testimonial_section',
		                'settings'     => 'our_testimonial_alpha_color_setting',
		                'active_callback'  => 'bizemla_our_testimonial_design_callback',
		            )
		        )
		    ); 
	    //Our Testimonial in Description Text color
			$wp_customize->add_setting( 'our_team_testimonial_text_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_team_testimonial_text_color', 
		        array(
		            'label'      => __( 'Description Text Color', 'bizemla' ), 
		            'settings'   => 'our_team_testimonial_text_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );  
	    //Our Testimonial in image border color
			$wp_customize->add_setting( 'our_team_testimonial_img_border_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_team_testimonial_img_border_color', 
		        array(
		            'label'      => __( 'Image Border Date', 'bizemla' ), 
		            'settings'   => 'our_team_testimonial_img_border_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );
	    //Our Testimonial in background hover color
			$wp_customize->add_setting( 'our_team_testimonial_quote_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_team_testimonial_quote_color', 
		        array(
		            'label'      => __( 'Quote color', 'bizemla' ), 
		            'settings'   => 'our_team_testimonial_quote_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) ); 
	    //Our Testimonial in arrow text color
			$wp_customize->add_setting( 'our_testimonial_arrow_text_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_testimonial_arrow_text_color', 
		        array(
		            'label'      => __( 'Arrow Text Color', 'bizemla' ), 
		            'settings'   => 'our_testimonial_arrow_text_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );  
	    //Our Testimonial in arrow background color
			$wp_customize->add_setting( 'our_testimonial_arrow_bg_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_testimonial_arrow_bg_color', 
		        array(
		            'label'      => __( 'Arrow Background Color', 'bizemla' ), 
		            'settings'   => 'our_testimonial_arrow_bg_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );  
	    //Our Testimonial in arrow text hover color
			$wp_customize->add_setting( 'our_testimonial_arrow_text_hover_color', 
		        array(
		            'default'    => '#168686', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_testimonial_arrow_text_hover_color', 
		        array(
		            'label'      => __( 'Arrow Text Hover Color', 'bizemla' ), 
		            'settings'   => 'our_testimonial_arrow_text_hover_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );  
	    //Our Testimonial in arrow background hover color
			$wp_customize->add_setting( 'our_testimonial_arrow_bg_hover_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'bizemla_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new bizemla_Customize_Transparent_Color_Control( 
		        $wp_customize,'our_testimonial_arrow_bg_hover_color', 
		        array(
		            'label'      => __( 'Arrow Background Hover Color', 'bizemla' ), 
		            'settings'   => 'our_testimonial_arrow_bg_hover_color', 
		            'priority'   => 10,
		            'section'    => 'bizemla_our_testimonial_section',
		            'active_callback' => 'bizemla_our_testimonial_design_callback',
		        ) 
	        ) );   
	    //Our Testimonial in Autoplay True
		    $wp_customize->add_setting('our_testimonial_slider_autoplay', array(
		        'default'        => 'true',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'bizemla_sanitize_select',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_slider_autoplay',
		    	array(
			        'settings' => 'our_testimonial_slider_autoplay',
			        'label'   => 'Autoplay',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'select',
			        'choices'    => array(
			        	'true' => 'True',
			        	'false' => 'False',
		        	),
		        	'active_callback' => 'bizemla_our_testimonial_design_callback',
		        )
		    )); 
		//Our Testimonial Slider in autoplay speed
		    $wp_customize->add_setting('our_testimonial_slider_autoplay_speed', array(
		    	'default'        => '1000',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_slider_autoplay_speed',
		    	array(
			        'settings' => 'our_testimonial_slider_autoplay_speed',
			        'label'   => 'AutoplaySpeed',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'text', 
			        'active_callback' => 'bizemla_our_testimonial_design_callback',  
		        )
		    ));    
		//Our Testimonial in autoplay TimeOut
		    $wp_customize->add_setting('our_testimonial_autoplay_timeout', array(
		    	'default'        => '5000',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'our_testimonial_autoplay_timeout',
		    	array(
			        'settings' => 'our_testimonial_autoplay_timeout',
			        'label'   => 'AutoplayTimeout',
			        'section' => 'bizemla_our_testimonial_section',
			        'type'  => 'text',
			        'active_callback' => 'bizemla_our_testimonial_design_callback',
		        )
		    ));     
}
add_action( 'customize_register', 'bizemla_testimonial_setting' );

function bizemla_our_testimonial_general_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','general');
	if ( 'general' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function bizemla_our_testimonial_design_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','design');
	if ( 'design' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}