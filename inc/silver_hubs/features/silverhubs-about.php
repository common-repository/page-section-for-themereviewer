<?php
function silver_hubs_about_setting( $wp_customize ) {
	$sections = array();
	$abouts = apply_filters('silver_hubs_pro_section', $sections);
	//About Section
		$wp_customize->add_section( 'silver_hubs_about_section' , array(
			'title'  => 'About Section',
			'panel'  => 'silver_hubs_theme_option_panel',
		) );
		//About Section in Tabing
			$wp_customize->add_setting( 'about_section_tab', 
		        array(
		            'default'    => 'general', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'silver_hubs_sanitize_select',
		        ) 
		    ); 
	        $wp_customize->add_control( new silver_hubs_Custom_Radio_Control( 
		        $wp_customize,'about_section_tab',array(
		            'settings'   => 'about_section_tab', 
		            'priority'   => 10,
		            'section'    => 'silver_hubs_about_section',
		            'type'    => 'select',
		            'choices'    => array(
			        	'general' => 'General',
			        	'design' => 'Design',
		        	),
		        ) 
	        ) );
		//About Section title
		    $wp_customize->add_setting('silver_hubs_about_main_title', array(
		        'default'        => 'About',
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_text_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'silver_hubs_about_main_title',
		    	array(
			        'settings' => 'silver_hubs_about_main_title',
			        'label'   => 'About Title',
			        'section' => 'silver_hubs_about_section',
			        'type'  => 'text',
			        'active_callback' => 'silver_hubs_about_general_callback',
		        )
		    ));
		    if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'silver_hubs_about_main_title',
					array(
						'selector'        => '.about_section_info',
						'render_callback' => 'silver_hubs_customize_about_name',
					)
				);
			}
		//About Section Description
		    $wp_customize->add_setting('silver_hubs_about_description', array(
		    	'default'    => $abouts['about']['description'],
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'sanitize_textarea_field',
		    ));
		    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'silver_hubs_about_description',
		    	array(
			        'settings' => 'silver_hubs_about_description',
			        'label'   => 'About Description',
			        'section' => 'silver_hubs_about_section',
			        'type'  => 'textarea',
			        'active_callback' => 'silver_hubs_about_general_callback',
		        )
		    ));
		//About Section image 
			$wp_customize->add_setting('about_section_image', array(
	        	'type'       => 'theme_mod',
		        'transport'     => 'refresh',
		        'height'        => 180,
		        'width'        => 160,
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw'
		    ));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_section_image' , array(
		        'label' =>  'Image',
		        'section' => 'silver_hubs_about_section',
		        'settings' => 'about_section_image',
		        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
		        'active_callback' => 'silver_hubs_about_general_callback',
		    ))); 
		//Layout1
		    //Layout1 title
			    $wp_customize->add_setting('silver_hubs_about_layout1_title', array(
			        'default'        => 'Hi, I Am Samantha!',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'silver_hubs_about_layout1_title',
			    	array(
				        'settings' => 'silver_hubs_about_layout1_title',
				        'label'   => 'About Title',
				        'section' => 'silver_hubs_about_section',
				        'type'  => 'text',
				        'active_callback' => 'silver_hubs_about_general_callback',
			        )
			    ));
			//Layout1 subheading
			    $wp_customize->add_setting('silver_hubs_about_layout1_subheading', array(
			        'default'        => 'Owner/Founder, Executive Coach',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'silver_hubs_about_layout1_subheading',
			    	array(
				        'settings' => 'silver_hubs_about_layout1_subheading',
				        'label'   => 'Sub Heading',
				        'section' => 'silver_hubs_about_section',
				        'type'  => 'text',
				        'active_callback' => 'silver_hubs_about_general_callback',
			        )
			    ));
			//Layout1 description
			    $wp_customize->add_setting('silver_hubs_about_layout1_description', array(
			    	'default'    => $abouts['about']['description1'],
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_textarea_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'silver_hubs_about_layout1_description',
			    	array(
				        'settings' => 'silver_hubs_about_layout1_description',
				        'label'   => 'About Description',
				        'section' => 'silver_hubs_about_section',
				        'type'  => 'textarea',
				        'active_callback' => 'silver_hubs_about_general_callback',
			        )
			    ));
			//Layout1 button
			    $wp_customize->add_setting('silver_hubs_about_layout1_button', array(
			        'default'        => 'Read More',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'silver_hubs_about_layout1_button',
			    	array(
				        'settings' => 'silver_hubs_about_layout1_button',
				        'label'   => 'Button',
				        'section' => 'silver_hubs_about_section',
				        'type'  => 'text',
				        'active_callback' => 'silver_hubs_about_general_callback',
			        )
			    ));
			//Layout1 button Link
			    $wp_customize->add_setting('silver_hubs_about_layout1_button_link', array(
			        'default'        => '#',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'silver_hubs_about_layout1_button_link',
			    	array(
				        'settings' => 'silver_hubs_about_layout1_button_link',
				        'label'   => 'Button Link',
				        'section' => 'silver_hubs_about_section',
				        'type'  => 'text',
				        'active_callback' => 'silver_hubs_about_general_callback',
			        )
			    ));		
		//About Background Color
		    $wp_customize->add_setting( 'silver_hubs_about_bg_color', 
		        array(
		            'default'    => '#eeeeee', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'silver_hubs_about_bg_color', 
		        array(
		            'label'      => __( 'Background Color', 'silver_hubs' ), 
		            'settings'   => 'silver_hubs_about_bg_color', 
		            'priority'   => 10,
		            'section'    => 'silver_hubs_about_section',
		            'active_callback' => 'silver_hubs_about_design_callback',
		        ) 
	        ) ); 
	    //About title text color
	        $wp_customize->add_setting( 'silver_hubs_about_title_text_color', 
		        array(
		            'default'    => '#333333', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'silver_hubs_about_title_text_color', 
		        array(
		            'label'      => __( 'Title Text Color', 'silver_hubs' ), 
		            'settings'   => 'silver_hubs_about_title_text_color', 
		            'priority'   => 10,
		            'section'    => 'silver_hubs_about_section',
		            'active_callback' => 'silver_hubs_about_design_callback',
		        ) 
	        ) ); 
	    //About text color
	        $wp_customize->add_setting( 'silver_hubs_about_text_color', 
		        array(
		            'default'    => '#333333', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 
	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize,'silver_hubs_about_text_color', 
		        array(
		            'label'      => __( 'Text Color', 'silver_hubs' ), 
		            'settings'   => 'silver_hubs_about_text_color', 
		            'priority'   => 10,
		            'section'    => 'silver_hubs_about_section',
		            'active_callback' => 'silver_hubs_about_design_callback',
		        ) 
	        ) ); 
}
add_action( 'customize_register', 'silver_hubs_about_setting' );
function silver_hubs_about_general_callback(){
	$about_section_tab = get_theme_mod( 'about_section_tab','general');
	if ( 'general' === $about_section_tab ) {
		return true;
	}
	return false;
}
function silver_hubs_about_design_callback(){
	$about_section_tab = get_theme_mod( 'about_section_tab','general');
	if ( 'design' === $about_section_tab ) {
		return true;
	}
	return false;
}
?>