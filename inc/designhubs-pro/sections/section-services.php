<?php
if ( ! function_exists( 'designhubs_services_activate' ) ) :
	function designhubs_services_activate(){
		$sections = array();
		$services = apply_filters('designhubs_pro_section', $sections);
		$our_services_number = get_theme_mod( 'our_services_number', 6 );
		?>
		<div class="our_services_section">
			<div class="our_services_info">
				<div class="our_services_main_info">
					<div class="our_services_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'our_services_main_title', 'Our Services' )); ?></h2>
						<span class="separator"><span><span></span></span></span>
					</div>
					<div class="our_services_main_disc">
						<p><?php echo  esc_html(get_theme_mod( 'our_services_main_discription', $services['service']['description']));?></p>
					</div>
				</div>
				<div class="our_services_section_data">
					<?php
					for ( $i = 1; $i <= $our_services_number ; $i++ ) {
						if($i <= 6){
							?>
							<div class="our_services_data">
								<div class="theme-item-overlay">
									<?php if(get_theme_mod( 'our_services_bg_image_' .$i)){ ?>
										<img src="<?php echo esc_attr(get_theme_mod( 'our_services_bg_image_'.$i))?>">
									<?php }else{?>
										<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
									<?php

									} ?>
								</div>
								<div class="our_services_img">
									<i class="<?php echo esc_attr(get_theme_mod( 'our_services_icon_'.$i, $services['service']['icon'][$i-1]))?>"></i>
								</div>
								<div class="our_services_container">
									<div class="our_services_title">
										<a href="<?php echo esc_attr(get_theme_mod( 'our_services_title_link_'.$i, '#')); ?>">
											<h3><?php echo esc_html(get_theme_mod( 'our_services_title_'.$i, $services['service']['title'][$i-1])); ?></h3>
										</a>
									</div>
									<div class="our_services_discription">
										<p><?php echo esc_html(get_theme_mod( 'our_services_description_'.$i, $services['service']['subheading'][$i-1])); ?></p>
									</div>
								</div>
							</div>
							<?php 
						}else{
							?>
							<div class="our_services_data">
								<div class="theme-item-overlay">
									<?php if(get_theme_mod( 'our_services_bg_image_' .$i)){ ?>
										<img src="<?php echo esc_attr(get_theme_mod( 'our_services_bg_image_'.$i))?>">
									<?php }else{?>
										<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
									<?php

									} ?>
								</div>
								<div class="our_services_img">
									<i class="<?php echo esc_attr(get_theme_mod( 'our_services_icon_'.$i))?>"></i>
								</div>
								<div class="our_services_container">
									<div class="our_services_title">
										<a href="<?php echo esc_attr(get_theme_mod( 'our_services_title_link_'.$i, '#')); ?>">
											<h3><?php echo esc_html(get_theme_mod( 'our_services_title_'.$i)); ?></h3>
										</a>
									</div>
									<div class="our_services_discription">
										<p><?php echo esc_html(get_theme_mod( 'our_services_description_'.$i)); ?></p>
									</div>
								</div>
							</div>
							<?php 
						}
					} ?>
				</div>
			</div>
		</div>
		<?php
	}
endif;
