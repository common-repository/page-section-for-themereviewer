<?php
if ( ! function_exists( 'designhubs_section_about_activate' ) ) :
	function designhubs_section_about_activate(){
		$sections = array();
		$abouts = apply_filters('designhubs_pro_section', $sections);
		$quantity  = get_theme_mod( 'about_section_number', 4 );
		?>
		<div class="about_section_info">
			<div class="about_data">
				<?php
				if(!empty(get_theme_mod( 'designhubs_about_main_title', 'About Us' ))){
					?>
					<div class="about_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'designhubs_about_main_title', 'About Us' )); ?></h2>
						<span class="separator"><span><span></span></span></span>
					</div>
					<?php
				} 
				?>	
				<div class="about_main_discription">
					<p><?php echo esc_html(get_theme_mod( 'designhubs_about_description',$abouts['about']['description'])); ?></p>
				</div>
				<div class="about_section_container">
					<div class="about_featured_image">
						<?php if(get_theme_mod( 'about_section_image')){ ?>
							<img src="<?php echo esc_attr(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us">

						<?php }else{
							?>
							<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
							<?php
						} ?> 
					</div>
					<!-- Layout1 -->
					<?php
					if(get_theme_mod( 'designhubs_about_section_layouts', 'layout1')=='layout1'){
						?>
						<div class="about_container_data">
							<div class="entry-header">
								<div class="about_title">
									<h2><?php echo esc_html(get_theme_mod( 'designhubs_about_layout1_title','Hi, I Am Samantha!')); ?></h2>
								</div>
								<div class="about_sub_heading">
									<p><?php echo esc_html(get_theme_mod( 'designhubs_about_layout1_subheading','Owner/Founder, Executive Coach')); ?></p>
								</div>
								<div class="about_description">
									<p><?php echo esc_html(get_theme_mod( 'designhubs_about_layout1_description', $abouts['about']['description1'])); ?></p>
								</div>
								<div class="about_btn">
									<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'designhubs_about_layout1_button_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'designhubs_about_layout1_button','Read More')); ?></a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					<!-- Layout1 -->
					<!-- Layout2 -->
					<?php if(get_theme_mod( 'designhubs_about_section_layouts', 'layout1')=='layout2'){
					?>
						<div class="about_container_data">
							<?php for ( $i = 1; $i <= $quantity ; $i++ ) { 
								if($i <= 4){ ?>
									<div class="about_container">
										<?php if(!empty(get_theme_mod( 'about_one_icon'.$i, $abouts['about']['icon'][$i-1]))){
											?>
											<div class="about_icon buttons"> 
												<i class="<?php echo esc_attr(get_theme_mod( 'about_one_icon'.$i, $abouts['about']['icon'][$i-1]))?>"></i>
											</div>	
											<?php
										} ?>											
										<div class="entry-header">
											<?php
											if(!empty(get_theme_mod( 'about_section_title_'.$i, $abouts['about']['title'][$i-1]))){
												?>
												<div class="about_title">
													<a href="<?php echo esc_attr(get_theme_mod( 'about_section_title_url_'.$i, '#')); ?>"><h3><?php echo esc_html(get_theme_mod( 'about_section_title_'.$i, $abouts['about']['title'][$i-1])); ?></h3></a>
												</div>
												<?php
											}
											if(!empty(get_theme_mod( 'about_section_description_'.$i, $abouts['about']['description3'][$i-1]))){
												?>
												<div class="about_sub_heading">
													<p><?php echo esc_html(get_theme_mod( 'about_section_description_'.$i , $abouts['about']['description3'][$i-1])); ?></p>
												</div>
												<?php
											}
											?>
										</div>				
									</div>
								<?php }else{
									?>
									<div class="about_container">
										<?php if(!empty(get_theme_mod( 'about_one_icon'.$i))){
											?>
											<div class="about_icon buttons"> 
												<i class="<?php echo esc_attr(get_theme_mod( 'about_one_icon'.$i))?>"></i>
											</div>	
											<?php
										} ?>											
										<div class="entry-header">
											<?php
											if(!empty(get_theme_mod( 'about_section_title_'.$i))){
												?>
												<div class="about_title">
													<a href="<?php echo esc_attr(get_theme_mod( 'about_section_title_url_'.$i, '#')); ?>"><h3><?php echo esc_html(get_theme_mod( 'about_section_title_'.$i)); ?></h3></a>
												</div>
												<?php
											}
											if(!empty(get_theme_mod( 'about_section_description_'.$i))){
												?>
												<div class="about_sub_heading">
													<p><?php echo esc_html(get_theme_mod( 'about_section_description_'.$i )); ?></p>
												</div>
												<?php
											}
											?>
										</div>				
									</div>
									<?php
								} ?>
							<?php } ?>
						</div>
					<?php  } ?>
					<!-- Layout2 -->
				</div>
			</div>
		</div>
		<?php
    }
endif;