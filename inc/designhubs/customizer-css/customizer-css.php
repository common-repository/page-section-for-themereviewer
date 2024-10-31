<?php
function designhubs_section_customize_css(){
	if (get_theme_mod( 'our_portfolio_bg_image')) {
    	?>
		<style type="text/css">
		.our_portfolio_info{
			background: url(<?php echo esc_attr(get_theme_mod('our_portfolio_bg_image'))?>) rgb(0 0 0 / 0.75);
			background-position: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_design_callback','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_bg_size','cover'));?>;
		    background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style type="text/css">
    	.our_portfolio_info{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_bg_color','#ffffff')); ?>;
		}
		</style>
		<?php
    }
    if(get_theme_mod( 'our_team_bg_image')){
		?>
		<style type="text/css">
		.our_team_section{
			background: url(<?php echo esc_attr(get_theme_mod('our_team_bg_image'))?>) rgb(0 0 0 / 0.75);
			background-position: <?php echo esc_attr(get_theme_mod('designhubs_our_team_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('designhubs_our_team_bg_attachment','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('designhubs_our_team_bg_size','cover'));?>;
		    background-blend-mode: multiply;
		}
		</style>
		<?php
	}else{
		?>
		<style type="text/css">
    	.our_team_section{
			background: <?php echo esc_attr(get_theme_mod('our_team_bg_color','#ffffff')); ?>;
		}
		</style>
		<?php
	}
	if(get_theme_mod( 'our_services_bg_image')){
		?>
		<style type="text/css">
		.our_services_section{
			background: url(<?php echo esc_attr(get_theme_mod('our_services_bg_image'))?>) rgb(0 0 0 / 0.75);
			background-position: <?php echo esc_attr(get_theme_mod('designhubs_our_services_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('designhubs_our_services_bg_attachment','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('designhubs_our_services_bg_size','cover'));?>;
		    background-blend-mode: multiply;
		}
		</style>
		<?php
	}else{
		?>
		<style type="text/css">
    	.our_services_section{
			background: <?php echo esc_attr(get_theme_mod('our_services_bg_color','#eeeeee')); ?>;
		}
		</style>
		<?php
	}
	if(get_theme_mod('our_testimonial_background_image')){
    	?>
		<style>	
		.our_testimonial_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('our_testimonial_background_image'));?>) rgb(0 0 0 / 0.75);
    		background-position: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_position','center center')); ?>;
    		background-size: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_size','cover')); ?>;
    		background-attachment: <?php echo esc_attr(get_theme_mod('our_testimonial_bg_attachment','fixed')); ?>;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style>	
		.our_testimonial_section {
			background: <?php echo esc_attr(get_theme_mod('our_team_testimonial_bg_color','#eeeeee')); ?>;
		}
		</style>
		<?php
    }
	?>
	<style> 
		span.separator:before, .separator > span:before, .separator > span:after, span.separator:after{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_heading_underline_color','#455d58')); ?>;
		}
		.separator span span{
			border: 2px solid <?php echo esc_attr(get_theme_mod('designhubs_heading_underline_color','#455d58')); ?>;
		}
		
		/*--------------------------------------------------------------
		#  featured slider
		--------------------------------------------------------------*/
		.featured_slider_disc, .featured_slider_title h1 {
			color: <?php echo esc_attr(get_theme_mod('featured_slider_text_color','#ffffff')); ?>;
		}
		button.owl-prev, button.owl-next{
		    background: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_bg_color','#455d58')); ?> !important;
			color: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_text_color','#ffffff')); ?> !important;
		}
		button.owl-prev:hover, button.owl-next:hover{
		    background: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_bghover_color','#ffffff')); ?> !important;
			color: <?php echo esc_attr(get_theme_mod('featured_slider_arrow_texthover_color','#455d58')); ?> !important;
		}
		.featured_slider_image .hentry-inner .entry-container{
			background: <?php echo esc_attr(get_theme_mod('alpha_color_setting','rgba(255,255,255,0.3)')); ?>;
			padding: 40px 40px !important;
		}

		/*--------------------------------------------------------------
		# featured section
		--------------------------------------------------------------*/
		.section-featured-wrep{
			background: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_bg_color','#eeeeee')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_color','#455d58')); ?>;	
		}
		.section-featured-wrep:hover {
			background: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_bg_hover_color','#455d58')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_text_hover_color','#ffffff')); ?>;	
		}
		.featured-section_data{
			margin: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_margin','-100px 0px 20px 0px')); ?>;
		}
		.featured-thumbnail i {
		    font-size: <?php echo esc_attr(get_theme_mod('featured_section_icon_size','35'));?>px;
		}
		.section-featured-wrep i {
			border: 1px solid <?php echo esc_attr(get_theme_mod('designhubs_featured_section_icon_bg_color','#455d58')); ?>;
			background: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_icon_bg_color','#455d58')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_icon_color','#ffffff')); ?>;
		}
		.section-featured-wrep:hover i {
			background: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_icon_bg_hover_color','#ffffff')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('designhubs_featured_section_icon_hover_color','#455d58')); ?>;
		}

		/*--------------------------------------------------------------
		#  About slider
		--------------------------------------------------------------*/
		.about_section_info{
			background-color: <?php echo esc_attr(get_theme_mod('designhubs_about_bg_color','#eeeeee')); ?>;
			color: <?php echo esc_attr(get_theme_mod('designhubs_about_text_color','#333333')); ?>;
		}
		.about_main_title{
			color: <?php echo esc_attr(get_theme_mod('designhubs_about_title_text_color','#333333')); ?>;
		}
		.about_title a{
			color: <?php echo esc_attr(get_theme_mod('designhubs_about_link_color','#455d58')); ?>;
		}
		.about_title a:hover{
			color: <?php echo esc_attr(get_theme_mod('designhubs_about_link_hover_color','#333333')); ?>;
		}
		/*--------------------------------------------------------------
		# our portfolio section
		--------------------------------------------------------------*/
		.our_portfolio_info{
			/*background: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_bg_color','#ffffff')); ?>;*/
			color: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_text_color','#333')); ?>;	
		}
		.our_portfolio_main_title h2{
			color: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_title_color','#333333')); ?>;
		}
		.wrappers .child a, .our_portfolio_sub_heading, .our_portfolio_title{
			color: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_container_text_color','#333333')); ?>;	
		}
		.our_portfolio_container .our_portfolio_title{
			background: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_container_bg_color','#ffffff')); ?>;
		}
		.our_portfolio_btn{
			background: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_icon_bg_color','#455d58')); ?>;
		}
		.our_portfolio_btn i{
			color: <?php echo esc_attr(get_theme_mod('designhubs_our_portfolio_icon_color','#fff')); ?>;
		}

		/*--------------------------------------------------------------
		# our team
		--------------------------------------------------------------*/
		.our_team_container{
			background: <?php echo esc_attr(get_theme_mod('our_team_container_bg_color','#eeeeee')); ?>;	
			color: <?php echo esc_attr(get_theme_mod('our_team_container_text_color','#455d58')); ?>;	
		}
		.our_teams_contain:hover .our_team_title h3, .our_teams_contain:hover .our_team_headline p {
		    color: <?php echo esc_attr(get_theme_mod('our_team_text_hover_color','#000000')); ?>;	;
		}
		.our_team_social_icon i {
		    background: <?php echo esc_attr(get_theme_mod('our_team_icon_background_color','#fff')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_team_icon_color','#455d58')); ?>;
		}
		.our_social_icon i:hover {
		    background: <?php echo esc_attr(get_theme_mod('our_team_icon_bg_hover_color','#455d58')); ?>;
		    color:  <?php echo esc_attr(get_theme_mod('our_team_icon_hover_color','#fff')); ?>;
		}
		.our_team_section {
		    color:  <?php echo esc_attr(get_theme_mod('our_team_text_color','#333')); ?>;
		}
		.our_team_title a{
			color:  <?php echo esc_attr(get_theme_mod('our_team_link_color','#455d58')); ?>;
		}
		.our_team_title a:hover{
			color:  <?php echo esc_attr(get_theme_mod('our_team_link_hover_color','#000000')); ?>;
		}
		/*--------------------------------------------------------------
		# our services
		--------------------------------------------------------------*/
		.our_services_img i {
		    font-size: <?php echo esc_attr(get_theme_mod('our_services_icon_size','40')); ?>px !important;
		    color: <?php echo esc_attr(get_theme_mod('our_services_icon_color','#ffffff')); ?>;
		}
		.our_services_img{
			background-color: <?php echo esc_attr(get_theme_mod('our_services_icon_bg_color','#455d58')); ?>;
		}
		.our_services_data, .our_services_data a{
			color: <?php echo esc_attr(get_theme_mod('our_services_contain_text_color','#455d58')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('our_services_contain_bg_color','#ffffff')); ?>;
		}
		.our_services_section{
			color: <?php echo esc_attr(get_theme_mod('our_services_text_color','#333')); ?>;			
		}
		.our_services_data:hover > .our_services_container, .our_services_data:hover > .our_services_container a {
		    color: <?php echo esc_attr(get_theme_mod('our_services_contain_text_hover_color','#ffffff')); ?>;
		}

		/*--------------------------------------------------------------
		# our testimonial
		--------------------------------------------------------------*/
		.our_testimonial_section{			
			color:  <?php echo esc_attr(get_theme_mod('our_testimonial_text_color','#333')); ?>;
		}
		.our_testimonial_data_info {
		    background: <?php echo esc_attr(get_theme_mod('our_testimonial_alpha_color_setting','#ffffff')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_team_testimonial_text_color','#455d58')); ?>;
		}

		/*--------------------------------------------------------------
		# our Sponsors
		--------------------------------------------------------------*/	
		.our_sponsors_section {
		    background: <?php echo esc_attr(get_theme_mod('our_sponsors_bg_color','#eee')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('our_sponsors_text_color','#333')); ?>;
		}
		.our_sponsors_img:hover{
			background-color: <?php echo esc_attr(get_theme_mod('our_sponsors_img_hover_bg_color','#ffffff')); ?>;
		}
	</style>
	<?php	
}
add_action( 'wp_head', 'designhubs_section_customize_css');