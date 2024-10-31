<?php

function silver_hubs_slider_setting( $wp_customize ) {
	$sections = array();
	$sliders = apply_filters('silver_hubs_pro_section', $sections);
	//Featured Slider Section
		$wp_customize->add_section( 'silver_hubs_featured_slider' , array(
			'title'  => 'Featured Slider',
			'panel'  => 'silver_hubs_theme_option_panel',
		) ); 
		    //Featured Slider in tabing
				$wp_customize->add_setting( 'featured_image_video_slider', 
			        array(
			            'default'    => 'image', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'silver_hubs_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'featured_image_video_slider',array(
			        	'label' => __( 'Slider Background Type'),
			            'settings'   => 'featured_image_video_slider', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			            'type'    => 'select',
			            'choices'    => array(
				        	'video' => 'Video',
				        	'image'  => 'Image',
			        	),
			        ) 
		        ) );

		    //Featured slider vedio
				$wp_customize->add_setting( 'video_upload',
				   array(
				        'default' => '',
				        'transport' => 'refresh',
				        'capability' => 'edit_theme_options',
				        //'sanitize_callback' => 'absint',
				        'type' => 'theme_mod',
				   )
				);
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'video_upload',
				   array(
				        'label' => __( 'Default Media Control' ),
				        'description' => esc_html__( 'Upload your video in .mp4 format and minimize its file size for best results. For this theme the recommended size is 1150 × 2000 pixels.' ),
				        'section' => 'silver_hubs_featured_slider',
				        'settings' => 'video_upload',
				        'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
				        'button_labels' => array( // Optional
				            'select' => __( 'Select File' ),
				            'change' => __( 'Change File' ),
				            'default' => __( 'Default' ),
				            'remove' => __( 'Remove' ),
				            'placeholder' => __( 'No file selected' ),
				            'frame_title' => __( 'Select File' ),
				            'frame_button' => __( 'Choose File' ),
				      	),
				      	'active_callback' => 'silver_hubs_featured_vedio_callback',
				   	)
				) );
			//Featured slider title 
				$wp_customize->add_setting( 'featuredvideo_slider_title' , array(
					'default'    => $sliders['slider']['video_title'],
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredvideo_slider_title',
			    	array(
						'type' => 'text',
						'settings'   => 'featuredvideo_slider_title', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'Title ',	
						'active_callback' => 'silver_hubs_featured_vedio_callback',										   
					)
				) );
			//Featured slider description 
				$wp_customize->add_setting( 'featuredvideo_slider_description', array(
					'default'    => $sliders['slider']['video_disc'],
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_textarea_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredvideo_slider_description',
			    	array(
						'type' => 'textarea',
						'settings'   => 'featuredvideo_slider_description', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'Description ', 
						'active_callback' => 'silver_hubs_featured_vedio_callback',
					)
				) );
			//Featured slider add button
			    $wp_customize->add_setting( 'featuredvideo_slider_button', array(
			    	'default'    => $sliders['slider']['video_btn'],
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredvideo_slider_button',
			    	array(
						'type' => 'text',
						'settings'   => 'featuredvideo_slider_button', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'Button Text ',	
						'active_callback' => 'silver_hubs_featured_vedio_callback',
					)
				) );
			//Featured slider add button link
			    $wp_customize->add_setting( 'featuredvideo_slider_button_link' , array(
			    	'default'    => $sliders['slider']['video_btn_link'],
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredvideo_slider_button_link',
			    	array(
						'type' => 'text',
						'settings'   => 'featuredvideo_slider_button_link', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'Button Link ',	
						'active_callback' => 'silver_hubs_featured_vedio_callback',		   
					)
				) );

			//Featured Slider in number of slides
			    $wp_customize->add_setting( 'featuredimage_slider_number', array(
			    	'default'  => 2,
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'silver_hubs_sanitize_number_range',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featuredimage_slider_number',
			    	array(
						'type' => 'number',
						'settings'   => 'featuredimage_slider_number', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'No of Slides',
						'description' => 'Save and refresh the page if No. of Slides is changed (Max no of slides is 2)',
						'input_attrs' => array(
									    'min' => 1,
									    'max' => 2,
									),
						'active_callback' => 'silver_hubs_featured_image_callback',					   
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'featuredimage_slider_number',
						array(
							'selector'        => '.featuredimage_slider',
							'render_callback' => 'silver_hubs_customize_partial_featured_slider',
						)
					);
				}
				
				$slider_number = get_theme_mod( 'featuredimage_slider_number', 2 );
					for ( $i = 1; $i <= $slider_number ; $i++ ) {	
						//Featured slider Heading
							$wp_customize->add_setting('featuredimage_slider'.$i, array(
						        'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
						    ));
						    $wp_customize->add_control( new silver_hubs_GeneratePress_Upsell_Section(
						    	$wp_customize,'featuredimage_slider'.$i,
						    	array(
							        'settings' => 'featuredimage_slider'.$i,
							        'label'   => 'Slider '.$i ,
							        'section' => 'silver_hubs_featured_slider',
							        'type'     => 'ast-description',
							        'active_callback' => 'silver_hubs_featured_image_callback',
						        )
						    ));
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
									'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
									'label' => 'Title ' . $i,	
									'active_callback' => 'silver_hubs_featured_image_callback',									   
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
									'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
									'label' => 'Description ' . $i, 
									'active_callback' => 'silver_hubs_featured_image_callback',
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
						        'section' => 'silver_hubs_featured_slider',
						        'settings' => 'featured_image_sliders_' . $i,
						        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
						        'active_callback' => 'silver_hubs_featured_image_callback',
						    )));
						//Featured slider add button
						    $wp_customize->add_setting( 'featuredimage_slider_button_' . $i , array(
						    	'default'    => $sliders['slider']['button'][$i-1],
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
									'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
									'label' => 'Button Text ' . $i,	
									'active_callback' => 'silver_hubs_featured_image_callback',  
								)
							) );
						//Featured slider add button link
						    $wp_customize->add_setting( 'featuredimage_slider_button_link_' . $i , array(
						    	'default'    => $sliders['slider']['button_link'][$i-1],
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
									'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
									'label' => 'Button Link ' . $i,	
									'active_callback' => 'silver_hubs_featured_image_callback',		   
								)
							) );
					}
					//Featured Slider Pro Link
						$wp_customize->add_setting('featuredimage_slider_pro', array(
					        'type'       => 'theme_mod',
					        'transport'   => 'refresh',
					        'capability'     => 'edit_theme_options',
					        'sanitize_callback' => 'sanitize_text_field',
					    ));
					    $wp_customize->add_control( new silver_hubs_pro_option_Control(
					    	$wp_customize,'featuredimage_slider_pro',
					    	array(
						        'settings' => 'featuredimage_slider_pro',
						        //'label'   => 'More Options Available in Goldly Pro!',
						        'section' => 'silver_hubs_featured_slider',
						        'active_callback' => 'silver_hubs_featured_image_callback',
					        )
					    ));	

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
			            'label'      => __( 'Text Color', 'silver_hubs' ), 
			            'settings'   => 'featured_slider_text_color', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			        ) 
		        ) );
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
			            'label'      => __( 'Arrow Text Color', 'silver_hubs' ), 
			            'settings'   => 'featured_slider_arrow_text_color', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			            'active_callback' => 'silver_hubs_featured_image_callback',
			        ) 
		        ) );  	
		    //Featured Slider arrow in add background color
			    $wp_customize->add_setting( 'featured_slider_arrow_bg_color', 
			        array(
			            'default'    => '#333333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_bg_color', 
			        array(
			            'label'      => __( 'Arrow Background Color', 'silver_hubs' ), 
			            'settings'   => 'featured_slider_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			            'active_callback' => 'silver_hubs_featured_image_callback',
			        ) 
		        ) );
		    //Featured Slider in arrow Text hover color
			    $wp_customize->add_setting( 'featured_slider_arrow_texthover_color', 
			        array(
			            'default'    => '#333333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize,'featured_slider_arrow_texthover_color', 
			        array(
			            'label'      => __( 'Arrow Text Hover Color', 'silver_hubs' ), 
			            'settings'   => 'featured_slider_arrow_texthover_color', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			            'active_callback' => 'silver_hubs_featured_image_callback',
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
			            'label'      => __( 'Arrow Background Hover Color', 'silver_hubs' ), 
			            'settings'   => 'featured_slider_arrow_bghover_color', 
			            'priority'   => 10,
			            'section'    => 'silver_hubs_featured_slider',
			            'active_callback' => 'silver_hubs_featured_image_callback',
			        ) 
		        ) );
		    //Featured slider aling item
			    $wp_customize->add_setting( 'featured_slider_aling_item' , array(
			    	'default'    => 'left',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'silver_hubs_sanitize_select',
				) );
				$wp_customize->add_control( new Silver_Hubs_Align_Radio_Control(
			    	$wp_customize,'featured_slider_aling_item',
			    	array(
						'settings'   => 'featured_slider_aling_item', 
						'section' => 'silver_hubs_featured_slider', // // Add a default or your own section
						'label' => 'Slider Content Alignment',	
						'type'    => 'select',
			            'choices'    => array(
				        	'left' => 'Left',
				        	'center' => 'Center',
				        	'right' => 'Right',
			        	),		   
					)
				) );
		    //Featured Slider in Autoplay True
			    $wp_customize->add_setting('featured_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'silver_hubs_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay',
			    	array(
				        'settings' => 'featured_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'silver_hubs_featured_slider',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'silver_hubs_featured_image_callback',
			        	//'active_callback' => 'silver_hubs_featured_design_callback',
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
				        'section' => 'silver_hubs_featured_slider',
				        'type'  => 'text',
				        'active_callback' => 'silver_hubs_featured_image_callback',
			        )
			    ));  
}
add_action( 'customize_register', 'silver_hubs_slider_setting' );

function silver_hubs_featured_image_callback(){
	$featured_image_video_slider = get_theme_mod( 'featured_image_video_slider','image');
	if ( 'image' === $featured_image_video_slider ) {
		return true;
	}
	return false;
}
function silver_hubs_featured_vedio_callback(){
	$featured_image_video_slider = get_theme_mod( 'featured_image_video_slider','image');
	if ( 'video' === $featured_image_video_slider ) {
		return true;
	}
	return false;
}