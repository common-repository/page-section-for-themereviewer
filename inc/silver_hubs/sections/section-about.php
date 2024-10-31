<?php
if ( ! function_exists( 'silver_hubs_section_about_activate' ) ) {
	function silver_hubs_section_about_activate(){
		$sections = array();
		$abouts = apply_filters('silver_hubs_pro_section', $sections);
		?>
		<div class="about_section_info">
			<div class="about_data">
				<?php
				if(!empty(get_theme_mod( 'silver_hubs_about_main_title', 'About Us' ))){
					?>
					<div class="about_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'silver_hubs_about_main_title', 'About Us' )); ?></h2>
						<div class="section-separator"></div>
					</div>
					<?php
				} 
				?>	
				<div class="about_main_discription">
					<p><?php echo esc_html(get_theme_mod( 'silver_hubs_about_description',$abouts['about']['description'])); ?></p>
				</div>
				<div class="about_section_container">
					
					<?php
					if(get_theme_mod( 'silver_hubs_about_section_layouts', 'layout1')=='layout1'){
						?>
						<div class="about_container_data">
							<div class="entry-header">
								<div class="about_title">
									<h2><?php echo esc_html(get_theme_mod( 'silver_hubs_about_layout1_title','Hi, I Am Samantha!')); ?></h2>
								</div>
								<div class="about_sub_heading">
									<p><?php echo esc_html(get_theme_mod( 'silver_hubs_about_layout1_subheading','Owner/Founder, Executive Coach')); ?></p>
								</div>
								<div class="about_description">
									<p><?php echo esc_html(get_theme_mod( 'silver_hubs_about_layout1_description',$abouts['about']['description1'])); ?></p>
								</div>
								<div class="about_btn">
									<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'silver_hubs_about_layout1_button_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'silver_hubs_about_layout1_button','Read More')); ?></a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					<div class="about_featured_image">
						<?php if(get_theme_mod( 'about_section_image')){ ?>
							<img src="<?php echo esc_attr(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us">

						<?php }else{
							?>
							<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
							<?php
						} ?> 
					</div>
				</div>
			</div>
		</div>
		<?php
    }
}